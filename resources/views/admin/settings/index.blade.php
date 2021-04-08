@php 
    use App\Settings; 
    $show_settings = true;
@endphp
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
            <h4 class="text-primary">Website settings</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row" style="margin-bottom:15px;">
                        {{ Form::label('website_title', 'Website title', ['class'=>'control-label col-md-3']) }}
                        <div class="col-md-9">
                            {{ Form::text('settings[site][website_title'.']',Settings::fetch('website_title',$site),['class'=>'form-control','placeholder'=>'Website title']) }}
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:15px;">
                        {{ Form::label('copyrights', 'Copyrights', ['class'=>'control-label col-md-3']) }}
                        <div class="col-md-9">
                            {{ Form::text('settings[site][copyrights'.']',Settings::fetch('copyrights',$site),['class'=>'form-control','placeholder'=>'Copyrights']) }}
                        </div>
                    </div>

                    <div class="form-group row" style="margin-bottom:15px;">
                        {{ Form::label('brief', 'About website', ['class'=>'control-label col-md-3']) }}
                        <div class="col-md-9">
                            {{ Form::textarea('settings[site][brief'.']',Settings::fetch('brief',$site),['class'=>'form-control','rows'=>'5','placeholder'=>'About website']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('logo', 'Logo', ['class'=>'control-label col-md-3']) }}
                        <div class="col-md-7">
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
            <h4 class="text-primary">Email settings</h4>
            <div class="form-group row">
                {{ Form::label('email_to', 'Send contact forms to email', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[mail][email_to]',Settings::fetch('email_to',$mail),['class'=>'form-control','placeholder'=>'Enter email address']) }}
                </div>
            </div>
        </div>

        <div class="well well-sm">
            <h4 class="text-primary">Social networks</h4>
            @foreach(Settings::$social_arr as $key=>$val)
                <div class="form-group row">
                    {{ Form::label($key, $val, ['class'=>'col-md-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::text('settings[social]['.$key.']',Settings::fetch($key,$social) ,['class'=>'form-control ltr','placeholder'=>$val]) }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="well well-sm">
            <h4 class="text-primary">Contact info</h4>
            <div class="form-group row">
                {{ Form::label('Address', 'Address', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][Address]',Settings::fetch('Address',$contact) ,['class'=>'form-control','placeholder'=>'Address']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('Phone', 'Phone', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][Phone]',Settings::fetch('Phone',$contact) ,['class'=>'form-control','placeholder'=>'Phone']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('Email', 'Email', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][Email]',Settings::fetch('Email',$contact) ,['class'=>'form-control','placeholder'=>'Email']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('WhatsApp', 'WhatsApp', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][WhatsApp]',Settings::fetch('WhatsApp',$contact) ,['class'=>'form-control','placeholder'=>'WhatsApp']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('customer_service', 'Customer Service', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-9">
                    {{ Form::text('settings[contact][CustomerService]',Settings::fetch('CustomerService',$contact) ,['class'=>'form-control','placeholder'=>'Customer Service']) }}
                </div>
            </div>
        </div>

        
        <div class="form-group row">
            <div class="col-md-3"></div>
            <div class="col-md-9">{!!Form::submit('Save settings', ['class'=>'btn btn-success btn-submit btn_loading'])!!}</div>
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