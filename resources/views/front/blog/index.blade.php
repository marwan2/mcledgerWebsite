@php
    use App\Helper;
    use App\Blog;
    use App\BlogCategory;
@endphp
@extends('front.layouts.master')
@section('title') Blog - @endsection
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
          <h3 class="mb-5">Find Out McLedger announcements, News, tips and tricks</h3>
        </div>
      </div>
    </div>
  </section>
  <main id="main">
    <section class="blog_tags_search">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <a href="{{url('blog')}}" class="btn btn-primary border-0 btn_bg mr-2">All</a>
            @foreach($blog_cats as $cat)
            <a href="{{BlogCategory::url($cat)}}" class="btn btn-light base_color mr-2">{{$cat->title}}</a>
            @endforeach
          </div>
          <div class="col-md-3">
            <form action="{{url('blog/search')}}" method="GET">
              <div class="input-group blog_search">
                <input type="text" name="q" class="form-control" placeholder="Search articles" aria-label="Search" aria-describedby="btnSearch">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary" type="submit" id="btnSearch"><i class="bx bx-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-5">
          @if($blog && $blog->count() > 0)
            @each('front.blog.single', $blog, 'post')
          @else
            <div class="col-sm-12">
                <div class="alert alert-warning">No articles found</div>
            </div>
          @endif
        </div>
      </div>
    </section>
    <section class="pt-0">
      <div class="container text-center">
        <nav class="justify-content-center blog_paging" aria-label="Page navigation example">
        {!!$blog->links()!!}
        </nav>
        {{-- <nav aria-label="Page navigation example">
          <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item disabled">
              <a class="page-link rounded-pill mr-2 ml-2" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link rounded-pill mr-2 ml-2" href="#">1</a></li>
            <li class="page-item"><a class="page-link rounded-pill mr-2 ml-2" href="#">2</a></li>
            <li class="page-item"><a class="page-link rounded-pill mr-2 ml-2" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link rounded-pill mr-2 ml-2" href="#">Next</a>
            </li>
          </ul>
        </nav> --}}
      </div>
    </section>
  </main>
@stop