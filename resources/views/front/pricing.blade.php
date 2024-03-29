@php
   $reps = [
      "1"=>"Balance sheet​",
      "2"=>"Profit & loss​",
      "3"=>"Statement of accounts​",
      "4"=>"Aged customer analysis​",
      "5"=>"Aged supplier analysis​",
      "6"=>"Sales report​",
      "7"=>"Purchase report​",
      "8"=>"Cash flow report​",
      "9"=>"Expenses breakdown report​",
      "10"=>"Balances breakdown report​",
      "11"=>"Bank reconciliation​",
      "12"=>"Unique report layout",
   ];
@endphp
@extends('front.layouts.master')
@section('title', 'Bookkeeping Pricing Packages - ')
@section('meta_desc', 'From full bookkeeping, financial statements, invoicing to VAT registration & VAT filing, find the accounting service that fits your budget. ')
@section('meta_keywords', 'bookkeeping, financial statement, sign up, free trial, invoicing, vat service, vat return, vat filing, vat registration, accounting, budget ') 
@section('og_title', 'Bookkeeping Pricing Packages')

@section('content')
<section id="hero" class="d-flex align-items-center pricing-hero">
   <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
         <div class="col-xl-5 col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
            <img src="assets/img/target.png" class="animated" alt="">
         </div>
         <div class="col-xl-4 col-lg-5 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 class="base_color mb-5">Stop Bookkeeping!​</h1>
            <p>
               We’re here to save your accounts and give you the time to do what you love. ​You deserve it.
            </p>
            <div><a href="#pricing" class="btn-get-started btn rad scrollto font-weight-bold">Get started today​</a></div>
         </div>
      </div>
   </div>
</section>
<main id="main">
   <section id="features" class="features pricing_top" style="overflow: visible">
      <div class="container" data-aos="fade-up">
         <div class="row whyus_row_op" data-aos="slide-up" data-aos-delay="120">
            <div class="col-md-7">
               <img src="assets/img/invoicing1.png" class="mw-100" style="margin-bottom: 0; padding-top: 0;">
            </div>
            <div class="col-md-5" style="display: flex;align-content: center;align-items: center;">
               <div class="media flex-column">
                  <img src="assets/img/point.png" class="mr-2 mb-4" alt="...">
                  <div class="media-body">
                     <h3 class="mt-0 mb-3">Get a dedicated accounting department​</h3>
                     Bookkeeping should be at the bottom of your priority list. Your dedicated McLedger accountant will take care of everything and will ensure your books are accurate, tax-compliant and audit proof, so you can focus on your business without worrying about fines.​
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section id="finreports" class="features mt-5" style="overflow: visible">
      <div class="container" data-aos="fade-up">
         <div class="row" data-aos="slide-up" data-aos-delay="120" style="border-radius: 30px;">
            <div class="col-md-12">
               <div class="text-center mb-4">
                  <h3 class="mt-0 mb-4">We'll send you all the financial reports​</h3>
                  Your accountant will deliver extensive, detailed and accurate reports that you can trace to each document upload and will summarize your financials in the dashboard.
               </div>
               
               <div class="row statistics_cards business_cards">
                  @foreach($reps as $index=>$rep)
                  <div class="col-md-3 col-6 stat_col h-auto">
                     <div class="card" data-aos="slide-up" data-aos-delay="110">
                        <div class="card-body">
                           <div class="bs_img"><img src="assets/img/reps/{{$index}}.png" style="width: 70%;"></div>
                           <div class="business_type">{{$rep}}</div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </section>
   <section>
      <div class="container">
         <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-5" data-aos="slide-up" data-aos-delay="100">
               <h3>Get your VAT filing on time!​</h3>
               <p>
                  Our dedicated team of professional accountants ensure all your records are vat-compliant and file your value added tax (VAT) return on Federal tax authority (FTA) portal for each period while updating you and following up till the end.​
               </p>
            </div>
            <div class="col-md-6" data-aos="slide-up" data-aos-delay="110">
               <img src="assets/img/pricing_vatfiling.jpg" class="mw-100">
            </div>
         </div>
      </div>
   </section>
   <section id="pricing" class="pricing pt-0">
      <div class="container" data-aos="fade-up">
         <div class="section-title pt-4">
            <h2>Quality services with more value for less money</h2>
            <p>
               Join our community for small business owners who trust us with their book & get a free consultation with our bookkeeping expert
            </p>
         </div>
         <div class="row d-flex align-items-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
               <div class="box pricing_box">
                  <div class="contents">
                     <h3>REVENUE MANAGEMENT SYSTEM – Invoicing Software</h3>
                     <h4><sup>AED</sup>249<span> / month + VAT</span></h4>
                     <div class="mt-3 mb-2 text-muted"><small>Package Features</small></div>
                     <ul>
                        <li>Unlimited number of invoices, sales orders, customers, and items</li>
                        <li>Categorized sales reports (paid/unpaid, AR, top customer, top item)</li>
                        <li>Onboarding - Business/Invoice setup and revenue recognition</li>
                        <li>Tracking and reminders for unpaid invoices</li>
                        <li>Customer payments flexible allocation</li>
                        <li>VAT returns filing</li>
                        <li>VAT reports</li>
                        <li>VAT timeline with filing status & updates</li>
                     </ul>
                     <div class="btn-wrap">
                        <a href="https://portal.mcledger.co/register" class="btn-buy btn-block btn-secondary rad">Start Free Trial Now</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
               <div class="box pricing_box">
                  <div class="recommended">recommended</div>
                  <div class="contents">
                     <h3>Standard Bookkeeping</h3>
                     <h4><span class="starting">Starting from</span> <sup>AED</sup>749<span> / month + VAT</span></h4>
                     <div class="mt-3 mb-2 text-muted"><small>Package Features</small></div>
                     <ul>
                        <li>Onboarding process for new clients during the initial period</li>
                        <li>5 years digital document archiving</li>
                        <li>Sales and purchases tracking</li>
                        <li>Revenue and cost recognition (categorized)</li>
                        <li>Financial statements</li>
                        <li>Cash management</li>
                        <li>Bank reconciliation and post-dated cheques</li>
                        <li>Sales and purchase reports</li>
                        <li>Accounts receivable and accounts payable reports</li>
                        <li>Unlimited sales invoice with our Revenue Management System</li>
                        <li>Track payments and receipts with our Revenue Management System</li>
                        <li>Mobile (iOS, Android) and web-based app</li>
                        <li>VAT returns filing</li>
                        <li>VAT reports</li>
                        <li>VAT timeline with filing status & updates</li>
                     </ul>
                     <div class="btn-wrap">
                        <a href="https://portal.mcledger.co/register" class="btn-buy btn-block btn-secondary rad">Start Free Trial Now</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="50">
               <div class="box pricing_box">
                  <div class="contents">
                     <h3>VAT Registration</h3>
                     <h4><sup>AED</sup>299<span> One time payment + VAT</span></h4>
                     <div class="mt-3 mb-2 text-muted"><small>Package Features</small></div>
                     <ul>
                        <li><i class="fa fa-check"></i>VAT registration </li>
                        <li><i class="fa fa-check"></i>VAT de-registration </li>
                     </ul>
                     <div class="btn-wrap">
                        <a href="https://portal.mcledger.co/register" class="btn-buy btn-block btn-secondary rad">Start Free Trial Now</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   @include('front.faq_section')
</main>
@stop