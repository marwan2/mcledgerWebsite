@php
    use App\Helper;
    use App\Blog;
    use App\BlogCategory;

    $q = trim(Request::get('q'));
@endphp
@extends('front.layouts.master')
@section('title') Search results of: {{$q}} @endsection
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
            <h3 class="mb-5">Search results for keyword: 
                <div class="badge badge-dark badge-pill">{{Request::get('q')}}</div>
            </h3>
            
            <form action="{{url('blog/search')}}" method="GET" class="searchBlogForm">
              <div class="input-group blog_search">
                <input type="text" name="q" value="{{Request::get('q')}}" class="form-control" placeholder="Search articles" aria-label="Search" aria-describedby="btnSearch">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary" type="submit" id="btnSearch"><i class="bx bx-search"></i></button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
</section>

<main id="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-lg-1 order-2 iq-rmt-40">
				<div class="row">
                    @if($blog && $blog->count() > 0)
                        @each('front.blog.single', $blog, 'post')
                    @else
                        <div class="col-sm-12 mt-4">
                            <div class="alert alert-warning text-center rounded-lg">No results found.</div>
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
</main>

@endsection