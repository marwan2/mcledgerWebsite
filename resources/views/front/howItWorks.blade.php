@php
   $featuresTable = [
      'Online (App)'=>[1,0,0,'N/A'],
      'Price'=>['Lowest','High','Low','Medium'],
      'Accuracy'=>['Highest','Medium','Low','High'],
      'Reports'=>[1,'Basic','Basic',1],
      'Easiness'=>[1,0,0,0],
      '24/7 Access'=>[1,0,0,0],
      'Sub Users'=>[1,0,0,'N/A'],
      'Onboarding by a qualified Accountant'=>[1,0,1,1],
      'Pre-approval Option'=>[1,0,0,0],
      'Automation'=>[1,0,0,'N/A'],
      'Cutting Edge Technology'=>[1,0,0,'N/A'],
      'Pricing that scales'=>[1,0,0,0],
      'Cloud Accountants'=>[1,0,0,0],
      'Increased Security'=>[1,1,0,'N/A'],
      'No Cancellation Fees'=>[1,0,0,0],
      'Transaction Based Pricing'=>[1,0,0,0],
      'E-commerce integration 
      <img src="'.url('assets/img/shopify_amazon_logo.png').'" class="integration_logo" alt="Shopify | Amazon" />
      '=>[1,0,0,0],
   ];

   function get_feature($val) {
      if(is_string($val)) {
         return "<span class='feature_str'>".$val."</span>";
      }
      if($val === 1) {
         return "<i class='bx bx-check checked'></i>";
      }

      if($val === 0) {
         return "<i class='bx bx-x unchecked'></i>";
      }
      return 'NA';
   }
@endphp
@extends('front.layouts.master')
@section('title', 'How We Work - ')
@section('meta_desc', 'Just register with us for a smooth onboarding process by senior accountant who will assist your business to switch to our online accounting services. ')
@section('meta_keywords', 'transactions, onboarding, sign up, free demo, online bookkeeping, vat consultation, financial consulting, accountant') 
@section('og_title', 'How We Work')

@section('content')
<section id="hero" class="d-flex align-items-center about-hero">
<div class="howworks_bg"></div>
<div class="container mt-0 pt-0" data-aos="fade-up" style="z-index: 3;">
   <div class="row justify-content-center pt-1">
      <div class="col-lg-5 pt-0 pt-lg-0 order-2 order-lg-2 d-flex flex-column justify-content-center">
         <h2 class="mb-0">How it works</h2>
         <h1 class="base_color mb-5">Making accounting effortless for you.</h1>
      </div>
      <div class="col-lg-7 order-1 order-lg-1 hero-img" data-aos="zoom-in" data-aos-delay="120">
         <img src="{{url('assets/img/how_hero.png')}}" class="mw-100 how_hero_img" alt="How it works">
      </div>
   </div>
</div>
</section>
<main id="main">
<section class="about_block">
   <div class="container">
      <div class="basic_box">
         <div class="row">
            <div class="col-md-6 col-12 col_img">
               <img src="assets/img/app_auth.png" class="mw-100" data-aos="slide-up" data-aos-delay="120">
            </div>
            <div class="col-md-6 col-12 d-flex flex-column justify-content-center col_content">
               <ol class="reg_steps">
                  <li data-aos="slide-up" data-aos-delay="120">
                     <h4>Register</h4>
                     <p>Give us a call to register or do it through our apps</p>
                  </li>
                  <li data-aos="slide-up" data-aos-delay="120">
                     <h4>On boarding</h4>
                     <p>Our expert accountant will visit for business account setup, ensure all data is collected, & follow up throughout the first two months of client experience</p>
                  </li>
                  <li data-aos="slide-up" data-aos-delay="120">
                     <h4>Activate business</h4>
                     <p>Each business is reviewed individually and activated accordingly</p>
                  </li>
               </ol>
            </div>
         </div>
      </div>
      <div class="card snap_card">
         <div class="card-body p-5" data-aos="slide-up" data-aos-delay="100">
            <div class="row">
               <div class="col-md-6">
                  <div data-aos="slide-up" data-aos-delay="120" class="pl-4">
                     <h4 class="mb-3">Snap, Wait, Receive are 3 steps that is an ongoing cycle </h4>
                     <div class="step_inner mb-4">
                        <h5>Snap/Upload</h5>
                        <p>Your invoices and receipts</p>
                     </div>
                     <div class="step_inner mb-4">
                        <h5>Wait </h5>
                        <p>Our team of expert accountants process your transactions ​</p>
                     </div>
                     <div class="step_inner mb-4">
                        <h5>Receive </h5>
                        <p>Get your financial and VAT reports on our mobile or web-based app​</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <img src="{{url('assets/img/app_preview.png')}}" alt="Snap, Wait, Receive" class="mw-100">
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="features_table">
   <div class="container" data-aos="slide-up" data-aos-delay="120">
      <div class="row">
         <div class="col-md-12">
            <div class="card compare_table">
               <div class="card-body">
                  <h2 class="text-center mb-5">Why McLedger?</h2>
                  <div class="row">
                     <div class="col-md-5 col-4  pr-0 compare_items">
                        <ul>
                           <li class="header">Item</li>
                           @foreach ($featuresTable as $label => $vars)
                           <li>{!! $label !!}</li>
                           @endforeach
                        </ul>
                     </div>
                     <div class="col-md-7 col-8 pl-0">
                        <div class="row compare_cols">
                           <div class="col-md-3 col-3">
                              <ul class="bg mc_col">
                                 <li class="header">McLedger</li>
                                 @foreach ($featuresTable as $label => $vars)
                                 <li>{!! get_feature($vars[0]) !!}</li>
                                 @endforeach
                              </ul>
                           </div>
                           <div class="col-md-3 col-3">
                              <ul>
                                 <li class="header">In-House</li>
                                 @foreach ($featuresTable as $label => $vars)
                                 <li>{!! get_feature($vars[1]) !!}</li>
                                 @endforeach
                              </ul>
                           </div>
                           <div class="col-md-3 col-3">
                              <ul>
                                 <li class="header">Freelance</li>
                                 @foreach ($featuresTable as $label => $vars)
                                 <li>{!! get_feature($vars[2]) !!}</li>
                                 @endforeach
                              </ul>
                           </div>
                           <div class="col-md-3 col-3">
                              <ul>
                                 <li class="header">Outsourcing</li>
                                 @foreach ($featuresTable as $label => $vars)
                                 <li>{!! get_feature($vars[3]) !!}</li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="callToAction">
   <div class="container">
      <div class="row d-flex justify-content-center" style="margin-top: 20px;">
         <div class="col-md-7 col-12">
            <div class="whyus_row_op text-center" style="padding: 60px 20px; border-radius: 100px;">
               <h4>Join our community today!</h4>
               <a href="{{$trial_url}}" class="btn btn_bg btn-dark border-0 btn-lg pl-5 pr-5 font-weight-bold mt-2">START TRIAL FOR FREE</a>
            </div>
         </div>
      </div>
   </section>
</main>
@stop