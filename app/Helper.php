<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Settings;
use HTML;
use Mail;
use Image;
use Form;

class Helper extends Model
{
    public static $months =[
        "01"=>"يناير",
        "02"=>"فبراير",
        "03"=>"مارس",
        "04"=>"إبريل",
        "05"=>"مايو",
        "06"=>"يونيو",
        "07"=>"يوليو",
        "08"=>"أغسطس",
        "09"=>"سبتمبر",
        "10"=>"أكتوبر",
        "11"=>"نوفمبر",
        "12"=>"ديسمبر",
    ];
    public static $days = [
        "0"=>"الأحد",
        "1"=>"الإثنين",
        "2"=>"الثلاثاء",
        "3"=>"الأربعاء",
        "4"=>"الخميس",
        "5"=>"الجمعة",
        "6"=>"السبت",
    ];

    public static function generateRandom() {
        return time();
    }

    public static function upload_path($url=false)
    {
        $year = date('Y');
        $month = date('m');
        $base_path  = public_path('uploads');
        if(!is_dir($base_path.'/'.$year.'/'.$month)) {
            $uold  = umask(0);
            mkdir($base_path.'/'.$year.'/'.$month, 0755,true);
            umask($uold);
        }
        if($url) {
            return url('uploads/'.$year.'/'.$month.'/');
        }
        return public_path('uploads/'.$year.'/'.$month.'/');
    }

    public static function upload($request, $name='image', $make_thumbnail=true)
    {
        $fileName = '';
        $upload_path = self::upload_path();
        $year = date('Y');
        $month = date('m');

        if ($request->hasFile($name)) {
            $extension = $request->file($name)->getClientOriginalExtension();
            $file_code = time();
            $fileName = $file_code.'.'.$extension;

            $request->file($name)->move($upload_path, $fileName);
            
            if($make_thumbnail) {
                if(self::setThumbnail(['name'=>$file_code, 'extension'=>$extension], $upload_path)) {

                }
            }
        }

        return $year.'/'.$month.'/'.$fileName;
    }

    public static function upload_toPath($request, $name, $path='uploads', $make_thumbnail=true, $thumb_size=200)
    {
        $fileName = '';
        $upload_path = $path;

        if ($request->hasFile($name)) {
            $extension = $request->file($name)->getClientOriginalExtension();
            $file_code = time();
            $fileName = $file_code.'.'.$extension;

            $request->file($name)->move($upload_path, $fileName);

            if($make_thumbnail)
            {
                $img = Image::make($upload_path.'/'.$fileName);
                $img->resize($thumb_size, null, function ($constraint) { $constraint->aspectRatio(); });
                if($img->save($upload_path.'/thumbnails/'.$fileName)) {
                }
            }
        }
        return $fileName;
    }

    public static function image_field($name='image', $item=null, $label='Image', $recommnded_size=[])
    {
        $default_img = HTML::Image('assets/img/no_thumb.png', '', ['class'=>'img_preview imgfieldms img-responsive mw-100']);

        $field = (!empty($item) && isset($item->$name))? self::image($item->$name, ['class'=>'img_preview imgfieldms img-responsive']): $default_img;
        $error_class = (isset($errors) && $errors->has('image')) ? 'has-error':'';
        $error_text = (isset($errors)) ? $errors->first($name, '<p class="help-block">:message</p>'):'';
        $size = (!empty($recommnded_size))? self::size($recommnded_size[0],$recommnded_size[1]):'';

        return "
            <div class='form-group row ".$error_class."'>
            ".Form::label($name, $label, ['class' => 'col-md-3 control-label'])."
            <div class='col-md-4'>
                ".Form::file($name, ['class' => 'form-control img_browse', 'data-fid'=>'ms'])."
                ".$size." ".$error_text."
            </div>
            <div class='col-md-4'>".$field."</div>
            </div>
        ";
    }

    public static function select($name, $list, $first=[], $selected=null, $classes=[]) {
        $options = [];
        if(!empty($first)) {
            foreach ($first as $key => $value) {
                $options[$key] = $value;
            }
        }
        foreach ($list as $key => $value) {
            $options[$key] = $value;
        }

        $basic_classes = ['class'=>'form-control', 'id'=>$name];
        $css_classes = array_merge($basic_classes, $classes);

        $select = Form::select($name, $options, $selected, $css_classes);
        return $select;
    }

