@extends('admin.layouts.master')
@section('title') Admin Users @endsection
@section('content')
    <section class="content-header">
      <h1>Admin Users</h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('admin/users')}}">Admin Users</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit user: {{$user->name}}</h3>
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

            {!! Form::model($user, [
                'method' => 'PATCH',
                'url' => ['admin/users', $user->id],
                'class' => 'form-horizontal',
                'files' => true,
                'autocomplete'=>'off'
            ]) !!}

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
                    {!! Form::text('email', null, ['class'=>'form-control','style'=>'direction:ltr','autocomplete'=>'off']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="image">
                {!!App\Helper::image_field('logo', @$user, 'Profile picture')!!}
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Password', ['class'=>'col-md-3 control-label']) }}
                <div class="col-md-6">
                    <a href="#" class="btn btn-warning btn_changepass" data-id="{{$user->id}}" data-toggle="modal" data-target="#ChangePassModal">Change Password</a>
                </div>
            </div>
            <hr><br>
            <div class="form-group">
                <div class="col-md-offset-3 col-md-6">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{!!url('admin/users')!!}" class="btn btn-light">Cancel</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@include('admin.users.password_modal')
@endsection
@section('script')
    
@endsection