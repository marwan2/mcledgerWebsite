<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Form;
use Str;

class Forms extends Model
{
    public static $genders = [
        'Male'=>'Male', 
        'Female'=>'Female', 
    ];
    public static $family_status = [
        'Married'=>'Married', 
        'Widowed'=>'Widowed', 
        'Separated'=>'Separated', 
        'Divorced'=>'Divorced', 
        'Single'=>'Single'
    ];
    public static $employment_status = [
        'Employed'=>'Employed', 
        'Unemployed'=>'Unemployed', 
        'Self-Employed'=>'Self-Employed', 
        'Freelancer / Student'=>'Freelancer / Student'
    ];

    public static function text($field, $label, $classes='', $horizontal=true, $inline=false, $type='text') {
        global $errors;
        $e_class = (isset($errors) && $errors->has($field)) ? 'has-error' : '';
        $error_msg = (isset($errors)) ? $errors->first($field, '<p class="help-block">:message</p>') : '';

        $c1 = 'col-md-12 text-right';
        $c2 = 'col-md-12';
        $ref = 'i'.time();

        if($horizontal) {
            $c1 = 'col-md-4 text-right pt-2 col-form-label';
            $c2 = 'col-md-8';

            if($inline) {
                $c2 .= ' form-inline';
            }
        }

        $input_arr = ['class'=>'form-control ' . $classes, 'placeholder'=>$label, 'id'=>$field];
        $input = Form::text($field, null, $input_arr);

        if($type=='textarea') {
            $input_arr['rows'] = 3;
            $input = Form::textarea($field, null, $input_arr);
        }
        if($type=='email') {
            $input = Form::email($field, null, $input_arr);
        }
        if($type=='number') {
            $input = Form::number($field, null, $input_arr);
        }
        if($type=='file') {
            $input = Form::file($field, null, $input_arr);
        }

        return '<div class="form-group row py-2 px-3 mb-1 form_gp '.$e_class.'">
            '. Form::label($field, $label, ['class'=>$c1.' lbl_input']) .'
            <div class="'.$c2.'">
                '. $input .'
                '. $error_msg.'
            </div>
        </div>';
    }

    public static function textarea($field, $label, $classes='', $horizontal=true, $inline=false) {
        return self::text($field, $label, $classes, $horizontal, $inline, 'textarea');
    }

    public static function email($field, $label, $classes='', $horizontal=true, $inline=false) {
        return self::text($field, $label, $classes, $horizontal, $inline, 'email');
    }

    public static function num($field, $label, $classes='', $horizontal=true, $inline=false) {
        return self::text($field, $label, $classes, $horizontal, $inline, 'number');
    }

    public static function file($field, $label, $classes='', $horizontal=true, $inline=false) {
        return self::text($field, $label, $classes, $horizontal, $inline, 'file');
    }

    public static function select($field, $label, $list) 
    {
        global $errors;
        $error = (isset($errors) && $errors->has($field)) ? 'has-error' : '';
        $error_msg = (isset($errors)) ? $errors->first($field, '<p class="help-block">:message</p>') : '';

        $c1 = 'col-md-12 text-right';
        $c2 = 'col-md-12';
        $ref = 'i'.time();
        $horizontal = true;

        if($horizontal) {
            $c1 = 'col-md-4 text-right pt-2 col-form-label';
            $c2 = 'col-md-8';
        }

        return "
            <div class='form-group row py-2 px-3 mb-1 ".$error."'>
                ". Form::label($field, $label, ['class' => $c1.' lbl_input']) ."
                <div class='".$c2."'>
                    ".Form::select($field, $list, null, ['class' => 'form-control newscat_select'])."
                    ".$error_msg."
                </div>
            </div>
        ";
    }

    public static function radios($field, $label, $list=[], $selected_key='', $displayTextField=false, $textField='', $textPlaceholder='', $required=true) 
    {
        global $errors;
        $error = (isset($errors) && $errors->has($field)) ? 'has-error' : '';
        $error_msg = (isset($errors)) ? $errors->first($field, '<p class="help-block">:message</p>') : '';

        $c1 = 'col-md-12 text-right';
        $c2 = 'col-md-12';
        $rand = Str::random(6);
        $horizontal = true;

        if($horizontal) {
            $c1 = 'col-md-4 text-right pt-2 col-form-label';
            $c2 = 'col-md-8';
        }

        $radio_str = '';
        foreach($list as $key=>$text) {
            $selected = ($selected_key && $selected_key==$key) ? true : false;
            $id = 'r_'.\Str::snake($field).$key.$rand;
            $txt_field_id = 'txt_'.Str::snake($field).$rand;
            $has_txt_field = 0;

            if($displayTextField) {
                $has_txt_field = 1;
            }

            $radio_attrs = [
                'class'=>'custom-control-input', 
                'id'=>$id,
                'data-hastxt'=>$has_txt_field,
                'data-txtid'=>$txt_field_id,
            ];

            if($required) {
                $radio_attrs['required'] = 'required';
            }

            $radio_str .= '
                <div class="custom-control custom-radio custom-control-inline">'.
                    Form::radio($field, $key, $selected, $radio_attrs).'
                    <label class="custom-control-label" for="'.$id.'">'.$text.'</label>
                </div>';
        }

        $text_field = '';
        if($displayTextField) {
            $placeholder = 'Please enter details here.';
            if(!empty($textPlaceholder)) {
                $placeholder = $textPlaceholder;
            }
            $text_field = Form::textarea($textField, null, [
                'class'=>'form-control rd_txt_field', 
                'placeholder'=>$placeholder, 
                'id'=>$txt_field_id,
                'style'=>'display: none;',
                'rows'=>2,
            ]);
            $text_field = "<div class='radio_detailes_wrap mt-2'>".$text_field."</div>";
        }

        return "
            <div class='form-group row py-2 px-3 mb-1 ".$error."'>
                ". Form::label($field, $label, ['class' => $c1.' lbl_input']) ."
                <div class='".$c2." pt-3'>
                    ".$radio_str."
                    ".$text_field."
                    ".$error_msg."
                </div>
            </div>
        ";
    }

    public static function yesNo($field, $label, $selected_key='', $yesDisplayText=false, $textField='', $textPlaceholder='', $required=true) {
        $list = ['1'=>'Yes', '0'=>'No'];
        return self::radios($field, $label, $list, $selected_key, $yesDisplayText, $textField, $textPlaceholder, $required);
    }

    public static function td($app, $field, $label, $subfield='') {
        $value = $app->$field;
        $subval = '';

        if($value === 0) {
            $value = '<span style="font-weight: bold; color: #e34949; display:inline-block;padding:5px; border: 1px solid #e34949; border-radius:5px;">No</span>';
        }
        if($value == 1) {
            $value = '<span style="font-weight: bold; color: #25a33b; display:inline-block;padding:5px; border: 1px solid #25a33b; border-radius:5px;">Yes</span>';
        }

        if($subfield) {
            $subval = '<div style="color: #666; margin-top:6px;">'.$app->$subfield.'</div>';
        }
        return '
        <tr>
            <td style="font-weight: bold; width: 280px;">'.$label.'</td>
            <td>'.$value.' '.$subval.'</td>
        </tr>';
    }
}