    //Used in Backend
    public static function image($imgObj, $attr=[], $alt='')
    {
        $parts = explode('.', $imgObj);
        $folderImg='uploads/'.$imgObj;
        $folderthumb='';
        if(!empty($parts) && !empty($parts[1])) {
            $folderthumb='uploads/'.$parts[0].'_thumb.'.$parts[1];            
        }

        if(!$imgObj) {
            return 'no image';
        }

        if(!empty($imgObj))
        {
            $pathToImg = public_path($folderImg);
            $pathToThumb = public_path($folderthumb);

            $imgsrc = '';
            if(file_exists($pathToThumb)) {
                $imgsrc = HTML::image($folderthumb,$alt,$attr);
            } else {
                $imgsrc = HTML::image($folderImg,$alt,$attr);
            }
            return '<a href="'.url($folderImg).'" target="_blank">'.$imgsrc.'</a>';
        }

        return 'no image';
    }

    public static function image2($imgObj, $attr=[], $thumbs=true, $lazy=false, $alt='', $src=false) {
        $parts = explode('.', $imgObj);
        $folderImg='uploads/'.$imgObj;
        $folderthumb='';
        $pathToImg='';
        if(!empty($parts) && !empty($parts[1])) {
            $folderthumb='uploads/'.$parts[0].'_thumb.'.$parts[1];
            $pathToImg='uploads/'.$parts[0].'.'.$parts[1];
        }

        $defaultImg = HTML::image(url('images/no_thumb.jpg'), '', $attr);
        if(!$imgObj) {
            return $defaultImg;
        }
        if(!empty($imgObj))
        {
            $pathToImg = public_path($folderImg);
            $pathToThumb = public_path($folderthumb);
            $imgsrc = '';

            if($src) {
                if($thumbs)
                    return $folderthumb;
                else
                    return $pathToImg;
            }
            if($lazy) {
                if(file_exists($pathToThumb)) {
                    if($thumbs) {
                        return '<img data-src="'.url($folderthumb).'" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="lazy">';
                    } else {
                        return '<img data-src="'.url($folderImg).'" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="lazy">';
                    }
                } else {
                    return $defaultImg;   
                }
            }
            if($thumbs) {
                if(file_exists($pathToThumb)) {
                    $imgsrc = HTML::image($folderthumb,$alt,$attr);
                } else {
                    $imgsrc = $defaultImg;
                }
            } else {
                if(file_exists($pathToImg)) {
                    $imgsrc = HTML::image($folderImg,$alt,$attr);
                } else {
                    $imgsrc = $defaultImg;
                }
            }
            return $imgsrc;
        }
        return $defaultImg;
    }

    public static function imageSrc($imgObj, $thumbs=true) {
        return self::image2($imgObj, null, false, $thumbs, null, true);
    }

    public static function image_single($images, $attr=[]) {
        $imgObj = $images->first();
        if($imgObj) {
            return self::image2($imgObj->image, $attr);            
        }
        return null;
    }

    public static function getImage($imgObj, $attrs=[],$dir='images',$return_as='img', $default=true)
    {
        $folderImg='uploads/'.$dir.'/';
        $folderImgThumbs='uploads/'.$dir.'/thumbnails/';
        $defaultImg = HTML::image(url('images/img_default.jpg'), '', $attrs);
        $output = "";

        if(!empty($imgObj))
        {
            $pathToImg = public_path($folderImg.$imgObj);
            if(file_exists($pathToImg) || file_exists(url($folderImg.$imgObj)) || @getimagesize(url($folderImg.$imgObj)))
            {
                if($return_as=='background'){
                    $output = 'background-image:url('.url($folderImg.$imgObj).')';
                } else if($return_as=='thumbnail') {
                    $output = HTML::image(url($folderImgThumbs.$imgObj), '', $attrs);
                } else {
                    $output = HTML::image(url($folderImg.$imgObj), '', $attrs);
                }
            } else {
                if($default) {
                    $output = $defaultImg;
                } else {
                    $output = url($folderImg.$imgObj);
                }
            }
        } else {
            if($default) {
                $output = $defaultImg;
            }
        }
        return $output;
    }

    public static function setThumbnail($image, $upload_path, $size=300)
    {
        // Disabled temperoray because of cPanel support to php fileinfo
        $file_name = $image['name'].'.'.$image['extension'];
        $file_thumb_name = $upload_path.'/'.$image['name'].'_thumb.'.$image['extension'];

        $img = Image::make($upload_path.$file_name);
        $img->resize($size, null, function ($constraint) { 
            $constraint->aspectRatio(); 
        });
        if($img->save($file_thumb_name)) {
            return true;
        }

        return false;
    }

