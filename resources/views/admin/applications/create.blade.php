@extends('admin.layouts.master')

@section('content')
    <section class="content-header">
      <h1>المشتركون بالنشرة</h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="{{url('admin/subscribers')}}">المشتركون بالنشرة</a></li>
        <li><a href="{{url('admin/subscribers/create')}}">اضافة</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">اضافة جديد</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="إغلاق">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
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

            {!! Form::open(['url' => '/admin/subscribers', 'class' => 'form-horizontal', 'files' => true]) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
                {!! Form::label('mobile', 'Mobile', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('replied') ? 'has-error' : ''}}">
                {!! Form::label('replied', 'Replied', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                                <div class="checkbox">
                <label>{!! Form::radio('replied', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('replied', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('replied', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    <a href="{!!url('admin/subscribers')!!}" class="btn btn-light">Cancel</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection