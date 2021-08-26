<?php
    use App\Helper;
    $page_title = 'Newsletter Subscribers';
?>
@extends('admin.layouts.master')
@section('title') {{$page_title }} @endsection
@section('content')
    <section class="content-header">
        <h1 class="text-primary">{{$page_title}}
            <small>(Total: {{$subscribers->count()}})</small>
        </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin')}}"> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{url('admin/subscribers')}}">{{$page_title}}</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
        </div>
        <div class="box-body">
            <div class="table">
                <table class="table table-striped table-hover table-bordered dataTable">
                    <thead>
                        <tr>
                            <th style="width:60px;">ID</th>
                            <th style="width:100px;">Unsubscribed</th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($subscribers as $item)
                        <tr class="{{($item->read==0)?'unread':''}}">
                            <td>{{ $item->id }}</td>
                            <td>{!! Helper::sw($item, 'unsubscribed', 'Subscriber') !!}</td>
                            <td>{{ $item->name }}</td>
                            <td><a href="mailto:{{$item->email}}">{{$item->email}}</a></td>
                            <td>
                                {{-- <a href="{{ url('admin/subscribers/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm" title="Edit Message"><span class="fa fa-pencil" aria-hidden="true"/></a> --}}
                                {!! Form::open([
                                    'method'=>'DELETE',
                                    'url' => ['admin/subscribers', $item->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<span class="fa fa-trash-alt" aria-hidden="true" title="Delete" />', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'Delete Message',
                                            'onclick'=>'return confirm("Delete record: Are you sure?")'
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
    <style type="text/css">
        .unread td {font-weight: bold;}
    </style>
@endsection