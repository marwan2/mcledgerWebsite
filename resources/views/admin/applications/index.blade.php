@php
    use App\Helper;
    $page_title = 'Job Applications';
@endphp
@extends('admin.layouts.master')
@section('title') {{$page_title }} @endsection
@section('content')
<section class="content-header">
    <h1 class="text-primary">{{$page_title}}
        <small class="text-muted">(Total: {{$applications->count()}})</small>
    </h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('admin')}}"> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{url('admin/applications')}}">{{$page_title}}</a></li>
          </ol>
    </nav>
</section>
<section class="content">
  <div class="box">
    <div class="box-header with-border">
    </div>
    <div class="box-body">
        <div class="table">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th style="width:60px;">ID</th>
                        <th style="width:100px;">Short listed</th>
                        <th>Job</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($applications as $item)
                    <tr class="{{($item->read==0)?'unread':''}}">
                        <td>{{ $item->id }}</td>
                        <td>{!! Helper::sw($item, 'shorted', 'JobApplication') !!}</td>
                        <td>{{ $item->job }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->mobile }}</td>
                        <td><a href="mailto:{{$item->email}}">{{$item->email}}</a></td>
                        <td>
                            <a href="{{url('jobapp/preview/'.$item->id)}}" target="_blank" class="btn btn-info">Preview</a> 
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['admin/applications', $item->id],
                                'style' => 'display:inline'
                            ]) !!}
                            {!! Form::button('<i class="fa fa-trash-alt" aria-hidden="true" title="Delete"></i>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger',
                                    'title' => 'Delete Message',
                                    'onclick'=>'return confirm("Delete record: Are you sure?")'
                            )) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!!$applications->links()!!}
        </div>
    </div>        
  </div>
</section>
<style type="text/css">
    .unread td {font-weight: bold;}
</style>
@endsection