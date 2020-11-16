@extends('front.layouts.master')
@section('title') Blog - Status @endsection
@section('content')
<section class="iq-breadcrumb">    
	<div class="iq-breadcrumb-info">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-7 align-self-center">
					<h2 class="iq-fw-8 mb-3">Blog</h2>
					<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
						<li class="breadcrumb-item"><a href="{{url('blog')}}">Blog</a></li>
					</ol>
					</nav>
				</div>
				<div class="col-md-5">
					<img src="{{url('images/breadcrumb/blog.png')}}" class="img-fluid" alt="">
				</div>
			</div>
		</div>
   </div>
   <div class="iq-breadcrumb-img">
      <img src="{{url('images/breadcrumb/02.png')}}" class="img-fluid breadcrumb-two" alt="">
   </div>
</section>

<section class="sidebar-page-container" style="padding-top: 20px;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 mt-4">
				@if(request()->has('status'))
					@if(request()->get('status')==1)
						<?php $message = 'Your comment has been successfully added.  <br> Your comment will be published after review by the webmaster'; ?>
						<div class="alert alert-success">
							{!!$message!!}
						</div>
					@else
						<?php $message = 'Error <br> Sorry there was an error while adding the comment'; ?>
						<div class="alert alert-danger">
							{!!$message!!}
						</div>
					@endif
				@endif
				<div class="col-md-12 text-center">
					<a href="{{url('blog/'.$slug)}}" class="btn btn-primary">Go Back</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection