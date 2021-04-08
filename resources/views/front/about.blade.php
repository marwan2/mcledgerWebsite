@extends('front.layouts.master')
@section('title') About Us - @stop
@section('meta_desc', 'From full bookkeeping, financial statements, invoicing to VAT registration & VAT filing, find the accounting service that fits your budget. ')
@section('meta_keywords', 'bookkeeping, financial statement, sign up, free trial, invoicing, vat service, vat return, vat filing, vat registration, accounting, budget ') 
@section('og_title', 'Online bookkeeping services for small businesses​')
@section('content')
  <section id="hero" class="d-flex align-items-center about-hero">
    <div class="about_bg"></div>
    <div class="container" data-aos="fade-up" style="z-index: 3;">
      <div class="row justify-content-center pt-5">
        <div class="col-lg-7 order-2 order-lg-2 hero-img p-5" data-aos="zoom-in" data-aos-delay="150">
          <img src="assets/img/about_hero.png" class="animated mw-100" alt="">
        </div>
        <div class="col-lg-5 pt-3 pt-lg-0 order-1 order-lg-1 d-flex flex-column justify-content-center">
          <h2 class="mb-0">About Us</h2>
          <h1 class="base_color mb-5">Turning digits<br> into descisions</h1>
          <div class="about_hero_pr mt-5">
            <h3>Who we are?</h3>
            <p>
              Emerging from Salem Ahmad Almoosa Enterprises, McLedger is A UAE based FinTech cloud platform for online bookkeeping services for startups & small businesses to provide quality bookkeeping solutions to entrepreneurs and transforming their everyday bills into financial statements and visual reports - all in one place.​
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <main id="main">
    <section class="about_block">
      <div class="container">
        <div class="_row whatwedo_wrap">
          <div class="col-md-6 h-100">
            <img src="{{url('assets/img/about_gr.png')}}" class="mw-100" alt="What we do" data-aos="slide-up" data-aos-delay="120">
          </div>
          <div class="col-md-6 d-flex flex-column justify-content-center">
              <h3 class="mt-0 mb-3" data-aos="slide-up" data-aos-delay="120">What we do?</h3>
              <p data-aos="slide-up" data-aos-delay="120">
                McLedger provides online bookkeeping service in the UAE through a state of art application where we process your entries 24/7. ​
                <br>
                We maintain proper books of accounts by combining human and artificial intelligence to​
              </p>
              <ul>
                <li>Process High-quality accounting & VAT services in an app​</li>
                <li>Avail services fully performed by experts & FTA Tax Agent aided by AI ​</li>
                <li>Save upto 85% of your accounting cost​ ​</li>
                <li>Complete invoicing solution syncing with accounting app​</li>
              </ul>
          </div>
        </div>

        <div class="row statistics_cards">
          <div class="col-md-4 col-12 stat_col mb-3">
            <div class="card" data-aos="slide-up" data-aos-delay="100">
              <div class="card-body">
                <h1 class="gradient">2018</h1>
                <p>Launched in</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-12 stat_col mb-3">
            <div class="card" data-aos="slide-up" data-aos-delay="110">
              <div class="card-body">
                <h1 class="gradient">60+</h1>
                <p>Employees</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-12 stat_col mb-3">
            <div class="card active" data-aos="slide-up" data-aos-delay="120">
              <div class="card-body">
                <h1 class="gradient">1M+</h1>
                <p># of Transitions processed</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="businesses" class="businesses mt-2">
      <div class="container">
        <h2 class="text-center mb-5">
          Businesses we work with
        </h2>
        <div class="row statistics_cards business_cards">
          <div class="col-md-4 col-6 stat_col">
            <div class="card" data-aos="slide-up" data-aos-delay="110">
              <div class="card-body">
                <div class="bs_img"><img src="assets/img/about/b8.png"></div>
                <div class="business_type">Event management</div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-6 stat_col">
            <div class="card" data-aos="slide-up" data-aos-delay="110">
              <div class="card-body">
                <div class="bs_img"><img src="assets/img/about/b7.png"></div>
                <div class="business_type">Consulting services</div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-6 stat_col">
            <div class="card" data-aos="slide-up" data-aos-delay="110">
              <div class="card-body">
                <div class="bs_img"><img src="assets/img/about/b3.png"></div>
                <div class="business_type">Educational</div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-6 stat_col">
            <div class="card" data-aos="slide-up" data-aos-delay="110">
              <div class="card-body">
                <div class="bs_img"><img src="assets/img/about/b2.png"></div>
                <div class="business_type">Salons & spa</div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-6 stat_col">
            <div class="card" data-aos="slide-up" data-aos-delay="110">
              <div class="card-body">
                <div class="bs_img"><img src="assets/img/about/b6.png"></div>
                <div class="business_type">Tailoring & laundry</div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-6 stat_col">
            <div class="card" data-aos="slide-up" data-aos-delay="110">
              <div class="card-body">
                <div class="bs_img"><img src="assets/img/about/b5.png"></div>
                <div class="business_type">Travel & tourism</div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-6 stat_col">
            <div class="card" data-aos="slide-up" data-aos-delay="110">
              <div class="card-body">
                <div class="bs_img"><img src="assets/img/about/b1.png"></div>
                <div class="business_type">Maintenance, handyman & cleaning services</div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-6 stat_col">
            <div class="card" data-aos="slide-up" data-aos-delay="110">
              <div class="card-body">
                <div class="bs_img"><img src="assets/img/about/b4.png"></div>
                <div class="business_type">Health, wellness & fitness</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row d-flex justify-content-between align-items-center">
          <div class="col-md-5" data-aos="slide-up" data-aos-delay="100">
            <h3>Our Mission</h3>
            <p>
              To provide best online bookkeeping solution, unbeatable accuracy and timely services through a sophisticated and user-friendly mobile and web application.
            </p>
          </div>
          <div class="col-md-7" data-aos="slide-up" data-aos-delay="110">
              <img src="assets/img/mission.png" class="mw-100">
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