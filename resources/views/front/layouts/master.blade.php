@php
  use App\Helper;
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title') McLedger – Online bookkeeping services for small businesses​</title>
    <meta name="description" content="@yield('meta_desc')">
    <meta property="og:image" content="@yield('meta_img')">
    <meta name="keywords" content="@yield('meta_keywords')">
    <link href="{{url('assets/img/favicon.png')}}" rel="icon">
    <link href="{{url('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/style.css')}}" rel="stylesheet">
  </head>
  <body>
    <header id="header" class="fixed-top">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-xl-9 d-flex align-items-center">
            <a href="{{url('/')}}" class="logo mr-auto"><img src="{{url('assets/img/logo.png')}}" alt="" class="img-fluid"></a>
            <nav class="nav-menu d-none d-lg-block">
              <ul>
                <li {!!Helper::activePage('/')!!}><a href="{{url('/')}}">Home</a></li>
                <li {!!Helper::activePage('about')!!}><a href="{{url('about')}}">About Us</a></li>
                <li {!!Helper::activePage('how-it-works')!!}><a href="{{url('how-it-works')}}">How It Work</a></li>
                <li {!!Helper::activePage('invoicing')!!}><a href="{{url('invoicing')}}">Invoicing</a></li>
                <li {!!Helper::activePage('pricing')!!}><a href="{{url('pricing')}}">Pricing</a></li>
                <li {!!Helper::activePage('blog')!!}><a href="{{url('blog')}}">Blog</a></li>
              </ul>
            </nav>
            <a href="portal.mcledger.co" class="get-started-btn btn btn-login rad scrollto shadow-sm">LOGIN</a>
          </div>
        </div>
      </div>
    </header>
    @yield('content')
    <footer id="footer" data-aos="slide-up" data-aos-delay="100">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-contact">
            <img src="{{url('assets/img/logo.png')}}" alt="McLedger" class="mw-100 mb-4">
            <p>
              Ready to stop wasting time on tasks and start spending it on scaling, growth and delivering superior service?
              <br><br>
              <a href="#" class="btn btn-primary btn_bg btn-block">START TRIAL FOR FREE</a>
            </p>
          </div>
          <div class="col-lg-9">
            <div class="row" style="padding-left: 40px;">
              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Company</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('about')}}">Who we are?</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('about')}}">What we do?</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('about')}}">Our Mission</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('blog')}}">Blog</a></li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6 footer-links">
                <h4>McLedger Apps</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('about')}}">McLedger</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('invoicing')}}">Accounting Invoicing</a></li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6 footer-links">
                <h4>How it Works</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('how-it-works')}}">How is works?</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('how-it-works')}}">Why us?</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('faq')}}">FAQ</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('contact')}}">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Packages</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('pricing')}}">Packages</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="{{url('pricing')}}">Pricing</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row copyright-wrap d-md-flex py-4">
          <div class="col-md-6 mr-md-auto text-center text-md-left">
            <div class="copyright">
              &copy 2020 All Rights Reserved by McLedger Accounting LLC.
            </div>
            <div class="social-links text-left pt-3 pt-md-0 mt-2">
              <a href="https://twitter.com/McLedgeruae" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/mcledgeruae" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.linkedin.com/company/mcledgeruae" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              <a href="https://www.instagram.com/mcledger" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="https://www.youtube.com/channel/UCESjMRV5uRKWWAjuYMTVXjA" class="youtube"><i class="bx bxl-youtube"></i></a>
              <a href="https://api.whatsapp.com/send?phone=971565224041&data=AbsNf_lklFFwO5Uii96mL9ydHpz2EqPz1ikBiEtOmIv4L-72PadHom4kNKj7g3NlwXAbbIhBqIpDtcUEAg98YQpaJhYzNybr75Weo8AiW7ZLqlOTvVWa_H7zR2i4yqorvX8&source=FB_Ads" class="whats-app"><i class="bx bxl-whatsapp"></i></a>
            </div>
          </div>
          <div class="col-md-1 footer_icon">
            <img src="{{url('assets/img/apple-touch-icon.png')}}" class="mw-100">
          </div>
          <div class="col-md-5 text-right">
            <div class="credits">
              <a href="{{url('privacy-policy')}}">Privacy Policy</a> <span class="text-secondary">|</span>
              <a href="{{url('term-conditions')}}">Terms &amp; Conditions</a>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center text-muted text-sm-center pb-3">
          {{-- <small>
            All trademarks, service marks and logos appearing on the site are the property of their respective owners.
          </small> --}}
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>

  <script src="{{url('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{url('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{url('assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{url('assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{url('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{url('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{url('assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{url('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{url('assets/js/main.js')}}"></script>
  @yield('scripts')
</body></html>