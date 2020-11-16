@extends('front.layouts.master')
@section('title') McLedger Revenue Management System @stop
@section('content')
<section id="hero" class="d-flex align-items-center invoicing-hero">
  <div class="container-fluid" data-aos="fade-up">
    <div class="row justify-content-center text-center">
      <div class="col-xl-12 col-lg-12 pt-4 mt-4 mb-3 pt-lg-0 order-1 order-lg-1 d-flex flex-column justify-content-center">
        <h1 class="mb-1">The ultimate invoicing  <br>software for your business​</h1>
        <p class="mb-5">The simplest way to manage VAT compliant tax invoices for quick payments​</p>
        <div><a href="#about" class="btn btn-light rad scrollto">START TRIAL FOR FREE</a></div>
      </div>
      <div class="col-xl-7 col-lg-7 order-2 order-lg-2 text-center mt-3" data-aos="zoom-in" data-aos-delay="150">
        <img src="assets/img/invoicing_hero_img.png" class="animated mw-100 w-100" alt="">
      </div>
    </div>
  </div>
</section>
<main id="main">
  <section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">
      <div class="section-title " style="max-width: 60%; text-align: center; margin: 0 auto; margin-bottom: 50px;">
        <h2>McLedger Revenue <br>Management System</h2>
        <p>
          A sophisticated software to manage revenue related tasks. With our invoice revenue management system, manage revenue, sales order, credit note, delivery notes and much more systematically all in a single app.​
        </p>
      </div>
    </div>
  </section>
  <section id="features" class="features" style="overflow: visible">
    <div class="container" data-aos="fade-up">
      <div class="row whyus_row_op" data-aos="slide-up" data-aos-delay="120" style="overflow: visible;
        height: 300px; display: flex; align-content: center; border-radius: 30px; margin-bottom: 320px;">
        <div class="col-md-7">
          <img src="assets/img/invoicing1.png" class="mw-100" alt="..." style="margin-bottom: 0; padding-top: 0;">
        </div>
        <div class="col-md-5" style="display: flex;align-content: center;align-items: center;">
          <div class="media flex-column">
            <img src="assets/img/point.png" class="mr-2 mb-4" alt="...">
            <div class="media-body">
              <h3 class="mt-0 mb-3">Create customized invoices</h3>
              Choose the tax invoice template and issue invoices to the respective individuals. While creating invoices, you can enter the payment term and the date it is due.
            </div>
          </div>
        </div>
      </div>
      <div class="row whyus_row_op" data-aos="slide-up" data-aos-delay="120" style="overflow: visible;
        height: 300px; display: flex; align-content: center; border-radius: 30px;">
        <div class="col-md-5" style="display: flex;align-content: center;align-items: center;">
          <div class="media flex-column">
            <img src="assets/img/point.png" class="mr-2 mb-4" alt="...">
            <div class="media-body">
              <h3 class="mt-0 mb-3">Flexible payment allocation</h3>
              Organize payments for any customer. You can oversee if the amount is paid or unpaid, and accordingly assign payments to their invoices once you receive them.​
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <img src="assets/img/invoicing_invoices.png" class="mw-100" alt="..." style="margin-bottom: 0; padding-top: 0;">
        </div>
      </div>
    </div>
  </section>
  <section class="invoices_mailing" data-aos="slide-up" data-aos-delay="120">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body" style="padding: 60px 40px">
              <div class="row d-flex justify-items-center justify-content-center align-items-center">
                <div class="col-md-8 mb-5 text-center">
                  <h2>Send invoices and receipts</h2>
                  <p>
                    Our software has an in-built option to directly email or share invoices and receipts with the customers through it.​
                  </p>
                </div>
              </div>
              <div class="row d-flex justify-content-center">
                <div class="col-md-7 text-center" style="margin-bottom: -20%;">
                  <img src="assets/img/invoicing_mail_screen.png" class="mw-100 w-100" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="callToAction" data-aos="slide-up" data-aos-delay="120">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-9 col-12 text-center">
          <h3 class="" style="margin-bottom: 150px;">
          Any invoice you raise here will automatically be reflected in the McLedger Accounting app in the request section, resulting in extremely smooth bookkeeping and accounting for small businesses.
          </h3>
          <h4 class="mt-5 mb-5">
          Happy Invoicing 🤓
          </h4>
        </div>
      </div>
      <div class="row d-flex justify-content-center" style="margin-top: 100px;">
        <div class="col-md-7 col-12">
          <div class="whyus_row_op text-center" style="padding: 60px 20px; border-radius: 100px;">
            <h4>Join our community today!</h4>
            <a href="#" class="btn btn_bg btn-dark border-0 btn-lg pl-5 pr-5 font-weight-bold mt-2">START TRIAL FOR FREE</a>
          </div>
        </div>
      </div>
    </section>
  </main>
@stop