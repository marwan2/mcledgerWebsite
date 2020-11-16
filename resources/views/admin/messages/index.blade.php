<?php
    use App\Helper;
?>
@extends('admin.layouts.master')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Messages</div>
    <div class="panel-body">
        <div class="row">
            {!! Form::open(['method' => 'GET', 'url'=>'admin/messages', 'class'=>'navbar-form navbar-right'])  !!}
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>
            {!! Form::close() !!}
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
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
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
@endsection
