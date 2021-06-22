<?php $page_title = 'Work With Us'; ?>
@extends('front.layouts.master')
@section('title') {{$page_title}} - @endsection
@section('content')
<section class="iq-breadcrumb">
    <div class="iq-breadcrumb-img">
        <img src="{{url('images/breadcrumb/02.png')}}" class="img-fluid breadcrumb-two" alt="">
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="formStatus">
                    @if(session()->has('message'))
                        <div class="alert alert-{{session()->get('type')}}">
                            {{session()->get('message')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection