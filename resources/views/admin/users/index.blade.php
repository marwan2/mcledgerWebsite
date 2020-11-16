<?php
    use App\Helper;
    use App\User;
?>
@extends('admin.layouts.master')
@section('title') Admins @endsection
@section('content')
    <section class="content-header">
      <h1>Admins</h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('admin/users')}}">Admins</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <div class="box-title"><a href="{{ url('admin/users/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> New admin user</a></div>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="إغلاق">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div class="table">
                <table class="table table-borderless dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Picture </th>
                            <th>Email verified </th>
                            <th>Name </th>
                            <th>Email </th>
                            <th>Password </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{!!Helper::image($item->logo,['width'=>60])!!}</td>
                            <td>{!!Helper::sw($item,'active','User')!!}</td>
                            <td><a href="{{url('admin/users/'.$item->id.'/edit')}}"><strong>{{$item->name}}</strong></a></td>
                            <td>{{ $item->email }}</td>
                            <td>*****</td>
                            <td>
                                <a href="{{ url('admin/users/' . $item->id) }}" class="btn btn-success btn-sm" title="View"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                <a href="{{ url('admin/users/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm" title="Edit"><span class="fa fa-pencil" aria-hidden="true"/></a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/admin/users', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<span class="fa fa-trash-o" aria-hidden="true" title="Delete" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-sm',
                                        'title' => 'Delete',
                                        'onclick'=>'return confirm("Delete account: Are you sure?")'
                                    )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>        
      </div>
    </section>
@endsection