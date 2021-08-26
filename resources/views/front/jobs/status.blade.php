@php
    $page_title = 'Job Application Status';
@endphp
@extends('front.layouts.master')
@section('title') {{$page_title}} - @endsection
@section('content')

<section id="hero" class="d-flex align-items-center terms-hero">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-md-12 pt-3 pt-lg-0 order-1 order-lg-1 d-flex flex-column justify-content-center">
        <h1>Job Application</h1>
      </div>
    </div>
  </div>
</section>
<main id="main">
  <section id="job_app" class="job_app">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-md-12">
                <div class="formStatus">
                    @if(session()->has('message'))
                        <div class="alert d-flex rounded-lg alert-{{session()->get('type')}}">
                            {!!session()->get('message')!!}
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{url('/')}}" class="btn btn-dark">Back to Homepage</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
  </section>
</main>
<style>
    .app_status_icon { font-size: 44px; margin-right: 9px; }
</style>

@endsection