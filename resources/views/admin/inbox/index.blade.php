@extends('admin.layouts.master')

@section('content')
    <section class="content-header">
      <h1>الرسائل</h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"> الرئيسية</a></li>
        <li><a href="{{url('admin/compose')}}">الرسائل</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="إغلاق">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="إخفاء">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body text-center">
            <div class="well well-sm">
              <legend>عدد مرات إرسال رسالة جماعية هو: {{$emailsbulk->count()}}</legend>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>رقم</th>
                    <th>عنوان الرسالة</th>
                    <th>عدد المشتركين المرسل إليهم</th>
                    <th>التاريخ</th>
                  </tr>
                </thead>
                <tbody>
                  @if($emailsbulk->count()>0)
                    @foreach($emailsbulk as $bulk)
                    <tr>
                      <td>{{$bulk->id}}</td>
                      <td><strong><a href="{{url('admin/compose/bulkshow/'.$bulk->id)}}" class="popup">{{$bulk->subject}}</a></strong></td>
                      <td>
                        <?php $candidates = unserialize($bulk->candidates_received); ?>
                        {{count($candidates)}}
                      </td>
                      <td>{{Carbon\Carbon::parse($bulk->created_at)->diffForHumans()}}</td>
                    </tr>
                    @endforeach
                  @else
                    <tr><td colspan="4">ﻻ يوجد إحصائيات حاليا</td></tr>
                  @endif
                </tbody>
              </table>
            </div>

            <a href="{{url('admin/compose/bulk')}}" class="btn btn-primary">إرسال رسالة جماعية جديدة</a> 
            <br><br>
            <p>يمكنك إرسال رسالة لكل مشتركي النشرة أو بعضهم</p>
        </div>        
      </div>
    </section>
@endsection
@section('script')
@include('admin.layouts.popup')
@endsection