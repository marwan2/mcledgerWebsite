<?php use App\Helper; ?>
@extends('admin.layouts.master')
@section('title') Blog | @endsection
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Show article: <strong>{{Helper::field($row,'title')}}</strong></div>
    <div class="panel-body">

        <a href="{{ url('admin/blog') }}" class="btn btn-light btn-sm">Go Back</a>
        <a href="{{ url('admin/blog/'.$row->id.'/edit') }}" class="btn btn-primary btn-sm" title="Edit"><span class="fa fa-pencil" /> Edit</a>
        <a href="{{ url('admin/blog_comments?article_id='.$row->id) }}" class="btn btn-warning btn-sm">Comments</a>
        <a href="{{ App\Blog::url($row) }}" target="_blank" class="btn btn-warning btn-sm">Preview on Website</a>
        {!! Form::open(['method'=>'DELETE', 'url' => ['admin/blog', $row->id], 'style' => 'display:inline']) !!}
        {!! Form::button('<span class="fa fa-trash-o" />', array(
            'type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title'=>'Delete', 'onclick'=>'return confirm("Confirm delete?")'
        ))!!}
        {!! Form::close() !!}
        <br/><br/>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                    <tr><th width='150'>ID</th><td>{{ $row->id }}</td></tr>
                    <tr><th>Created on</th><td>{{ Carbon\Carbon::parse($row->created_at)->format('l jS \\of F Y h:i:s A') }}</td></tr>
                    <tr><th>Last Update</th><td>{{ Carbon\Carbon::parse($row->updated_at)->format('l jS \\of F Y h:i:s A') }}</td></tr>
                    <tr><th> Category </th><td> {{ $row->category->title }} </td></tr>
                    <tr><th> Article Title </th><td>{{Helper::field($row,'title')}}</td></tr>
                    <tr><th> Article Body </th><td>{!!Helper::field($row,'details')!!}</td></tr>
                    <tr><th> Image </th><td> {!!Helper::image($row->image,['class'=>'img-responsive'])!!} </td></tr>
                    <tr><th> Active </th><td>{!!Helper::sw($row,'active','Blog')!!}</td>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection