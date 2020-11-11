<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>McLedger - contact-us</title>
      <meta content="" name="descriptison">
      <meta content="" name="keywords">
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
      <link href="assets/vendor/aos/aos.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
   </head>
   <body>
      <header id="header" class="fixed-top pricing_header">
         <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-xl-9 d-flex align-items-center">
                  <a href="index.php" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
                  <nav class="nav-menu d-none d-lg-block">
                     <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="how-it-works.php">How It Work</a></li>
                        <li><a href="invoicing.php">Invoicing</a></li>
                        <li><a href="pricing.php">Pricing</a></li>
                        <li><a href="blog.php">Blog</a></li>
                     </ul>
                  </nav>
                  <a href="/login" class="get-started-btn btn rad scrollto">Login</a>
               </div>
            </div>
         </div>
      </header>
      <section id="hero" class="d-flex align-items-center about-hero">
         <div style="width: 50%; height: 80vh; position: absolute; top: 0; right:0; background-color: #eff0ff; border-bottom-left-radius: 50px; z-index: 2; content: ''"></div>
         <div class="container" data-aos="fade-up" style="z-index: 3;">
            <div class="row justify-content-center pt-5">
               <div class="col-lg-7 order-2 order-lg-2 hero-img p-5" data-aos="zoom-in" data-aos-delay="150">
                  <img src="assets/img/about_hero.png" class="animated mw-100" alt="">
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
                                 <a href="#" class="btn btn-light btn-block rad">Visit Help Center</a>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-12 d-flex flex-column">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="info-box mb-4">
                                    <i class="bx bx-envelope"></i>
                                    <p>help@mcledger.co</p>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="info-box mb-0">
                                    <i class="bx bx-phone-call"></i>
                                    <p>+971 533 188 199</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>

         <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">

              <div class="section-title">
                <h2>Frequently Asked Questions</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
              </div>

              <div class="faq-list">
                <ul>
                  <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                      <p>
                        Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                      </p>
                    </div>
                  </li>

                  <li data-aos="fade-up" data-aos-delay="200">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                      <p>
                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                      </p>
                    </div>
                  </li>

                  <li data-aos="fade-up" data-aos-delay="300">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                      <p>
                        Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                      </p>
                    </div>
                  </li>

                  <li data-aos="fade-up" data-aos-delay="400">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                      <p>
                        Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                      </p>
                    </div>
                  </li>

                  <li data-aos="fade-up" data-aos-delay="500">
                    <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                    <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                      <p>
                        Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </section>
      </main>
      <footer id="footer">
         <div class="footer-top">
            <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-md-6 footer-contact">
                     <h3>McLedger</h3>
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
                              <li><i class="bx bx-chevron-right"></i> <a href="#">Who we are?</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="#">What we do?</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="#">Our Mission</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="#">Blog</a></li>
                           </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links">
                           <h4>McLedger Apps</h4>
                           <ul>
                              <li><i class="bx bx-chevron-right"></i> <a href="#">McLedger Accounting</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="#">Accounting Invoicing</a></li>
                           </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links">
                           <h4>How it Works</h4>
                           <ul>
                              <li><i class="bx bx-chevron-right"></i> <a href="#">How is works?</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="#">Why us?</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="#">FAQ</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="#">Contact Us</a></li>
                           </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links">
                           <h4>Packages</h4>
                           <ul>
                              <li><i class="bx bx-chevron-right"></i> <a href="#">Packages</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="#">Pricing</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="copyright-wrap d-md-flex py-4">
               <div class="mr-md-auto text-center text-md-left">
                  <div class="copyright">
                     All Rights Reserved to McLedger Accounting LLC. 2020
                  </div>
                  <div class="credits">
                     <a href="#">Privacy Policy</a>
                     <a href="#">Terms & Conditions</a>
                  </div>
               </div>
               <div class="social-links text-center text-md-right pt-3 pt-md-0">
                  <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                  <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                  <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12 text-center text-muted text-sm-center pb-3">
                  All trademarks, service marks and logos appearing on the site are the property of their respective owners.
               </div>
            </div>
         </div>
         </footer><!-- End Footer -->
         <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
         <div id="preloader"></div>
         <script src="assets/vendor/jquery/jquery.min.js"></script>
         <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
         <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
         <script src="assets/vendor/php-email-form/validate.js"></script>
         <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
         <script src="assets/vendor/counterup/counterup.min.js"></script>
         <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
         <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
         <script src="assets/vendor/venobox/venobox.min.js"></script>
         <script src="assets/vendor/aos/aos.js"></script>
         <script src="assets/js/main.js"></script>
      </body></html>