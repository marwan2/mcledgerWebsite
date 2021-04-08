@php 
  use App\Faq;
@endphp
@extends('front.layouts.master')
@section('title', 'Frequently Asked Questions')
@section('meta_desc', 'Get all your answers about our online accounting application that provides you with bookkeeping, VAT, and invoicing services.')
@section('meta_keywords', 'free accounting consultation, accounting service in UAE, accounting app for small businesses, VAT registration and filing in dubai, tax advice, professional accountants, accounting and bookkeeping services, VAT services, VAT invoicing ') 
@section('og_title', 'Frequently Asked Questions')

@section('content')
  <section id="hero" class="d-flex align-items-center about-hero faq-hero">
    <div class="faq_bg"></div>
    <div class="container" data-aos="fade-up" style="z-index: 3;">
      <div class="row justify-content-center pt-5">
        <div class="col-lg-7 order-2 order-lg-2 hero-img p-5" data-aos="zoom-in" data-aos-delay="150">
          <img src="assets/img/blog_hero.png" class="animated mw-100" alt="">
        </div>
        <div class="col-lg-5 pt-3 pt-lg-0 order-1 order-lg-1 d-flex flex-column justify-content-center">
          <p class="mb-2"></p>
          <h3 class="mb-5">Frequently Asked Questions</h3>
        </div>
      </div>
    </div>
  </section>
  <main id="main">
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">
        <div class="card mc-card">
          <div class="card-body">
            <div class="section-title">
            </div>
            <div class="faq-list">
              <ul>
                @php $counter = 1; @endphp
                @foreach(Faq::$faqs_arr as $row)
                  <li data-aos="fade-up" data-aos-delay="50">
                    <a data-toggle="collapse" class="collapsed" href="#faq-list-{{$counter}}">
                      {{$row['qa']}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i>
                    </a>
                    <div id="faq-list-{{$counter}}" class="collapse q_content" data-parent=".faq-list">
                      <p>{!! $row['ans'] !!}</p>
                    </div>
                  </li>
                @php $counter++; @endphp
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@stop