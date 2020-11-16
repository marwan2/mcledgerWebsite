@extends('front.layouts.master')
@section('title') Contact Us @stop
@section('content')
<section id="hero" class="d-flex align-items-center about-hero contact_hero">
   <div style="width: 50%; height: 80vh; position: absolute; top: 0; right:0; background-color: #eff0ff; border-bottom-left-radius: 50px; z-index: 2; content: ''"></div>
   <div class="container" data-aos="fade-up" style="z-index: 3;">
      <div class="row justify-content-center pt-5">
         <div class="col-lg-7 order-2 order-lg-2 hero-img p-5" data-aos="zoom-in" data-aos-delay="150">
            <!-- <img src="assets/img/about_hero.png" class="animated mw-100" alt=""> -->
         </div>
         <div class="col-lg-5 pt-3 pt-lg-0 order-1 order-lg-1 d-flex flex-column justify-content-center">
            <h2 class="mb-0">Contact Us</h2>
            <h1 class="mb-5">We'ar here to help your business</h1>
            <p>
               Visit our help center 24/7 or write us an email – no matter what, we’re ready to assist you further.
            </p>
         </div>
      </div>
   </div>
</section>
<main id="main">
   <section class="contact">
      <div class="container">
         <div class="row" style="flex: 1">
            <div class="col-md-7">
               <form action="forms/contact.php" method="post" role="form" class="php-email-form contactForm h-100">
                  <h3>Leave your Message</h3>
                  <p>We will get back to you as soon as possible.</p>
                  <div class="form-row mt-4">
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
            <div class="col-md-1 d-flex align-items-center justify-content-center">OR</div>
            <div class="col-md-4">
               <div class="row d-flex" style="flex: 1">
                  <div class="col-lg-12 help_center d-flex text-center text-white mb-4">
                     <div class="card">
                        <div class="card-body">
                           <div class="help_illustration"><img src="assets/img/help.png" class="help_img"></div>
                           <h2><small style="font-size: 14px; font-family: Mont">Check out our</small><br> Help Center</h2>
                           <p>
                              Read up on guides, tutorials and get answers to most questions 24/7
                           </p>
                           <a href="faq.php" class="btn btn-light btn-block rad">Visit Help Center</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-12 d-flex flex-column">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="info-box mb-4">
                              <i class="bx bx-envelope"></i>
                              <p>info@mcledger.co</p>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="info-box mb-0">
                              <i class="bx bx-phone-call"></i>
                              <p>+971 56 522 4041​</p>
                           </div>
                        </div>
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