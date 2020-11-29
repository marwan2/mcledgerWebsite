@php
	use App\Helper;
	use App\Blog;
@endphp
@extends('front.layouts.master')
@section('title') {{$category->title}} - @endsection
@section('content')
<section id="hero" class="d-flex align-items-center about-hero blog-hero">
    <div class="blog_hero_bg"></div>
    <div class="container" data-aos="fade-up" style="z-index: 3;">
      <div class="row justify-content-center pt-5">
        <div class="col-lg-7 order-2 order-lg-2 hero-img p-5" data-aos="zoom-in" data-aos-delay="150">
          <img src="{{url('assets/img/blog_hero.png')}}" class="animated mw-100" alt="">
        </div>
        <div class="col-lg-5 pt-3 pt-lg-0 order-1 order-lg-1 d-flex flex-column justify-content-center">
          <p class="mb-2">Blog</p>
          <h3 class="mb-5">{{$category->title}}</h3>
        </div>
      </div>
    </div>
</section>
  <main id="main">
    <section class="blog_tags_search">
        <div class="container">
            <div class="row">
                @include('front.blog.sidebar')
                <div class="col-lg-9 order-lg-1 order-2 iq-rmt-40">
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
</main>
@endsection