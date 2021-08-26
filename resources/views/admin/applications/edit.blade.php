@extends('admin.layouts.master')

@section('content')
    <section class="content-header">
      <h1>المشتركون بالنشرة</h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="{{url('admin/subscribers')}}">المشتركون بالنشرة</a></li>
        <li><a href="{{url('admin/subscribers/create')}}">+ Add</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">المشتركون بالنشرة: {{ $subscriber->id }}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="إغلاق">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::model($subscriber, [
                'method' => 'PATCH',
                'url' => ['admin/subscribers', $subscriber->id],
                'class' => 'form-horizontal',
                'files' => true
            ]) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'اﻻسم', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
                {!! Form::label('mobile', 'المحمول', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'البريد', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('replied') ? 'has-error' : ''}}">
                {!! Form::label('replied', 'تم الرد', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                <div class="checkbox">
                    <label>{!! Form::radio('replied', '1') !!} نعم</label>
                    <label>{!! Form::radio('replied', '0', true) !!} ﻻ</label>
                </div>
                    {!! $errors->first('replied', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    {!! Form::submit('حفظ التعديل', ['class' => 'btn btn-primary']) !!}
                    <a href="{!!url('admin/subscribers')!!}" class="btn btn-light">إلغاء</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection