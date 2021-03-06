@php
  $clients = [
    "1"=>[
        "McLedger has been extremely useful to my business in managing everything effortlessly. When it comes to bookkeeping, it is super easy to cross-check entries and receive instant notifications that keep me up to date.",
        "Kudu Arts",
        "",
    ],
    "2"=>[
        "We love working with McLedger. Our books are well organized and the service is prompt. We always get our reports on time and this is helping us grow our business and move in the right direction.",
        "Pravda Studios",
        "",
    ],
    "3"=>[
        "With McLedger’s service, my work has become very smooth. I believe that they are doing a great job. It’s amazing how easily you can understand everything on their app. I really love how super friendly their staff is, always ready to help out.",
        "Eagles Laundry",
        "",
    ],
    "4"=>[
        "McLedger not only helps me in my daily bookkeeping but also in growing my business by saving my time every day. I now focus on making sales and getting more clients. They have made my life easy with quality reporting and financial summaries.",
        "National Marketing",
        "Hussein Saleh",
    ],
    "5"=>[
        "McLedger has changed the way we do our accounting. Their packages are of a reasonable price. The app itself is very user-friendly with features that make their services stand out.",
        "Silver Castle Trading L.L.C",
        "Mr. Hussein",
    ],
    "6"=>[
        "The quality of services provided by McLedger is extremely high. I am so impressed by the app itself due to its functionality and it makes the services transparent and reliable.",
        "TruCare Clinic",
        "Mrs. Rachael",
    ],
    "7"=>[
        "We are very happy with McLedger's accounting services through its app. The team constantly keeps enhancing its platform, services & are truly very patient.",
        "Al Ramsa Institute‏ for Emirati Arabic language",
        "",
    ]
  ];
@endphp
@extends('front.layouts.master')
@section('title') @stop
@section('meta_desc', 'From full bookkeeping, financial statements, invoicing to VAT registration & VAT filing, find the accounting service that fits your budget. ')
@section('meta_keywords', 'bookkeeping, financial statement, sign up, free trial, invoicing, vat service, vat return, vat filing, vat registration, accounting, budget ') 
@section('og_title', 'Online bookkeeping services for small businesses​')

@section('content')
<section id="hero" class="home-hero d-flex align-items-center">
  <div class="container-fluid" data-aos="fade-up">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 order-1 order-lg-1 hero-img" data-aos="zoom-in" data-aos-delay="150">
        <img src="assets/img/hero-img.png" class="animated" alt="">
      </div>
      <div class="col-xl-4 col-lg-4 pt-3 pt-lg-0 order-2 order-lg-2 d-flex flex-column justify-content-center">
        <h1 class="mb-3">
        You focus on your <strong>business​</strong><br>
        We’ll focus on your <strong>bookkeeping​</strong>
        </h1>
        <p class="mb-5">
          Complete <strong>accounting</strong>, <strong>bookkeeping</strong>,
          and <strong>VAT services</strong> for <strong>UAE</strong> entrepreneurs​
        </p>
        {{-- <div class="badge badge-light text-left mb-1 rounded-lg"></div> --}}
          <div class="promotion_text">
            <div class="promo_line1">
              Save up to
            </div>
            <div class="promo_percent"><b>85</b> <span>% <br><div class="of_text">of</div></span></div>
            <div class="promo_line2">your <span>accounting cost</span> Today!</div>
          </div>
        

          <div class="d-flex mt-2">
            <a href="{{$trial_url}}" class="btn-get-started btn rad scrollto font-weight-bold mt-0 d-flex align-items-center">START TRIAL FOR FREE</a>
            <a href="https://calendly.com/mcledger/" target="_blank" class="btn-dark btn-booking btn ml-2 rad scrollto d-flex align-items-center">
              <div class="d-flex"><i class="bx bx-calendar bx-md text-white"></i></div>
              <div class="text-left pl-2" style="line-height: 17px;"><span class="font-weight-normal" style="font-size: 12px;">Book an</span><br> 
                <span class="font-weight-bold text-uppercase">appointment</span>
              </div>
            </a>
            </div>
        </div>
      </div>
    </div>
