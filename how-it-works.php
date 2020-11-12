<?php
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
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>McLedger - How it Works</title>
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
                        <li class="active"><a href="how-it-works.php">How It Work</a></li>
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
         <div style="width: 50%; height: 80vh; position: absolute; top: 0; left:0; background-color: #fff; border-bottom-right-radius: 50px; z-index: 2; content: ''; border-right: 5px solid #e0e0e0; border-bottom: 5px solid #e0e0e0"></div>
         <div class="container mt-0 pt-0" data-aos="fade-up" style="z-index: 3;">
            <div class="row justify-content-center pt-1">
               <div class="col-lg-5 pt-0 pt-lg-0 order-2 order-lg-2 d-flex flex-column justify-content-center">
                  <h2 class="mb-0">How it works</h2>
                  <h1 class="base_color mb-5">
                  Making accounting effortless for you​.
                  </h1>
               </div>
               <div class="col-lg-7 order-1 order-lg-1 hero-img" data-aos="zoom-in" data-aos-delay="150">
                  <img src="assets/img/how_hero.png" class="animated mw-100" alt="">
               </div>
            </div>
         </div>
      </section>
      <main id="main">
         <section class="about_block">
            <div class="container">
               <div class="_row" style="overflow: visible; display: flex; align-content: center; border-radius: 30px; background-color: #f4f5f7; height: 410px; margin-bottom: 60px; width: 100%;">
                  <div class="col-md-6" style="height: 100%">
                     <img src="assets/img/app_auth.png" class="mw-100" alt="..." style="margin-bottom: 0;padding-top: 0;position: absolute;bottom: 30px;left: -75px;" data-aos="slide-up" data-aos-delay="120">
                  </div>
                  <div class="col-md-6 d-flex flex-column justify-content-center">
                     <ol class="reg_steps">
                        <li data-aos="slide-up" data-aos-delay="120">
                           <h3>Register</h3>
                           <p>Give us a call to register or do it through our apps​</p>
                        </li>
                        <li data-aos="slide-up" data-aos-delay="120">
                           <h3>On boarding</h3>
                           <p>Our expert accountant will visit for business account setup, ensure all data is collected, & follow up throughout the first two months of client experience ​</p>
                        </li>
                        <li data-aos="slide-up" data-aos-delay="120">
                           <h3>Activate business</h3>
                           <p>Each business is reviewed individually and activated accordingly​</p>
                        </li>
                     </ol>
                  </div>
               </div>
               <div class="card" style="overflow: visible; border-radius: 30px; background-color: #f4f5f7; margin-bottom: 60px; width: 100%; border: none;">
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
                        <div class="col-md-6" >
                           <img src="assets/img/app_preview.png" alt="" class="mw-100" style="position: absolute; bottom: -140px;">
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
                              <div class="col-md-5 pr-0 compare_items">
                                 <ul>
                                    <li class="header">Item</li>
                                    <?php foreach ($featuresTable as $label => $vars): ?>
                                    <li><?= $label ?></li>
                                    <?php endforeach; ?>
                                 </ul>
                              </div>

                              <div class="col-md-7 pl-0">
                                 <div class="row compare_cols">
                                    <div class="col-md-3">
                                       <ul class="bg mc_col">
                                          <li class="header">McLedger</li>
                                          <?php foreach ($featuresTable as $label => $vars): ?>
                                          <li><?= get_feature($vars[0]) ?></li>
                                          <?php endforeach; ?>
                                       </ul>
                                    </div>
                                    <div class="col-md-3">
                                       <ul>
                                          <li class="header">In-House</li>
                                          <?php foreach ($featuresTable as $label => $vars): ?>
                                          <li><?= get_feature($vars[1]) ?></li>
                                          <?php endforeach; ?>
                                       </ul>
                                    </div>
                                    <div class="col-md-3">
                                       <ul>
                                          <li class="header">Freelance</li>
                                          <?php foreach ($featuresTable as $label => $vars): ?>
                                          <li><?= get_feature($vars[2]) ?></li>
                                          <?php endforeach; ?>
                                       </ul>
                                    </div>
                                    <div class="col-md-3">
                                       <ul>
                                          <li class="header">Outsourcing</li>
                                          <?php foreach ($featuresTable as $label => $vars): ?>
                                          <li><?= get_feature($vars[3]) ?></li>
                                          <?php endforeach; ?>
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
                        <a href="#" class="btn btn_bg btn-dark border-0 btn-lg pl-5 pr-5 font-weight-bold mt-2">START TRIAL FOR FREE</a>
                     </div>
                  </div>
               </div>
            </section>
         </main>
<?php include "footer.php"; ?>