    public static function generateKeywords($str) {
        $min_word_length = 3;
        $avoid = ['the','to','i','am','is','are','he','she','a','an','here','there','can','could','were','has','have','had','been','welcome','of','home','&nbsp;','&ldquo;','words','into','this','there'];
        $strip_arr = ["," ,"." ,";" ,":", "\"", "'", "“","”","(",")", "!","?"];

        $str_clean = str_replace( $strip_arr, "", $str);
        $str_arr = explode(' ', $str_clean);
        $clean_arr = [];
        foreach($str_arr as $word) {
            if(strlen($word) > $min_word_length) {
                $word = strtolower($word);
                if(!in_array($word, $avoid)) {
                    $clean_arr[] = $word;
                }
            }
        }

        return implode(',', $clean_arr);
    }

    public static function notify($model, $type='approval', $reply_message=null) {
        $settings = Settings::section('mail');

        $replyTo['email'] = Settings::fetch('reply_email', $settings, 'info@mcledger.co');
        $replyTo['name'] = Settings::fetch('reply_name', $settings, 'McLedger Website');

        $view='';
        $subject='';

        if($type=='reply') {
            $view = 'emails.reply';
            $subject = 'Review Message';
        } else if($type=='new_registrar') {
            $view = 'emails.new_registrar';
            $subject = 'You have registered';
        }

        Mail::send($view, ['model'=>$model, 'reply_message'=>$reply_message], function($message) use ($model, $replyTo, $subject)
        {
            $message
                ->to($model->email, $model->name)
                ->subject($subject)
                ->replyTo($replyTo['email'], $replyTo['name']);
        });

        return true;
    }

    public static function sw($object, $field='active', $model=null, $style=1) {
        $color = 'danger';
        $icon = 'minus-circle';

        if($style==2) { $icon = 'circle-o'; }

        $val = $object->$field;
        if($val == 1) {
            $color = 'success';
            $icon = 'check-circle';

            if($style==2) { $icon = 'circle'; }
        }

        return '<a href="#" class="text-'.$color.' btn_boolean elem'.$field.$object->id.'" data-id="'.$object->id.'" data-model="'.$model.'" data-field="'.$field.'" title="'.trans('admin.click_change_status').'"><i class="fa fa-2x fa-'.$icon.'"></i></a>';
    }

    public static function trash_btn($action='trash',$object, $field='trashed', $model=null, $style=1) {
        $color = 'danger';
        $text = 'Trash';

        $val = $object->$field;
        if($action == 'restore') {
            $color = 'warning';
            $text = 'Restore';
        }

        return '<a href="#" class="btn btn-sm btn-'.$color.' btn_boolean btn_trash elem'.$field.$object->id.'" data-id="'.$object->id.'" data-model="'.$model.'" data-field="'.$field.'">'.$text.'</a>';
    }

    public static function statusCtrl($list, $item, $field='status', $model='Product') {
        return \Form::select('status', $list, $item->$field, ['class'=>'statusCtrl stat_'.$item->id, 'data-id'=>$item->id, 'data-field'=>$field, 'data-model'=>$model]) . '<span class="statusResult"></span>';
    }

    public static function since($date_val) {
        if(isset($date_val)) {
            return \Carbon\Carbon::parse($date_val)->diffForHumans();
        }
        return '';
    }

    public static function date_ft($date_val, $format='j F Y') {
        if(isset($date_val)) {
            return \Carbon\Carbon::parse($date_val)->format($format);
        }
        return '';
    }

    public static function info($item) {
        $iu_name = $item->user->name ?? '';
        $iup_name = $item->updated_by->name ?? '';

        $output = '
        Added by:  '.$iu_name.' <br>
        Updated by: '.$iup_name.' <br>
        Created in: '.self::date_ft($item->created_at).' <br>
        Updated in: '.self::since($item->updated_at).' 
        ';

        return '<a class="btn btn-light popover_anchor" tabindex="0" role="button"
         data-trigger="focus" data-toggle="popover" 
         data-title="Record info."
         data-html="true"
         data-placement="top" data-content="'.$output.'"><i class="fa fa-info"></i></a>';
    }

    public static function edit_url ($item, $model_url) { 
        return url('admin/'.$model_url.'/'.$item->id.'/edit');
    }

    public static function del_url ($item, $model_url) { 
        return url('admin/'.$model_url.'/'.$item->id);
    }

    public static function edit_ctrl($item, $model_url) {
        $output = '<a href="'.Helper::edit_url($item, $model_url).'" class="btn btn-primary" title="Edit"><span class="fa fa-pen"></span> Edit</a>';

        return $output;
    }

