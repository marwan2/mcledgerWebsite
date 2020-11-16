<?php use App\Settings; 
$show_settings = false;
?>
@extends('admin.layouts.master')
@section('title') Settings @endsection
@section('content')
    <div class="panel-heading">
        <legend>Settings</legend>
    </div>
    <div class="panel-body">
        @if(!$show_settings)
            <p>
                You need a permission to access this page.
            </p>
        @else
        {!!Form::open(['class'=>'form-horizontal','url'=>'admin/settings/save','files'=>true])!!}
        <div class="well well-sm">
            <h4 class="text-primary">إعدادات الموقع</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="" style="margin-bottom:15px;">
                        {{ Form::label('website_title_en', 'عنوان الموقع', ['class'=>'control-label']) }}
                        <div class="">
                            {{ Form::text('settings[site][website_title_en'.']',Settings::fetch('website_title_en',$site),['class'=>'form-control','placeholder'=>'عنوان الموقع']) }}
                        </div>
                    </div>
                    <div class="" style="margin-bottom:15px;">
                        {{ Form::label('copyrights_en', 'نص الحقوق محفوظة', ['class'=>'control-label']) }}
                        <div class="">
                            {{ Form::text('settings[site][copyrights_en'.']',Settings::fetch('copyrights_en',$site),['class'=>'form-control','placeholder'=>'جميع الحقوق محفوظة']) }}
                        </div>
                    </div>

                    <div class="" style="margin-bottom:15px;">
                        {{ Form::label('brief_en', 'نبذة عن الموقع', ['class'=>'control-label']) }}
                        <div class="">
                            {{ Form::textarea('settings[site][brief_en'.']',Settings::fetch('brief_en',$site),['class'=>'form-control','rows'=>'5','placeholder'=>'نبذة عن الموقع']) }}
                        </div>
                    </div>

                    <div class="" style="margin-bottom:15px;">
                        {{ Form::label('hotline_desc_en', 'محتوى الخط الساخن', ['class'=>'control-label']) }}
                        <div class="">
                            {{ Form::textarea('settings[site][hotline_desc_en'.']',Settings::fetch('hotline_desc_en',$site),['class'=>'form-control','rows'=>'3','placeholder'=>'نبذة عن الموقع']) }}
                        </div>
                    </div>
                    <div class="">
                        {{ Form::label('logo', 'اللوجو', ['class'=>'control-label']) }}
                        <div class="">
                            {{ Form::file('logo',['class'=>'form-control']) }}
                            @if(Settings::fetch('logo',$site))
                                <div class="logo_preview">
                                    <a href="{{url('uploads/'.Settings::fetch('logo',$site))}}" target="_blank"><img src="{{url('uploads/'.Settings::fetch('logo',$site))}}" style="width: 100px;" /></a>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-2"><a href="javascript:void(0)" class="btn btn-danger del_logo pull-left">Delete logo</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="well well-sm">
            <h4 class="text-primary">إعدادات البريد اﻹلكتروني</h4>
            <div class="form-group">
                {{ Form::label('email_from', 'الإيميل المرسل', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[mail][email_from]',Settings::fetch('email_from',$mail),['class'=>'form-control','placeholder'=>'اﻹيميل الذي سيقوم بإرسال الرسائل']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('email_to', 'أرسل إلى إيميل', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[mail][email_to]',Settings::fetch('email_to',$mail),['class'=>'form-control','placeholder'=>'اﻹيميل المرسل إليه']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('email_name', 'اسم المرسل إليه', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[mail][email_name]',Settings::fetch('email_name',$mail),['class'=>'form-control','placeholder'=>'اسم المرسل إليه']) }}
                </div>
            </div>
        </div>

        <div class="well well-sm">
            <h4 class="text-primary">صفحات التواصل</h4>
            @foreach(Settings::$social_arr as $key=>$val)
                <div class="form-group">
                    {{ Form::label($key, $val, ['class'=>'col-md-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::text('settings[social]['.$key.']',Settings::fetch($key,$social) ,['class'=>'form-control ltr','placeholder'=>$val]) }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="well well-sm">
            <h4 class="text-primary">معلومات اﻻتصال</h4>
            <div class="form-group">
                {{ Form::label('Address_ar', 'العنوان Arabic', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][Address_ar]',Settings::fetch('Address_ar',$contact) ,['class'=>'form-control','placeholder'=>'العنوان']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('Address_en', 'العنوان English', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][Address_en]',Settings::fetch('Address_en',$contact) ,['class'=>'form-control','placeholder'=>'العنوان']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('Phone', 'التليفون', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][Phone]',Settings::fetch('Phone',$contact) ,['class'=>'form-control','placeholder'=>'التليفون']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('Mobile', 'الموبايل', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][Mobile]',Settings::fetch('Mobile',$contact) ,['class'=>'form-control','placeholder'=>'رقم الموبايل']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('Fax', 'الفاكس', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][Fax]',Settings::fetch('Fax',$contact) ,['class'=>'form-control','placeholder'=>'فاكس']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('Email', 'البريد اﻹلكتروني', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][Email]',Settings::fetch('Email',$contact) ,['class'=>'form-control','placeholder'=>'البريد اﻹلكتروني']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('Skype', 'حساب السكاي بي', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][Skype]',Settings::fetch('Skype',$contact) ,['class'=>'form-control','placeholder'=>'حساب السكاي بي']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('WhatsApp', 'حساب الواتس اب', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][WhatsApp]',Settings::fetch('WhatsApp',$contact) ,['class'=>'form-control','placeholder'=>'حساب الواتس اب']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('customer_service', 'خدمة العملاء', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][CustomerService]',Settings::fetch('CustomerService',$contact) ,['class'=>'form-control','placeholder'=>'خدمة العملاء']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('WorkHours_ar', 'ساعات العمل Arabic', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][WorkHours_ar]',Settings::fetch('WorkHours_ar',$contact) ,['class'=>'form-control','placeholder'=>'ساعات العمل']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('WorkHours_en', 'ساعات العمل English', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][WorkHours_en]',Settings::fetch('WorkHours_en',$contact) ,['class'=>'form-control','placeholder'=>'ساعات العمل']) }}
                </div>
            </div>
        </div>

        {{-- <div class="well well-sm">
            <h4 class="text-primary">إعدادات محرك البحث</h4>            
            <div class="well well-sm">
                <legend>إعدادات الصفحة الرئيسية</legend>
                <div class="form-group">
                    {{ Form::label('description_home', 'الوصف', ['class'=>'col-md-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::textarea('settings[meta][description_home]',Settings::fetch('description_home',$meta) ,['class'=>'form-control','placeholder'=>'الوصف للصفحة الرئيسية','rows'=>3]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('keywords_home', 'كلمات البحث', ['class'=>'col-md-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::text('settings[meta][keywords_home]',Settings::fetch('keywords_home',$meta) ,['class'=>'form-control tags','placeholder'=>'الكلمات المفتاحية للرئيسية']) }}
                    </div>
                </div>
            </div>

            <div class="well well-sm">
                <legend>إعدادات صفحة اتصل بنا</legend>
                <div class="form-group">
                    {{ Form::label('description_contact', 'الوصف', ['class'=>'col-md-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::textarea('settings[meta][description_contact]',Settings::fetch('description_contact',$meta) ,['class'=>'form-control','placeholder'=>'الوصف لصفحة اتصل بنا','rows'=>3]) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('keywords_contact', 'كلمات البحث', ['class'=>'col-md-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::text('settings[meta][keywords_contact]',Settings::fetch('keywords_contact',$meta) ,['class'=>'form-control tags','placeholder'=>'الكلمات المفتاحية لصفحة اتصل بنا']) }}
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="form-group">
            <div class="col-md-3"></div>
            <div class="col-md-9">{!!Form::submit('حفظ اﻹعدادت', ['class'=>'btn btn-success btn-submit btn_loading'])!!}</div>
        </div>
        {!!Form::close()!!}
        @endif
    </div>
@endsection

@section('script')
    {!!HTML::style('backend/plugins/tags/jquery.tagsinput.min.css')!!}
    {!!HTML::script('backend/plugins/tags/jquery.tagsinput.min.js')!!}
    
    <script type="text/javascript">
        $('.tags').tagsInput({
            'width':'100%',
            'height':'80px',
            'defaultText':'اكتب ثم اضغط Enter',
        });
        var mapPlacepicker = $(".placepicker").placepicker();
        $(document).on('click', '.del_logo', function(event) {
            event.preventDefault();
            if(window.confirm('Delete logo: Are you sure?')){
                window.location.href = "{{url('admin/settings/delete-logo')}}";
            }
        });
    </script>
@endsection