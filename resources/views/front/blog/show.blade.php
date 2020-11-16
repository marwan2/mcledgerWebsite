@php
   use App\Helper;
   use App\Blog;
   use App\BlogCategory;
   use App\BlogAuthor;
@endphp
@extends('front.layouts.master')
@section('title') {{$item->title}} - @stop
@section('meta_desc') {{ ($item->meta_desc) ? $item->meta_desc : Str::limit($item->details, 500) }} @stop
@section('meta_img') {!! Helper::metaImage($item->image) !!} @stop
@section('meta_keywords') {{str_replace(' ', ',', $item->title)}} @stop
@section('content')
<section id="hero" class="d-flex align-items-center about-hero" style="height: 60vh">
   <div style="width: 50%; height: 60vh; position: absolute; top: 0; right:0; background-color: #eff0ff; border-bottom-left-radius: 50px; z-index: 2; content: ''"></div>
   <div class="container" data-aos="fade-up" style="z-index: 3;">
      <div class="row justify-content-center pt-5">
         <div class="col-lg-6 order-2 order-lg-2 hero-img p-5" data-aos="zoom-in" data-aos-delay="150">
            {!!Blog::getImage($item, 'animated mw-100 rounded-lg', false, false)!!}
         </div>
         <div class="col-lg-6 pt-3 pt-lg-0 order-1 order-lg-1 d-flex flex-column justify-content-center">
            <h2 class="mb-0">Blog <i class='bx bx-chevron-right bx-flip-vertical' ></i> post</h2>
            <h1 class="mb-5">{{$item->title}}</h1>
            <div class="post_tags mb-3">
               <a href="{{BlogCategory::url($item->category)}}" class="btn btn-light bg-white">{{$item->category->title}}</a>
               <div class="btn btn-light bg-white">{{Blog::date($item)}}</div>
               <div class="btn btn-light bg-white">{{$item->views}} views</div>
            </div>
         </div>
      </div>
   </div>
</section>
<main id="main">
   <section class="blog_tags_search pt-0">
      <div class="container">
         <div class="row">
            <div class="col-md-8">
               <div class="post_details mt-5"> 
                  {!! $item->details !!}
               </div>
               <div class="blog-finding">
                  <ul class="d-inline-block float-right">
                     <li class="d-inline-block mr-3"><a href="javascript:void(0)"><i class="far fa-thumbs-up"></i> <span class="iq-fw-6">{{$item->likes}}</span></a></li>
                     <li class="d-inline-block"><a href="javascript:void(0)" title="Comments"><i class="bx bx-comment"></i> <span class="iq-fw-6">{{$item->comments_count}}</span></a></li>
                  </ul>
                  @if($item->tags)
                     <h5 class="mt-5">Keywords: </h5>
                     <div class="iq-tags list-inline">
                        @foreach(explode(',', $item->tags) as $tag)
                        <a href="{{Blog::tag_url($tag)}}" class="btn btn-outline-info mb-2 mr-2">{{$tag}}</a>
                        @endforeach
                     </div>
                  @endif
               </div>
               <div class="clearfix"></div>
               
               <h2 class="title iq-fw-8 mt-5 mb-3">Comments</h2>
               @include('front.blog.commentform' , ['id'=>$item->id, 'model'=>'Blog'])
            </div>
         </div>
      </div>
   </section>
</main>
@endsection
@section('scripts')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dcdd25db4de698f"></script>
@endsection