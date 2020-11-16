<?php
    use App\Helper;
    $blocks = [
        [
            'label'=>'Newsletter Subscribers',
            'url'=>'subscribers',
        ],[
            'label'=>'Blog Articles',
            'url'=>'blog',
        ],[
            'label'=>'Blog Comments',
            'url'=>'blog_comments',
        ],[
            'label'=>'Contact Messages',
            'url'=>'messages',
        ],[
            'label'=>'Bulk Emails',
            'url'=>'compose',
        ],
    ];
?>
@extends('admin.layouts.master')

@section('content')
<div class="col-md-12">
    <div class="row" style="margin-top:20px;">
        @foreach($blocks as $in)
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$counts[$in['url']]}}</h3>
                        <p>{{$in['label']}}</p>
                    </div>
                    <div class="icon"><i class="ion ion-bag"></i></div>
                    <a class="small-box-footer" href="{{url('admin/'.$in['url'])}}">
                        Details
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
