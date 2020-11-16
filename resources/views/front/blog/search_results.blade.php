<?php
    use App\Helper;
    use App\Blog;
    use App\BlogCategory;

    $q = trim(Request::get('q'));
?>
@extends('front.layouts.master')
@section('title') Search results of: {{$q}} @endsection
@section('content')

<section class="iq-breadcrumb">         
    <div class="iq-breadcrumb-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-7 align-self-center">
                    <h2 class="iq-fw-8 mb-3">Blog</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="main-content">
    <section class="iq-blogs">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <h4 class="">Search results for keyword: <div class="badge badge-dark badge-pill">{{Request::get('q')}}</div>
                </div>
                @include('front.blog.sidebar')
                <div class="col-lg-8 order-lg-1 order-2 iq-rmt-40">
					<div class="row">

                        @if($blog && $blog->count() > 0)
                            @each('front.blog.single', $blog, 'post')
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