</section>
<main id="main">
  <section id="about" class="about">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-5 offset-1 order-1 order-lg-2 d-flex justify-content-center text-center" data-aos="zoom-in" data-aos-delay="100">
          <img src="assets/img/art_store.png" class="img-fluid" alt="Mcledger Apps">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
          <h3>Access Accounting department on the go </h3>
          <p class="mb-5">
            FTA tax agents, Accountants & AI unite in an app for online bookkeeping services​
            <br><br>
            With our headquarters in Dubai, our team of experienced professionals process your everyday bills on a cloud accounting platform to give you extensive reports in a easy to use mobile & web based app.​
          </p>
          <p class="font-weight-bold">JOIN US NOW</p>
          <a href="{{url('app')}}" class="app_stores"><img src="assets/img/googleplay.png" alt="googleplay"></a>
          <a href="{{url('app')}}" class="app_stores"><img src="assets/img/appstore.png" alt="appstore"></a>
        </div>
      </div>
    </div>
  </section>
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-6 col-md-6" data-aos="slide-up" data-aos-delay="100">
          <div class="card-deck p-2">
            <div class="card rounded-lg p-4">
              <a href="#">
                <img src="assets/img/feature2.png" class="card-img-top" alt="MCLEDGER ACCOUNTING">
              </a>
              <div class="card-body">
                <h5 class="card-title">MCLEDGER ACCOUNTING</h5>
                <p class="card-text">
                  Expert accountants aided by advanced technology to cater to complete accounting needs, providing Value Added Tax (VAT) services, bookkeeping, invoicing software, and complete financial statements and detailed reports to assist you in making healthy business decisions.​
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6" data-aos="slide-down" data-aos-delay="100">
          <div class="card-deck p-2 apps_card_down">
            <div class="card rounded-lg p-4">
              <a href="{{url('invoicing')}}">
                <img src="assets/img/invoicing_home_promo2.jpg" class="card-img-top" alt="MCLEDGER REVENUE MANAGEMENT SYSTEM">
              </a>
              <div class="card-body">
                <h5 class="card-title">MCLEDGER REVENUE MANAGEMENT SYSTEM</h5>
                <p class="card-text">
                  VAT invoicing made easy with our revenue management system – an invoice software that gives you a flexible and convenient approach to create tax invoices and sharing, as well as flexible payment allocation, and much more - all in a single app. ​
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <a name="why-mc-accounting"></a>
  <section id="features" class="features">
    <div class="container" data-aos="fade-up">
      <div class="section-title mb-5">
        <h2>Why choose our accounting services?​</h2>
        <p class="body_desc">
          Our online accounting makes it easy for the entrepreneurs to have timely and up to date financial & vat services by experts with minimal efforts required from your end, releasing you from learning complex software & hiring additional resources. ​
          <br>
          It’s an accounting experience designed for your convenience. ​
        </p>
      </div>
      <div class="row whyus_row vis_reports" data-aos="slide-up" data-aos-delay="100">
        <div class="col-md-12 col_content">
          <h3 class="text-dark">Helpful visual reports</h3>
          <p>
            See your business's financial health at a glance and stay in control of cash flow to know where your money is coming from and going.
          </p>
        </div>
      </div>
      <div class="row whyus_row fin_reports" data-aos="slide-up" data-aos-delay="100">
        <div class="col-md-12">
          <div class="media">
            <img src="assets/img/point.png" class="mr-2 mt-2 point_img">
            <div class="media-body">
              <h3 class="mt-0 mb-3 text-dark">Tax reports and financial statements​</h3>
              We assure quality reports along with preparing for timely VAT return filing. You can check complete statements that pass through various checkpoints before it reaches you for approval on the application.​
            </div>
            <img src="assets/img/devices.png" class="ml-2 mw-100" alt="Tax reports">
          </div>
        </div>
      </div>
      <div class="row whyus_row_op cat_trans" data-aos="slide-up" data-aos-delay="120">
        <div class="col-md-12">
          <div class="media">
            <img src="assets/img/categorized_trans.png" class="ml-2 mw-100" alt="A single space for your documents​">
            <img src="assets/img/point.png" class="mr-2 mt-2 point_img">
            <div class="media-body mw-100">
              <h3 class="mt-0 mb-3 text-dark">A single space for all your documents​</h3>
              Just upload your documents and let your accountant take care of the rest.​
              Your documents are stored securely in your McLedger cloud server with 5 years archiving and categorized with status updates on the progress.​
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="sub-features" class="sub-features pb-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6" data-aos="slide-up">
          <div class="card-deck p-2">
            <div class="card rounded-lg p-4">
              <img src="assets/img/conversion.png" class="" alt="Quick communication">
              <div class="card-body">
                <h4 class="card-title">Quick communication with your accountant​</h4>
                <p class="card-text">
                  Got an accounting related question? No need to call and wait for long response time. Drop your accountant an instant message with an in-app messaging to get a quick answer. ​
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6" data-aos="slide-up">
          <div class="card-deck p-2">
            <div class="card rounded-lg p-4">
              <img src="assets/img/notifications.png" class="" alt="...">
              <div class="card-body">
                <h4 class="card-title">Live Alerts & Notifications</h4>
                <p class="card-text">
                  Never miss a piece of important information when it comes to accounting. The notifications will keep you updated.
                  <br>&nbsp;
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center mt-5 mb-5" data-aos="fade-down">
        <h3 style="margin-top: 120px;">The most powerful automation tool  <br>
        for businesses & accounting firms
        </h3>
      </div>
    </section>
    <section id="bankIntegration" class="bankIntegration mb-0 pt-0 pb-0">
      <div class="container">
        <div class="row d-flex justify-content-end mb-0" data-aos="slide-up" data-aos-delay="100">
          <div class="col-md-5 contents">
            <h2 class="mb-4">Linking Your bank accounts and credit cards</h2>
            <p class="pb-5">
              pulls your transactions and balances in
              real-time. Mcledger will reconcile your monthly books on daily basis.
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="mt-0 pt-0 quote_bg">
      <div class="container">
        <div class="card" style="border-radius: 36px; background-color: #eff0ff; border: none;">
          <div class="card-body" style="padding: 60px 40px">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-6" data-aos="slide-up" data-aos-delay="100">
                <h3 class="mb-4">
                Made it super easy for you to connect your accounts.
                </h3>
                <p>
                  Once you’re connected, you can process payments, Pay on time, detects due dates and schedules your payment for the right date.
                </p>
              </div>
              <div class="col-md-5" data-aos="slide-up" data-aos-delay="100">
                <img src="assets/img/payments.png" class="mw-100" alt="Cash-MasterCard-ApplePay">
              </div>
            </div>
          </div>
        </div>
      </div>
      <section id="testimonials" class="testimonials w-100">
        <div class="container" data-aos="fade-up">
          <div class="row d-flex align-content-center justify-content-between">
            <div class="col-md-5 order-1 order-lg-2 d-flex text-center">
              <div class="section-title" data-aos="slide-up" data-aos-delay="100">
                <h2>Testimonials</h2>
                <img src="assets/img/strings.png" class="mw-100">
              </div>
            </div>
            <div class="col-md-6 order-2 order-lg-1 d-flex">
              <div class="owl-carousel testimonials-carousel">
                @foreach($clients as $index=>$cl)
                <div class="testimonial-item">
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      {!!$cl[0]!!}
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="assets/img/clients/{{$index}}.jpg" class="testimonial-img" alt="{{$cl[1]}}">
                    <h3>{{$cl[1]}}</h3>
                    <h4>{{$cl[2]}}</h4>
                </div>
                @endforeach
                {{-- <div class="testimonial-item">
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    McLedger has changed the way we do our accounting. Their packages are of a reasonable price. The app itself is very user-friendly with features that make their services stand out.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Mr. Hussein</h3>
                  <h4>Silver Castle Trading L.L.C</h4>
                </div>
                <div class="testimonial-item">
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    McLedger is a unique concept that caters to all our accounting needs. They ensure my VAT is done on time and look after my complete accounts. I must say I have never been happier.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Syed Mehdi Shah</h3>
                  <h4>Al Abanous Used Cars Trading L.L.C</h4>
                </div>
                <div class="testimonial-item">
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    McLedger not only helps me in my daily bookkeeping but also in growing my business by saving my time every day. I now focus on making sales and getting more clients. They have made my life easy with quality reporting and financial summaries.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Hussein Saleh</h3>
                  <h4>National Marketing</h4>
                </div>
                <div class="testimonial-item">
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    McLedger app is easy to use and navigate. Not only did I like the look of it, but also the speed and stability. I also found their sales consultant very helpful.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>Mohammad Tarek Md Abu Taher</h3>
                  <h4>Wahat Al Qaisar Used Car EXHB</h4>
                </div>
                <div class="testimonial-item">
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    I really like that McLedger provides five-year data storage in the cloud server. Their app saves my time and effort. They have extremely good customer service.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>Abdul Hakeem Abdul Aleem</h3>
                  <h4>Sky Clouds Hospitality Services L.L.C</h4>
                </div>
                <div class="testimonial-item">
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    McLedger’s service is affordable. It is a good concept and the application is stable as well.  Even the data is secured. It is worth it. I would recommend the application to others too.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>Afsal</h3>
                  <h4>Melbourne Restaurant, Abu Dhabi</h4>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
    
    <section id="subscribers" class="subscribers" data-aos="slide-up" data-aos-delay="100">
      <div class="container">
        <div class="row">
          <div class="col-md-8" style="background: url(assets/img/flying_envelope.png) center center no-repeat">
            <div class="card">
              <div class="card-body">
                <h3>Let’s keep you posted!</h3>
                <p>Subscribe to stay updated on the latest news and tips.</p>
                {{-- <form action="{{url('subscribe')}}" method="post" role="form" class="php-email-form pt-4">
                  @csrf
                  <div class="form-row">
                    <div class="col-md-12 form-group">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                      <div class="validate"></div>
                    </div>
                    <div class="col-md-12 form-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                      <div class="validate"></div>
                    </div>
                  </div>
                  <div class="text-center"><button type="submit" class="btn btn-primary btn-block btn-subscribe">Send Message</button></div>
                </form> --}}
                <!-- Begin Mailchimp Signup Form -->
                {{-- <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css"> --}}
                <style type="text/css">
                    /* #mc_embed_signup{clear:left; font:14px Helvetica,Arial,sans-serif; } */
                    /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                </style>
                <div id="mc_embed_signup">
                <form action="https://mcledger.us18.list-manage.com/subscribe/post?u=6ab83a6fab8b30e9a2be2cbfc&amp;id=8658e328b2" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form php-email-form" class="validate" target="_blank" novalidate>
                    <div id="mc_embed_signup_scroll">
                    {{-- <div class="indicates-required"><span class="asterisk">*</span> indicates required</div> --}}
                    <div class="form-row">
                      <div class="col-md-12 form-group">
                        <div class="mc-field-group">
                            {{-- <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span></label> --}}
                            <input type="email" value="" name="EMAIL" class="required email form-control" id="mce-EMAIL" placeholder="Your Email">
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-md-12 form-group">
                        <div class="mc-field-group">
                            {{-- <label for="mce-FNAME">First Name </label> --}}
                            <input type="text" value="" name="FNAME" class="form-control" id="mce-FNAME" placeholder="Your Name">
                        </div>
                      </div>
                    </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6ab83a6fab8b30e9a2be2cbfc_8658e328b2" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class=" btn btn-primary btn-block btn-subscribe mt-2"></div>
                    </div>
                </form>
                </div>
                <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                <!--End mc_embed_signup-->


              </div>
            </div>
          </div>
          <div class="col-md-4">
            <img src="assets/img/mailbox.png" class="mailbox mw-100">
          </div>
        </div>
      </div>
    </section>
    <section id="contact" class="contact" data-aos="slide-up" data-aos-delay="100">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Contact</h2>
        </div>
        <div class="row d-flex" style="flex: 1">
          <div class="col-lg-8 d-flex flex-column">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="info-box mb-4">
                  <i class="bx bx-envelope"></i>
                  <p>info@mcledger.co</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="info-box mb-4">
                  <i class="bx bx-phone-call"></i>
                  <p>+971 56 547 2460 <br> +971 4 342 5577</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <form action="{{url('enquiry')}}" method="POST" role="form" class="php-email-form contactForm">
                  @csrf
                  <h3>Contact Us</h3>
                  <div class="form-row">
                    <div class="col-md-6 form-group">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                      <div class="validate"></div>
                    </div>
                    <div class="col-md-6 form-group">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                      <div class="validate"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validate"></div>
                  </div>
                  <div class="mb-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div>
                  <div class="text-left"><button type="submit" class="btn btn-primary btn_sendform rad">Send Message</button></div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 help_center d-flex text-center text-white">
            <div class="card">
              <div class="card-body">
                <div class="help_illustration"><img src="assets/img/help.png" class="help_img"></div>
                <h2><small style="font-size: 14px; font-family: Mont">Check out our</small><br> Help Center</h2>
                <p>
                  Read up on guides, tutorials and get answers to most questions 24/7
                </p>
                <a href="{{url('faq')}}" class="btn btn-light btn-block rad">Visit Help Center</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@stop