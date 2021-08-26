<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Form;

class Settings extends Model
{
    protected $table = "settings";
	protected $fillable = ['section','option_key','option_val','icon'];

	public static $social_arr = [
		'facebook'=>'fa fa-facebook-official',
		'Twitter'=>'fa fa-twitter',
		'youtube'=>'fa fa-youtube-play',
		'instagram'=>'fa fa-instagram',
		'google'=>'fa fa-google-plus',
		'whatsapp'=>'fa fa-whatsapp',
		'linkedin'=>'fa fa-linkedin',
	];

	public static $menu = [
        'blog'=>'Blog Posts',
        'blog_authors'=>'Blog Authors',
        'blog_categories'=>'Blog Categories',
        'blog_comments'=>'Blog Comments',
        'messages'=>'Messages',
        //'compose'=>'Send Messages',
        'job-applications'=>'Job Applications',
        'subscribers'=>'Subscribers',
        'users'=>'Users',
        'settings'=>'Settings',
    ];

	public static function save_settings($settings, $except=[])
	{
		$obj = [];
		$output = [];
		foreach ($settings as $section => $options)
		{
			foreach ($options as $option_key => $option_val)
			{
				if(!empty($except)) {
					if(array_key_exists($section, $except) && isset($except[$section]) && $option_key==$except[$section]) {
						continue;
					}
				}

				$data_arr = [
					'section' => $section,
					'option_key' => $option_key,
					'option_val'=>$option_val,
				];

				$option_db = self::where('section',$section)->where('option_key',$option_key)->first();
				if($option_db)
				{
					if($option_db->update($data_arr)) {
						$output[] = $option_key . ' updated';
						$output[] = $data_arr;
					} else {
						$output[] = $option_key . ' Error updating';
					}
				} else {
					$obj[] = $data_arr;
				}
			}
		}

		if(!empty($obj))
		{
			if(self::insert($obj)) {
				$output[] = 'New record added';
			} else {
				$output[] = 'Error inserting new record';
			}	
		}
		return $output;
	}

	public static function settings($section=null, $remember=0)
	{
		if(!empty($section)) {
			if($remember!=0) {
				return self::where('section', $section)->remember($remember)->get();	
			}
			return self::where('section', $section)->get();
		}
		return self::all();
	}

	public static function get_settings($section, $remember=0)
	{
		if(!empty($section)) {
			if($remember!=0) {
				return self::where('section', $section)->remember($remember)->get();	
			}
			return self::where('section', $section)->get();
		}
		return false;
	}

	public static function option($option_key='',$section='',$default = '')
	{
        if(!$section) {
            return self::whereOption_key($option_key)->get();
        }
        $settings = self::get_settings($section);

        if($settings)
        {
            $option = $settings->filter(function($opt) use($option_key) {
				return $opt->option_key == $option_key;
            })->first();

            if(!empty($option)) {
				return $option->option_val;	
            } else {
				return $default;
            }
        }
        return $option_key;
	}

	public static function section($section, $remember=0, $section_data=null)
	{
		$output = array();

		if(!$section_data) {
			$section_data = self::get_settings($section, $remember);			
		}
		if($section_data)
		{
			foreach ($section_data as $option) {
				$output[$option->option_key] = $option->option_val;
			}
		}
		return $output;
	}

	public static function fetch_section($section, $settings) {
		$section_data = $settings->filter(function($row) use($section) {
			return ($row->section==$section);
		});

		return self::section($section,0,$section_data);
	}

	public static function fetch($option, $settings_arr, $default=null)
	{
		if(!isset($option)) {
			return $default;
		}
		if(isset($settings_arr[$option])) {
			return $settings_arr[$option];
		} else if(is_array($settings_arr)) {
			foreach($settings_arr as $index=>$arr)
			{
				if(isset($arr[$option])) {
					return $arr[$option]; break;
				}
			}
		}
		return $default;
	}

	public static function option_box($option, $settings, $text, $checkbox_key='new_option', $attributes=[])
	{
		$option_val = self::fetch($option, $settings, 0);
		$hidden_input = '<input type="hidden" name="settings['.$checkbox_key.']['.$option.']" value="0" />';
		return '<label>'.$hidden_input.Form::checkbox('settings['.$checkbox_key.']['.$option.']', 1, ($option_val==1)?true:false, $attributes) .' '. $text .'</label>';
	}

	public static function option_switch($option,$settings,$label='Option',$text_on='Yes',$text_off='No',$key='general')
	{
		$option_val = self::fetch($option,$settings, 0);
		return "<div class='form-group'>
	            ".Form::label($option,$label,['class'=>'col-md-3 control-label'])."
	            <div class='col-sm-9'>
	                ".Form::hidden('settings['.$key.']['.$option.']',0)."
	                ".Form::checkbox('settings['.$key.']['.$option.']',true,$option_val,['id'=>$option,'class'=>'switch','data-on-text'=>$text_on,'data-off-text'=>$text_off])."
	            </div>
	        </div>";
	}
        
    public static function getModerator($market_id)
    {
        $row = self::where('section', 'market_'.$market_id)->first();
        if($row)
            $user = User::where('id', $row->option_val)->first();
        if($user)
            return $user->first_name.' '.$user->last_name;
        return '';
        
    }
}