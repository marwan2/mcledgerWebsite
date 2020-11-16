<div class="white-popup-block">

	{!! Form::open(['url' => 'admin/compose/new', 'class'=>'form-horizontal']) !!}
	{!!Form::hidden('user_id', $candidate->id)!!}
	    <div class="form-group {{ $errors->has('email_template_id') ? 'has-error' : ''}}">
	        {!! Form::label('email_template_id', 'قالب الرسالة', ['class' => 'col-md-4 control-label']) !!}
	        <div class="col-md-8">
	            <div class="alert alert-info">القوالب غير متاحة حاليا, ادخل الرسالة في الحقول التالية</div>
	            {!! $errors->first('email_template_id', '<p class="help-block">:message</p>') !!}
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
	            {!! Form::textarea('body', null, ['class' => 'form-control', 'required' => 'required']) !!}
	            {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
	        </div>
	    </div>

	    <div class="form-group {{ $errors->has('goto_inbox') ? 'has-error' : ''}}">
	        {!! Form::label('goto_inbox', 'صندوق رسائل الموقع', ['class' => 'col-md-4 control-label']) !!}
	        <div class="col-md-8">
	            <div class="checkbox">
	            	<label>{!!Form::checkbox('goto_inbox', 1, true)!!} إرسال إلى صندوق الرسائل بالموقع </label>
	            </div>
	            {!! $errors->first('goto_inbox', '<p class="help-block">:message</p>') !!}
	        </div>
	    </div>

	    <div class="form-group {{ $errors->has('goto_email') ? 'has-error' : ''}}">
	        {!! Form::label('goto_email', 'إرسال للبريد اﻹلكتروني', ['class' => 'col-md-4 control-label']) !!}
	        <div class="col-md-8">
	            <div class="checkbox"><label>{!!Form::checkbox('goto_email', 1, false)!!}
	            	إرسال إلى البريد اﻹلكتروني: {{$candidate->email}}</label>
	            </div>
	            {!! $errors->first('goto_email', '<p class="help-block">:message</p>') !!}
	        </div>
	    </div>
	    <div class="form-group">
	        <div class="col-md-offset-4 col-md-4">
	            {!! Form::submit(' إرســـــال ', ['class' => 'btn btn-success']) !!}
	            <a href="javascript:$.magnificPopup.close();" class="btn btn-light">إلغاء</a>
	        </div>
	    </div>
    {!! Form::close() !!}

</div>