@extends('admin.layouts.master')

@section('content')

    <section class="content-header">
      <h1>المشتركون بالنشرة</h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li><a href="{{url('admin/subscribers')}}">المشتركون بالنشرة</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">عرض الرسالة {{ $subscriber->id }}</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="إغلاق">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <a href="{{ url('admin/subscribers/' . $subscriber->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit subscriber"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
            {!! Form::open([
                'method'=>'DELETE',
                'url' => ['admin/subscribers', $subscriber->id],
                'style' => 'display:inline'
            ]) !!}
                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs',
                        'title' => 'Delete subscriber',
                        'onclick'=>'return confirm("Confirm delete?")'
                ))!!}
            {!! Form::close() !!}
            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        <tr><th style="width:110px;">رقم</th><td>{{ $subscriber->id }}</td></tr>
                        <tr><th> القسم </th><td> {{ App\subscriber::$departments[$subscriber->department] }} </td></tr>
                        <tr><th> المحمول </th><td> {{ $subscriber->mobile }} </td></tr>
                        <tr><th> البريد </th><td> {{ $subscriber->email }} </td></tr>
                        <tr><th> نص الرسالة</th><td> {{ $subscriber->subscriber }} </td></tr>
                        <tr><th> تم الرد </th><td>{!!App\Helper::sw($subscriber,'replied','subscriber')!!}</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer">
            <a href="{!!url('admin/subscribers')!!}" class="btn btn-light">العودة</a>
        </div>
    </div>
@endsection