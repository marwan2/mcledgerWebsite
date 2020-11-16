<?php
	use App\Helper;
	use App\Blog;
?>
@extends('front.layouts.master')
@section('title') {{$author->title}} blog posts | @endsection
@section('content')
<section class="iq-breadcrumb">         
    <div class="iq-breadcrumb-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-7 align-self-center">
                    <h2 class="iq-fw-8 mb-3">
                        Author Posts
                        <br>
                        <small>{{$author->name}}</small>
                    </h2>                    
                </div>
            </div>
        </div>
    </div>
</section>
<div class="main-content">
    <section class="iq-blogs">
        <div class="container">
            <div class="">
            <h2 class="iq-fw-8 mb-4">{{$author->name}}</h2>
            </div>
            <div class="row">
                @include('front.blog.sidebar')
                <div class="col-lg-8 order-lg-1 order-2 iq-rmt-40">
                    <div class="row">
                        @if($blog && $blog->count() > 0)
                            @each('front.blog.single_post', $blog, 'post')
                        @else
                            <div class="col-sm-12">
                                <div class="alert alert-warning">No articles found</div>
                            </div>
                        @endif
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-12">
                            <nav class="justify-content-center">
                            {!!$blog->links()!!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection