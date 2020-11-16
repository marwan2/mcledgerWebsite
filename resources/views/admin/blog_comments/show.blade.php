<?php
    use App\Helper;
    use App\Blog;
    use Carbon\Carbon;
?>
@extends('admin.layouts.master')
@section('title') Blog Comment #{{ $comment->id }} - @endsection
@section('content')
    <div class="card card-default">
        <div class="card-heading">Blog Comment #{{ $comment->id }}</div>
        <div class="card-body">

            {!! Form::open([
                'method'=>'DELETE',
                'url' => ['admin/blog_comments', $comment->id],
                'style' => 'display:inline'
            ]) !!}
                {!! Form::button('<i class="fa fa-trash-o"></i> Delete Comment ', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger',
                        'title' => 'Delete Comment',
                        'onclick'=>'return confirm("Delete comment: Are you sure?")'
                ))!!}
            {!! Form::close() !!}
            <br/>
            <br/>

            <div class="row">
                <div class="col-md-12 text-center" style="margin-bottom:20px;">
                    <legend>Blog Article: </legend>
                    <a href="{{Blog::url($comment->article)}}" target="_blank">{{$comment->article->title}}</a>
                </div>
                <div class="col-md-7">
                    <legend> Comment:</legend>
                    <div class="well">
                        <strong>{{ $comment->comment }} </strong>
                    </div>
                </div>

                <div class="col-md-5">
                    <legend>Info</legend>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <tbody>
                                <tr><th style="width:140px;">ID</th><td>{{ $comment->id }}</td></tr>
                                <tr><th>Date added</th><td>{{ Carbon::parse($comment->created_at)->format('l, F jS, Y h:i A') }}</td></tr>
                                <tr><th>Last update</th><td>{{ Carbon::parse($comment->updated_at)->format('l, F jS, Y h:i A') }}</td></tr>
                                <tr><th> Name </th><td> {{ $comment->name }} </td></tr>
                                <tr><th> Email </th><td> <a href="mailto:{{$comment->email}}">{{$comment->email}}</a></td></tr>
                                <tr><th> Approved </th><td>{!!Helper::sw($comment,'active','BlogComment')!!}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            
            <div class="text-center">
                <a href="{{url('admin/blog_comments')}}" class="btn btn-sm btn-light">Go Back</a>
            </div>
        </div>
    </div>
@endsection