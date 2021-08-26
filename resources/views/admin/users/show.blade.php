@extends('admin.layouts.master')
@section('title') Admin Users @endsection
@section('content')
    <section class="content-header">
      <h1>Account Profile</h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('admin/users')}}">Admin Users</a></li>
        <li><a href="{{url('admin/users/show')}}">Show</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">ID: {{ $user->id }}</h3>
          <div class="box-tools pull-right">
          </div>
        </div>
        <div class="box-body">
            <a href="{{ url('admin/users/' . $user->id . '/edit') }}" class="btn btn-primary" title="Edit"><i class="fa fa-pencil"></i> Edit profile</a>
            <a href="{{url('admin/users/login/'.$user->id)}}" class="btn btn-warning" title="Login by this account">Login by this account</a>

            {!! Form::open([
                'method'=>'DELETE',
                'url' => ['admin/users', $user->id],
                'style' => 'display:inline'
            ]) !!}
                {!! Form::button('<span class="fa fa-trash-alt" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger',
                    'title' => 'Delete User',
                    'onclick'=>'return confirm("Delete account: Are you sure?")'
                ))!!}
            {!! Form::close() !!}
            <br/><br/>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        <tr><th width="220">ID</th><td>{{ $user->id }}</td></tr>
                        <tr><th> Name </th><td> {{ $user->name }} </td></tr>
                        <tr><th> Email </th><td> {{ $user->email }} </td></tr>
                        <tr><th> Password </th><td> ********* </td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer">
            <a href="{!!url('admin/users')!!}" class="btn btn-light">Go Back</a>
        </div>
    </div>
@endsection