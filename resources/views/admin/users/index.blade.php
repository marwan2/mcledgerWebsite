<?php
    use App\Helper;
    use App\User;
?>
@extends('admin.layouts.master')
@section('title') Admins @endsection
@section('content')
    <section class="content-header">
      <h1>Admins</h1>
      <nav rel="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/users')}}">Admins</a></li>
          </ol>
      </nav>
    </section>
    <section class="content">
      <div class="card">
        <div class="card-header with-border">
          <div class="card-title"><a href="{{ url('admin/users/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> New admin user</a></div>
        </div>
        <div class="card-body">
            <div class="table">
                <table class="table table-bordered table-striped">
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
                                <a href="{{ url('admin/users/' . $item->id) }}" class="btn btn-success" title="View"><span class="fa fa-eye" aria-hidden="true"/></a>
                                <a href="{{ url('admin/users/' . $item->id . '/edit') }}" class="btn btn-primary" title="Edit"><i class="fa fa-pen" aria-hidden="true"></i></a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/admin/users', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<span class="fa fa-trash-alt" aria-hidden="true" title="Delete" />', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger',
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