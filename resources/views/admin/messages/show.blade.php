<?php 
    use App\Helper;
    $default_subject = 'رد على الرسالة: ' . $message->subject;
?>
@extends('admin.layouts.master')
@section('title') Messages > {{$message->subject}} @endsection
@section('content')

    <section class="content-header">
      <h1>Messages</h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"> Home</a></li>
        <li><a href="{{url('admin/messages')}}">Messages</a></li>
        <li><a href="#">View message</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title">View message from: {{ $message->name }}</h3>
        </div>
        <div class="card-body">
            {!! Form::open([
                'method'=>'DELETE',
                'url' => ['admin/messages', $message->id],
                'style' => 'display:inline'
            ]) !!}
                {!! Form::button('<i class="fa fa-trash-alt" aria-hidden="true"></i> Delete', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-sm',
                        'title' => 'Delete Message',
                        'onclick'=>'return confirm("Confirm delete?")'
                ))!!}
            {!! Form::close() !!}
            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <tbody>
                        <tr><th style="width:140px;">ID</th><td>{{ $message->id }}</td></tr>
                        <tr><th>Date</th><td>{{ $message->created_at }} ({{Carbon\Carbon::parse($message->created_at)->diffForHumans()}})</td></tr>
                        <tr><th> Name </th><td> {{ $message->name }} </td></tr>
                        <tr><th> Email </th><td> <a href="mailto:{{$message->email}}">{{$message->email}}</a></td></tr>
                        <tr><th> Subject </th><td> {{ $message->subject }} </td></tr>
                        <tr><th> Message</th><td> {!! $message->message !!} </td></tr>
                        <tr><th> Replied </th><td><strong>{!!Helper::sw($message,'replied','Message')!!}
                        </strong>
                        </td></tr>
                    </tbody>
                </table>
            </div>
            <a name="replies"></a>
            <div class="well d-none">
                <div class="row">
                    <div class="col-md-12">
                        <legend>الردود المرسلة من إدارة الموقع</legend>
                        @if(isset($message->replies) && $message->replies->count()>0)
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <th>عنوان الرسالة</th>
                                    <th>نص الرسالة</th>
                                    <th>تاريخ الإرسال</th>
                                </thead>
                                <tbody>
                                    @foreach($message->replies as $reply)
                                        <tr>
                                            <td>{{$reply->subject}}</td>
                                            <td>{!!$reply->body!!}</td>
                                            <td>{{Carbon\Carbon::parse($reply->created_at)->diffForHumans()}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">لا يوجد ردود حتى الأن</div>
                        @endif
                    </div>
                </div>
            </div>
            <a name="addreply"></a>
            <div class="well d-none">
                <div class="row">
                    <div class="col-md-12">
                        <legend>اضافة رد</legend>
                            <div class="row"> 
                            {!! Form::open(['url'=>'admin/compose/reply','class'=>'form-horizontal', 'method'=>'POST']) !!}
                            {!!Form::hidden('record_id', $message->id)!!}
                            {!!Form::hidden('id_field', 'enquiry_id')!!}
                            {!!Form::hidden('model', 'Enquiry')!!}
                            {!!Form::hidden('model_reply', 'EnquiryReply')!!}
                            <div class="col-md-9">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
                                        {!! Form::label('subject', 'عنوان الرسالة', ['class' => 'control-label']) !!}
                                        {!! Form::text('subject', $default_subject,['class'=>'form-control', 'required'=>'required']) !!}
                                        {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
                                        {!! Form::label('body', 'نص الرسالة', ['class' => 'control-label']) !!}
                                        {!! Form::textarea('body',null,['class'=>'form-control editor','required'=>'required'])!!}
                                        {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" style="margin-top: 20px;">
                                    <div class="checkbox"><label>
                                        @if($user)
                                            {!!Form::checkbox('goto_inbox', 1, true)!!}
                                        @else
                                            {!!Form::checkbox('goto_inbox', 1, false, ['disabled'=>'disabled'])!!}
                                        @endif
                                        إرسال إلى صندوق Messages بالموقع </label>
                                    </div>

                                     @if($user)
                                        <div class="label label-success">يوجد حساب لصاحب الرسالة بالفعل</div>
                                     @else
                                        <div class="label label-danger">لا يوجد حساب بالموقع لصاحب الرسالة</div>
                                     @endif
                                </div>
                                <div class="form-group" style="margin-top: 20px;">
                                    <div class="checkbox"><label>{!!Form::checkbox('goto_email', 1, true)!!}
                                    إرسال إلى البريد اﻹلكتروني ({{$message->email}})</label></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::submit(' إرســـــال الرد', ['class' => 'btn btn-lg btn_loading btn-success']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="{!!url('admin/messages')!!}" class="btn btn-light">Go back</a>
        </div>
    </div>
@endsection