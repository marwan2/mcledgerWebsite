<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>McLedger - Blog</title>
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
              <li class="active"><a href="blog.php">Blog</a></li>
            </ul>
          </nav>
          <a href="/login" class="get-started-btn btn rad scrollto">Login</a>
        </div>
      </div>
    </div>
  </header>
  <section id="hero" class="d-flex align-items-center about-hero" style="height: 60vh;">
    <div style="width: 50%; height: 60vh; position: absolute; top: 0; right:0; background-color: #edffff; border-bottom-left-radius: 50px; z-index: 2; content: ''"></div>
    <div class="container" data-aos="fade-up" style="z-index: 3;">
      <div class="row justify-content-center pt-5">
        <div class="col-lg-7 order-2 order-lg-2 hero-img p-5" data-aos="zoom-in" data-aos-delay="150">
          <img src="assets/img/blog_hero.png" class="animated mw-100" alt="">
        </div>
        <div class="col-lg-5 pt-3 pt-lg-0 order-1 order-lg-1 d-flex flex-column justify-content-center">
          <p class="mb-2">Blog</p>
          <h3 class="mb-5">Find Out McLedger announcements, News, tips and tricks</h3>
        </div>
      </div>
    </div>
  </section>
  <main id="main">
    <section class="blog_tags_search">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <a href="#" class="btn btn-primary border-0 btn_bg mr-2">All</a>
            <a href="#" class="btn btn-light base_color mr-2">Accounting</a>
            <a href="#" class="btn btn-light base_color mr-2">McLedger</a>
            <a href="#" class="btn btn-light base_color mr-2">VAT</a>
          </div>
          <div class="col-md-3">
            <div class="input-group blog_search">
              <input type="text" class="form-control" placeholder="Search articles" aria-label="Search" aria-describedby="btnSearch">
              <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button" id="btnSearch"><i class="bx bx-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-md-6">
            <div class="card border-0 rad p-3 blog_card">
              <a href="blog-details.php"><img src="assets/img/requests-2.png" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <div class="post_tags mb-3">
                  <div class="btn btn-light bg-white">Accounting & BookKeeping</div>
                  <div class="btn btn-light bg-white">13 June 2020</div>
                </div>
                <h5 class="card-title">McLedger Online Accounting For SMEs</h5>
                <p class="card-text">
                  Many entrepreneurs have asked us how we are different from other accounting software or companies. So, why not tell you what McLedger is all about?
                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card border-0 rad p-3 blog_card">
              <a href="blog-details.php"><img src="assets/img/requests-2.png" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <div class="post_tags mb-3">
                  <div class="btn btn-light btn-sm bg-white">Industry News</div>
                  <div class="btn btn-light btn-sm bg-white">13 June 2020</div>
                </div>
                <a href="#"><h5 class="card-title">Important Update On ESR</h5></a>
                <p class="card-text">
                  The new amendment in Economic Substance Regulations comes with some significant changes.
                </p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container text-center">
        <nav aria-label="Page navigation example">
          <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item disabled">
              <a class="page-link rounded-pill mr-2 ml-2" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link rounded-pill mr-2 ml-2" href="#">1</a></li>
            <li class="page-item"><a class="page-link rounded-pill mr-2 ml-2" href="#">2</a></li>
            <li class="page-item"><a class="page-link rounded-pill mr-2 ml-2" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link rounded-pill mr-2 ml-2" href="#">Next</a>
            </li>
          </ul>
        </nav>
      </div>
    </section>
  </main>

<?php include "footer.php"; ?>