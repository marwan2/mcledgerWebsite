<?php
    use App\Helper;
?>
@extends('admin.layouts.master')
@section('title') Messages @endsection
@section('content')
<section class="content-header">
      <h1>Messages</h1>
      <nav rel="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/messages')}}">Messages</a></li>
          </ol>
      </nav>
</section>
<section class="content">
    <div class="card card-default">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12"> 
                    {!! Form::open(['method' => 'GET', 'url'=>'admin/messages', 'class'=>'navbar-form navbar-right'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Replied</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td><a href="mailto:{{$item->email}}">{{$item->email}}</a></td>
                            <td>{{ $item->subject }}</td>
                            <td><strong>{{ $item->message }}</strong></td>
                            <td>{!!Helper::sw($item,'replied','Enquiry')!!}</td>
                            <td nowrap="">
                                <a href="{{ url('/admin/messages/' . $item->id) }}" title="View Message"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['/admin/messages', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-alt" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'Delete Message',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                    )) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $messages->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>
    </div>
</section>
@endsection