    public static function delete_ctrl($item, $model_url) {
        $output = '';
        $output = 
            Form::open(['method'=>'DELETE', 
                'url'=>[self::del_url($item, $model_url)], 
                'style'=>'display:inline']
            ).
            Form::button('<span class="fa fa-trash-alt"></span> Delete', array(
                'type' => 'submit',
                'class' => 'btn btn-danger',
                'title' => 'Delete', 
                'onclick'=>'return confirm("Delete record: Are you sure?")'
            )).
            Form::close();
        return $output;
    }

    public static function size($width, $height) {
        return '<div class="help-block alert alert-info alert-size">أبعاد الصورة المفضلة: العرض <span class="wimg">'.$width.'</span> * اﻻرتفاع <span class="himg">'.$height.'</span> بيكسل</div>';
    }

    public static function date() {
        return self::$days[date('w')].', '.date('d').' '.self::$months[date('m')].' '.date('Y');
    }

    public static function popover($title='', $content='', $btn='btn-info') {
        return '<a href="javascript:void(0)" class="btn btn-sm '.$btn.'" data-toggle="popover" data-trigger="focus" title="'.$title.'" data-content="'.$content.'"><i class="fa fa-question"></i></a>';
    }

    public static function lang_data($object, $lang_id) {
        if(!$lang_id) {
            return $object;
        }
        if(empty($object->lang)) {
            return $object;
        }
        $data = $object->lang->filter(function($row) use ($lang_id){
            return $row->language_id == $lang_id;
        })->first();

        if(!empty($data)) {
            return $data;
        }
        return $object;
    }

    public static function meta_title($row, $col='title', $another_row=null) {
        if(isset($row->meta_title) && !empty($row->meta_title)) {
            return $row->meta_title;
        }
        if(!empty($row->$col)) {
            return $row->$col;
        }
        if($another_row && !empty($another_row->$col)) {
            return $another_row->$col;
        }
    }
    public static function meta_desc($row, $col='details') {
        if(isset($row->meta_description) && !empty($row->meta_description)) {
            return $row->meta_description;
        }
        return $row->$col;
    }
    public static function meta_keywords($row, $col='details') {
        if(isset($row->meta_keywords) && !empty($row->meta_keywords)) {
            return $row->meta_keywords;
        }
        return $row->$col;
    }

    public static function field($row, $field='title') {
        $lang = \App::getLocale();
        if(!$lang) {
            if(Session::has(Language::$lang_session)) {
                $lang = Session::get(Language::$lang_session, 'ar');
            } else {
                $lang = 'ar';
            }
        }

        $field_new = $field.'_'.$lang;
        $alter1_field = $field.'_en';
        $alter2_field = $field.'_ar';

        if(isset($row->$field_new) && !empty($row->$field_new)) {
            return $row->$field_new;
        } else if(!empty($row->$alter1_field)) {
            return $row->$alter1_field;
        } else {
            if(isset($row->$alter2_field))
                return $row->$alter2_field;
        }
        if(isset($row->field))
            return $row->$field;
        else
            return '';
    }

    public static function subdetails($row, $limit=100, $field='details') {
        $details = strip_tags(self::field($row, $field));
        return str_limit($details, $limit);
    }

    public static function generate_slug($model, $str, $id=null) {
        $slug_str = str_slug($str);

        if($id) {
            $check = $model::whereSlug($slug_str)->where('id','<>',$id)->get();
        } else {
            $check = $model::whereSlug($slug_str)->get();
        }

        if($check->count() > 0) {
            $slug_str = time().'-'.$slug_str;
        }

        return $slug_str;
    }

    public static function getCurrentLang($field='title') {
        $lang = \App::getLocale();
        if (!$lang) {
            if (Session::has(Language::$lang_session)) {
                $lang = Session::get(Language::$lang_session, 'en');
            } else {
                $lang = 'en';
            }
        }
        $field_new = $field.'_'.$lang;

        return $field_new;
    }

    public static function activeURL($url) {
        if(\Request::is('admin/'.$url.'/*') || \Request::is('admin/'.$url)){
            return 'active';
        }
        return '';
    }
    
    public static function activePage($url) {
        if(\Request::is($url.'/*') || \Request::is($url)){
            return 'class="active"';
        }
        return '';
    }

    public static function metaImage($img) {
        return (isset($img) && !empty($img)) ? url('uploads/'.$img) : '';
    }
}
