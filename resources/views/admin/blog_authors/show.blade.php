<?php use App\Helper; ?>
@extends('admin.layouts.master')
@section('title') Blog Authors - @endsection
@section('content')
<div class="card card-default">
    <div class="card-heading">Show: <strong>{{Helper::field($row,'name')}}</strong></div>
    <div class="card-body">

        <a href="{{ url('admin/blog_authors') }}" class="btn btn-light btn-sm">العودة</a>
        <a href="{{ url('admin/blog_authors/'.$row->id.'/edit') }}" class="btn btn-primary btn-sm" title="Edit"><span class="fa fa-pencil" /></a>
        {!! Form::open(['method'=>'DELETE', 'url' => ['admin/blog_authors', $row->id], 'style' => 'display:inline']) !!}
        {!! Form::button('<span class="fa fa-trash-o" />', array(
            'type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'Delete', 'onclick'=>'return confirm("Confirm delete?")'
        ))!!}
        {!! Form::close() !!}
        <br/>
        <br/>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                    <tr><th width='150'>الرقم</th><td>{{ $row->id }}</td></tr>
                    <tr><th>تاريخ الإضافة</th><td>{{ Carbon\Carbon::parse($row->created_at)->format('l jS \\of F Y h:i:s A') }}</td></tr>
                    <tr><th>اخر تعديل</th><td>{{ Carbon\Carbon::parse($row->updated_at)->format('l jS \\of F Y h:i:s A') }}</td></tr>
                    <tr><th> العنوان </th><td>{{Helper::field($row,'name')}}</td></tr>
                    <tr><th> نبذة </th><td>{!!Helper::field($row,'details')!!}</td></tr>
                    <tr><th> الصورة </th><td> {!!Helper::image($row->image,['class'=>'img-responsive'])!!} </td></tr>
                    <tr><th> إظهار بالموقع </th><td>{!!Helper::sw($row,'active','BlogAuthor')!!}</td>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection