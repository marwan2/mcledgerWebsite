@php
    use App\Helper; 
@endphp
@extends('admin.layouts.master')
@section('title') المدونة | الأقسام | @endsection
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">عرض: <strong>{{Helper::field($row,'title')}}</strong></div>
    <div class="panel-body">

        <a href="{{ url('admin/blog_categories') }}" class="btn btn-light btn-sm">العودة</a>
        <a href="{{ url('admin/blog_categories/'.$row->id.'/edit') }}" class="btn btn-primary btn-sm" title="Edit"><span class="fa fa-pencil" /></a>
        {!! Form::open(['method'=>'DELETE', 'url' => ['admin/blog_categories', $row->id], 'style' => 'display:inline']) !!}
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
                    <tr><th> العنوان </th><td>{{$row->title}}</td></tr>
                    <tr><th> إظهار بالموقع </th><td>{!!Helper::sw($row,'active', 'BlogCategory')!!}</td>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection