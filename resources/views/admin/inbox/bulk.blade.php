@extends('admin.layouts.master')

@section('content')
    <section class="content-header">
      <h1>إرسال رسائل جماعية</h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"> الرئيسية</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-body">
		    <div class="alert alert-info">يرجى العلم بأن الرسائل سيتم وضعها في قالب افتراضي خاص بالموقع</div> 
			{!! Form::open(['url' => 'admin/compose/bulk', 'class'=>'form-horizontal']) !!}

			    {{-- <div class="form-group {{ $errors->has('email_template_id') ? 'has-error' : ''}}">
			        {!! Form::label('email_template_id', 'قالب الرسالة', ['class' => 'col-md-4 control-label']) !!}
			        <div class="col-md-8">
			            <div class="alert alert-warning">القوالب غير متاحة حاليا, ادخل الرسالة في الحقول التالية</div>
			            {!! $errors->first('email_template_id', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div> --}}

				<div class="form-group">
			        {!! Form::label('users', 'أرسل إلى', ['class' => 'col-md-4 control-label']) !!}
			        <div class="col-md-8">
			            <label>{!!Form::radio('sending_option', 1, true, ['class'=>'rd s1'])!!} أرسل لكل مشتركي النشرة</label>
			            <label>{!!Form::radio('sending_option', 2, false, ['class'=>'rd s2'])!!} أرسل إلى معينيين</label>
			        </div>
			    </div>

			    <div class="form-group t2">
			        {!! Form::label('custom_users', 'أرسل إلى معينيين', ['class' => 'col-md-4 control-label']) !!}
			        <div class="col-md-8">
			            {!!Form::select('custom_users[]',$users->lists('email','id'),'all',['class'=>'form-control select2', 'multiple'=>'multiple', 'size'=>'5'])!!}
			        </div>
			    </div>
			    <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
			        {!! Form::label('subject', 'عنوان الرسالة', ['class' => 'col-md-4 control-label']) !!}
			        <div class="col-md-8">
			            {!! Form::text('subject', null, ['class' => 'form-control', 'required' => 'required']) !!}
			            {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>
			    <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
			        {!! Form::label('body', 'الرسالة', ['class' => 'col-md-4 control-label']) !!}
			        <div class="col-md-8">
			            {!! Form::textarea('body', null, ['class' => 'form-control', 'required' => 'required','id'=>'editor']) !!}
			            {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>
			    {{-- <div class="form-group {{ $errors->has('goto_inbox') ? 'has-error' : ''}}">
			        {!! Form::label('goto_inbox', 'صندوق رسائل الموقع', ['class' => 'col-md-4 control-label']) !!}
			        <div class="col-md-8">
			            <div class="checkbox">
			            	<label>{!!Form::checkbox('goto_inbox', 1, true)!!} إرسال إلى صندوق الرسائل بالموقع </label>
			            </div>
			            {!! $errors->first('goto_inbox', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div> --}}
			    <div class="form-group {{ $errors->has('goto_email') ? 'has-error' : ''}}">
			        {!! Form::label('goto_email', 'إرسال للبريد اﻹلكتروني', ['class' => 'col-md-4 control-label']) !!}
			        <div class="col-md-8">
			            <div class="checkbox"><label>{!!Form::checkbox('goto_email', 1, true)!!}
			            	إرسال إلى البريد اﻹلكتروني الخاص بالمشترك</label>
			            </div>
			            {!! $errors->first('goto_email', '<p class="help-block">:message</p>') !!}
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-md-offset-4 col-md-6">
			            {!! Form::submit(' إرســـــال للجميع', ['class' => 'btn btn-lg btn-success']) !!}
			            <a href="{{url('admin/compose')}}" class="btn btn-default">إلغاء</a>
			            <br>
			            <div class="help-block">سيتم استبعاد من قام بإلغاء اﻻشتراك في خدمة رسائل الموقع</div>
			        </div>
			    </div>
		    {!! Form::close() !!}
		</div>
	</div>
</section>
@endsection

@section('script')
	{!!HTML::style('backend/plugins/select2/select2.min.css')!!}
	{!!HTML::script('backend/plugins/select2/select2.min.js')!!}

	<script type="text/javascript">
		function setSendFilter($val)
		{
			$('.t2').slideUp();
			$('.t1').slideUp();
			if($val==1) {
				$('.t1').slideDown('slow');
			} else {
				$('.t2').slideDown('slow');
			}
		}

		$(document).ready(function() {
			$('.select2').select2();
			$('.rd').on('click',  function(event) {
				setSendFilter($(this).val());
			});
			setSendFilter(1);
		});
	</script>
@endsection