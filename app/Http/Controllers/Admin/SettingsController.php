<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Redirect;
use Str;

use App\Settings;
use App\User;
use App\Helper;

class SettingsController extends InitController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getIndex()
    {
        $mail = Settings::section('mail');
        $general = Settings::section('general');
        $social = Settings::section('social');
        $contact = Settings::section('contact');
        $site = Settings::section('site');
        $meta = Settings::section('meta');

    	return view('admin.settings.index', compact('social','contact','mail','general','site','meta'));
    }

    public function postSave(Request $request)
    {
        if($request->has('settings')) {
            $settings = $request->get('settings');
            if($request->hasFile('logo')) {
                $settings['site']['logo'] = Helper::upload($request, 'logo');
            }

            $result = Settings::save_settings($settings);
            if( $result ) {
                \Cache::forget('settings');
                Session::flash('flash_message', 'Settings saved successfully');
            } else {
                Session::flash('flash_message', 'Error occured');
            }
        }
        return Redirect::back();
    }

    public function getDeleteLogo(Request $request)
    {
        $settings['site']['logo'] = '';
        $result = Settings::save_settings($settings);
        if( $result ) {
            \Cache::forget('settings');
            Session::flash('flash_message', 'لقد تم حفظ اﻹعدادات بنجاح');
        } else {
            Session::flash('flash_message', 'عفوا هناك خطأ ما حدث اثناء تنفيذ هذا اﻷمر');
        }
        
        return Redirect::back();
    }

    public function getMessages()
    {
        $texts = Settings::section('texts');        
        return view('admin.settings.messages', compact('texts'));
    }

    public function getProfile()
    {
    	return redirect('admin/users/'.\Auth::id().'/edit');
    }

    public function getChangeStatus($id, $model)
    {
        $object = null;
        if($model=='Page') {
            $object = Page::findOrFail($id);
        } else if($model=='News') {
            $object = News::findOrFail($id);
        } else if($model=='Slider') {
            $object = Slider::findOrFail($id);
        } else if($model=='Menu') {
            $object = Menu::findOrFail($id);
        } else {
            return null;
        }
        $output = "yes";
        if($object->active==1) {
            $object->active=0;
            $output = "no";
        } else {
            $object->active=1;
            $output = "yes";
        }
        if($object->save()) {
            return json_encode(['output'=>$output]);
        }
        return 0; 
    }

    public function postChangepassword(Request $request)
    {
        $user = User::findOrFail($request->get('user_id'));
        if ($request->get('password') != $request->get('password_confirm')) {
            Session::flash('alert', 'danger');
            Session::flash('flash_message', 'عفوا كلتا كلمة المرور ﻻ تنطبقان');
            return Redirect::back();
        } else {
            if ($request->get('password') !== '') {
                $user->password = bcrypt($request->get('password'));
                $user->save();
            } else {
                Session::flash('alert', 'danger');
                Session::flash('flash_message', 'عفوا كلمة المرور غير صحيحة حاول مرة اخرى');
                return Redirect::back();
            }
        }

        Session::flash('flash_message', 'تم تغيير كلمة المرور بنجاح');
        return Redirect::back();
    }

    public function postSlidersort(Request $request)
    {
        $menu = Slider::all();
        $sort = $request->get('sort');

        foreach ($sort as $item_id => $sort_val) {
            $obj = Slider::findOrFail($item_id);
            $obj->sort = $sort_val;
            $obj->save();
        }

        Session::flash('flash_message', 'تم تحديث ترتيب عناصر السليدر بنجاح');
        return redirect('admin/sliders');
    }

    public function postSortitems(Request $request)
    {
        $model =  $request->get('model');
        $menu = $model::all();
        $sort = $request->get('sort');

        foreach ($sort as $item_id => $sort_val) {
            $obj = $model::findOrFail($item_id);
            $obj->sort = $sort_val;
            $obj->save();
        }

        Session::flash('flash_message', 'Items sort updated successfully');
        return redirect()->back();
    }
    public function getReNumberingSort(Request $req)
    {
        $model = $req->get('model');
        $where = $req->get('where');
        $where_list = [];

        $data = $model::orderBy('sort','ASC')->orderBy('id','ASC');

        if($where) {
            $where_list = explode('|', $where);
            foreach($where_list as $r) {
                $col = explode(':', $r);
                $data = $data->where($col[0], $col[1]);
            }
        }
        $data = $data->get();

        $count=1;
        foreach($data as $row) {
            $old_sort = $row->sort;
            $row->sort = $count;
            if($row->save()) {
                print('<div>Record re-numbered sort from '.$old_sort.' to '.$count.'</div>');
            }
            $count++;
        }
        print('<div>************* Ended ***************</div>');
        return redirect()->back();
    }

    public function getSwitchBoolean(Request $request)
    {
        $model = $request->get('model');
        $id = $request->get('id');
        $field = $request->get('field');

        $model  = 'App\\'.$model;
        $object = $model::findOrFail($id);

        if($object->$field==1) {
            $object->$field = 0;
        } else {
            $object->$field = 1;
        }
        if($object->save()) {
            return json_encode(['status'=>1, 'newval'=>$object->$field]);
        }
        return json_encode(['status'=>0, 'newval'=>$object->$field]);
    }

    public function getStatusChange(Request $request)
    {
        $req_model = $request->get('model');
        $id = $request->get('id');
        $field = $request->get('field');
        $value = $request->get('value');

        $model  = 'App\\'.$req_model;
        $object = $model::findOrFail($id);
        $object->$field = $value;

        if($model=='App\\Deals\\Deal') { //Change the dependant Section
            if($object->section=='sell_offer') {
                $section = 'App\Deals\SellOffer';
            } else if($object->section=='quote_request') {
                $section = 'App\Deals\QuoteRequest';
            } else if($object->section=='partnership') {
                $section = 'App\Deals\Partnership';
            }
            $section = $section::whereId($object->record_id)->first();
            $section->status = $value;
            $section->save();
        }

        if($model=='App\\UserProfile' && $value==1) {
            //Delete current primary row
            $model::whereUser_id($object->user_id)->whereProfile('permanent')->delete();

            //Copy temp row to primary row if approved
            $newObject = $object->replicate();
            $newObject->profile = 'permanent';
            $newObject->editable = 1;
            $newObject->save();

            //Allow editing temperory profile again
            $object->editable = 1;

            //Update User with his profile
            $user_profile = $newObject;
            $user = User::find($object->user_id);
            $user->name = $user_profile->first_name.' '.$user_profile->last_name;
            $user->company_name = $user_profile->company_name;
            $user->address = $user_profile->address_line1.' '.$user_profile->address_line2;
            $user->mobile = $user_profile->mob_code.' '.$user_profile->mobile;
            $user->save();
        }

        if($object->save()) {
            $this->sendStatusNotification($object->user_id, $req_model, $value);
            return json_encode(['status'=>1, 'newval'=>$object->$field]);
        }
        return json_encode(['status'=>0, 'newval'=>$object->$field]);
    }

    public function sendStatusNotification($user_id, $model, $value) {
        $message = [];
        switch ($model) {
            case 'UserProfile':
                $message = [
                    'subject'=>'Your profile has been approved',
                    'body'=>'Your recent submitted profile has been approved by Yalla Nsadar Admin'
                ];
                break;
            case 'Deals\\Deal':
                $message = [
                    'subject'=>'Your Deal has been approved',
                    'body'=>'Your recent submitted Deal has been approved by Yalla Nsadar Admin'
                ];
                break;            
            default:
                $message = [
                    'subject'=>'Your '.$model.' has been approved',
                    'body'=>'Your recent submitted '.$model.' has been approved by Yalla Nsadar Admin'
                ];
                break;
        }

        if(\App\Messages\Message::notify($user_id, $message['subject'], $message['body'])) {
            return true;
        }
        return false;
    }

    public function postSearchArticle(Request $request)
    {
        $articles = null;
        $keyword = $request->get('q');
        if($keyword && strlen($keyword)>2)
        {
            $articles = \App\Article::where('title','like','%'.$keyword.'%')
                ->orWhere('body','like','%'.$keyword.'%')
                ->orWhere('author_id','like','%'.$keyword.'%')
                ->where('active',1)
                ->select('id','category_id', 'title','image','created_at')
                ->orderBy('id','DESC')
                ->with('category')
                ->get();
        }

        return $articles;
    }

    public function getAddRelatedArticle($article_id, $related_id)
    {
        $article = \App\Article::findOrFail($related_id);

        $data['article_id'] = $article_id;
        $data['related_id'] = $related_id;
        $data['title'] = $article->title;
        $data['slug'] = str_slug($article->title);

        $result = \App\ArticleRelated::create($data);
        if($result) {
            return ['status'=>'success', 'id'=>$result->id];
        }
    }

    public function getRemoveRelatedArticle($id)
    {
        if(\App\ArticleRelated::destroy($id)){
            return ['status'=>'success'];
        }
    }

    public function postUpload(Request $request)
    {
        $upload_path = public_path('/uploads/images/');
        $funcNum = $request->get('CKEditorFuncNum');
        $url = '';
        $message = 'عفوا هناك خطأ في تحميل الملف';

        if ($request->hasFile('upload')) {
            $fileName = Str::random(40).'.'.$request->file('upload')->getClientOriginalExtension();
            $request->file('upload')->move($upload_path, $fileName);

            $url = url('uploads/images/'.$fileName);
            $message = 'Image uploaded successfully';
        }

        return"<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction(".$funcNum.", '".$url."', '".$message."');</script>";
    }

    public function postDeleteimage(Request $request) {
        $record_id = $request->get('id');
        $model = $request->get('model');
        $field = $request->get('field');

        $record = $model::findOrFail($record_id);
    
        if(!$field || $field=='undefined') {
            $field='image';
        }
        
        $sub_message = '';
        if($model::destroy($record_id)) {
            if(file_exists(public_path('uploads/'.$record->$field))) {
                if(unlink(public_path('uploads/'.$record->$field))) {
                } else {
                    $sub_message .= ', File not exist, but record deleted';
                }
            }
            return json_encode(['status'=>'success', 'msg'=>$sub_message]);
        }
        return json_encode(['status'=>'error']);
    }
}