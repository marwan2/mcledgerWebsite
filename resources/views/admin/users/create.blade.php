@extends('admin.layouts.master')
@section('title') Admin Users @endsection
@section('content')
    <section class="content-header">
      <h1>Admin Users</h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('admin/users')}}">Admin Users</a></li>
        <li><a href="{{url('admin/users/create')}}">Add new user</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add new user</h3>
          <div class="box-tools pull-right">
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
            {!! Form::open(['url' => 'admin/users', 'class' => 'form-horizontal', 'files' => true]) !!}

            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('name', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Email', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('email', null, ['class' => 'form-control','style'=>'direction:ltr','autocomplete'=>'off']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                {!! Form::label('password', 'Password', ['class' => 'col-md-3 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::password('password', ['class' => 'form-control','autocomplete'=>'off']) !!}
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
    
            <div class="image">
                {!!App\Helper::image_field('logo', @$user, 'Profile Picture')!!}
            </div>

            <div class="form-group">
                <div class="col-md-offset-3 col-md-6">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    <a href="{!!url('admin/users')!!}" class="btn btn-default">Cancel</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@include('admin.users.password_modal')
@endsection
@section('script')
    
@endsection