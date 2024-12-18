<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>CodeConnect by CodingHQ</title>

  <!-- SEO Meta Tags -->
  <meta name="description" content="CodeConnect is an annual tech conference that serves as a platform to inspire,
educate, and connect both aspiring and successful software engineers">
  <meta name="keywords"
    content="codeconnect2, codinghq, tech conference, Douala, douala conference, tech submit in douala">
  <meta name="author" content="CodingHQ">

  <!-- Viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon and Touch Icons -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/codingHQ_small.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/codingHQ_small.png">
  <link rel="manifest" href="assets/favicon/site.webmanifest">
  <link rel="mask-icon" href="assets/favicon/safari-pinned-tab.svg" color="#6366f1">
  <link rel="shortcut icon" href="assets/favicon/codingHQ_small.png">
  <meta name="msapplication-TileColor" content="#080032">
  <meta name="msapplication-config" content="assets/favicon/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">

  <!-- Vendor Styles -->
  <link rel="stylesheet" media="screen" href="assets/vendor/boxicons/css/boxicons.min.css" />
  <link rel="stylesheet" media="screen" href="assets/vendor/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" media="screen" href="assets/vendor/lightgallery/css/lightgallery-bundle.min.css" />

  <!-- Main Theme Styles + Bootstrap -->
  <link rel="stylesheet" media="screen" href="assets/css/theme.min.css">

  <!-- Page loading styles -->
  <style>
    .page-loading {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      -webkit-transition: all .4s .2s ease-in-out;
      transition: all .4s .2s ease-in-out;
      background-color: #fff;
      opacity: 0;
      visibility: hidden;
      z-index: 9999;
    }

    .dark-mode .page-loading {
      background-color: #0b0f19;
    }

    .page-loading.active {
      opacity: 1;
      visibility: visible;
    }

    .page-loading-inner {
      position: absolute;
      top: 50%;
      left: 0;
      width: 100%;
      text-align: center;
      -webkit-transform: translateY(-50%);
      transform: translateY(-50%);
      -webkit-transition: opacity .2s ease-in-out;
      transition: opacity .2s ease-in-out;
      opacity: 0;
    }

    .page-loading.active>.page-loading-inner {
      opacity: 1;
    }

    .page-loading-inner>span {
      display: block;
      font-size: 1rem;
      font-weight: normal;
      color: #9397ad;
    }

    .dark-mode .page-loading-inner>span {
      color: #fff;
      opacity: .6;
    }

    .page-spinner {
      display: inline-block;
      width: 2.75rem;
      height: 2.75rem;
      margin-bottom: .75rem;
      vertical-align: text-bottom;
      border: .15em solid #b4b7c9;
      border-right-color: transparent;
      border-radius: 50%;
      -webkit-animation: spinner .75s linear infinite;
      animation: spinner .75s linear infinite;
    }

    .dark-mode .page-spinner {
      border-color: rgba(255, 255, 255, .4);
      border-right-color: transparent;
    }

    @-webkit-keyframes spinner {
      100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @keyframes spinner {
      100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }
  </style>

  <!-- Theme mode -->
  <script>
    let mode = window.localStorage.getItem('mode'),
      root = document.getElementsByTagName('html')[0];
    if (mode !== null && mode === 'dark') {
      root.classList.add('dark-mode');
    } else {
      root.classList.remove('dark-mode');
    }
  </script>

  <!-- Page loading scripts -->
  <script>
    (function () {
      window.onload = function () {
        const preloader = document.querySelector('.page-loading');
        preloader.classList.remove('active');
        setTimeout(function () {
          preloader.remove();
        }, 1000);
      };
    })();
  </script>
</head>


<!-- Body -->

<body>

  <!-- Page loading spinner -->
  <div class="page-loading active">
    <div class="page-loading-inner">
      <div class="page-spinner"></div><span>Let's connect...</span>
    </div>
  </div>


  <!-- Page wrapper for sticky footer -->
  <!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
  <main class="page-wrapper">


    <!-- Navbar -->
    <!-- Remove "fixed-top" class to make navigation bar scrollable with the page -->
    <header class="header navbar navbar-expand-lg bg-light shadow-sm fixed-top">
      <div class="container px-3">
        <a href="index.html" class="navbar-brand pe-3">
          CodeConnect
        </a>
        <div id="navbarNav" class="offcanvas offcanvas-end">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <!-- Here is the Navbar  -->
          <div class="offcanvas-body">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a href="feedback/" class="nav-link">FeedBack</a>
              </li>
              <li class="nav-item">
                <a href="presentation/" class="nav-link">Presentations</a>
              </li>
            </ul>
          </div>
          <div class="offcanvas-header border-top">
            <a href="https://bit.ly/codeconnect2" class="btn btn-primary w-100" target="_blank" rel="noopener">
              <i class=" fs-4 lh-1 me-1"></i>
              &nbsp;Register now
            </a>
          </div>
        </div>
        <div class="form-check form-switch mode-switch pe-lg-1 ms-auto me-4" data-bs-toggle="mode">
          <input type="checkbox" class="form-check-input" id="theme-mode">
          <label class="form-check-label d-none d-sm-block" for="theme-mode">Light</label>
          <label class="form-check-label d-none d-sm-block" for="theme-mode">Dark</label>
        </div>
        <button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a href="https://bit.ly/codeconnect2" class="btn btn-primary btn-sm fs-sm rounded d-none d-lg-inline-flex"
          target="_blank" rel="noopener">
          <i class=" fs-5 lh-1 me-1"></i>
          Register now
        </a>
      </div>
    </header>


    <!-- Video + Title split section -->
    <section class="container-fluid position-relative px-0 pt-5 mt-3 mt-lg-4">
      <div class="row g-0">
        <div class="col-xl-7 col-lg-6 pe-lg-5">
          <div class="d-flex h-100 pe-xl-4">
            <video class="w-100" autoplay muted loop style="object-fit: cover;">
              <source src="assets/img/landing/conference/hero-video.mp4" type="video/mp4">
            </video>
          </div>
        </div>
        <div class="col-xl-5 col-lg-6 position-relative py-5">
          <img src="assets/img/landing/conference/hero-bg.png"
            class="position-absolute top-50 translate-middle-y ms-lg-n4" width="866" alt="Background shapes">
          <div
            class="position-relative zindex-5 text-center text-lg-start px-3 px-lg-0 py-xl-4 py-xxl-5 mt-lg-3 mx-auto mx-lg-0"
            style="max-width: 530px;">
            <h2 class="h3 text-primary">Nov 23, 2024</h2>
            <h1 class="display-1 pb-lg-3 mb-3">CodeConnect Conference</h1>
            <div class="d-flex justify-content-center justify-content-lg-start text-start mb-2">
              <i class="bx bx-map fs-4 text-primary me-2"></i>
              <div class="fs-xl">Hotel Prince De Galles,<br>Akwa, Douala</div>
            </div>
            <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start py-4 py-lg-5">
              <a href="https://www.bit.ly/codeconnect2" target="_blank"
                class="btn btn-primary shadow-primary btn-lg me-sm-3 me-xl-4 mb-3">Register
                Now</a>
              <a href="https://www.google.com/calendar/render?action=TEMPLATE&text=CodeConnect&dates=20241123T090000Z/20241123T160000Z&details=Beyond the code&location=Hotel Prince De Galles"
                target="
                _blank" class="btn btn-outline-primary btn-lg mb-3">
                <i class="bx bx-calendar-check fs-xl me-2 ms-n1"></i>
                Add to calendar
              </a>
            </div>
            <div
              class="d-flex align-items-center justify-content-center justify-content-lg-start text-start pb-2 pt-lg-2 pb-xl-0 pt-xl-5 mt-xxl-5">
              <div class="d-flex me-3">
                <div class="d-flex align-items-center justify-content-center bg-light rounded-circle"
                  style="width: 52px; height: 52px;">
                  <img src="assets/img/team/Samuel.jpg" class="rounded-circle" width="48" alt="Avatar">
                </div>
                <div class="d-flex align-items-center justify-content-center bg-light rounded-circle ms-n3"
                  style="width: 52px; height: 52px;">
                  <img src="assets/img/team/daniel.png" class="rounded-circle" width="48" alt="Avatar">
                </div>
                <div class="d-flex align-items-center justify-content-center bg-light rounded-circle ms-n3"
                  style="width: 52px; height: 52px;">
                  <img src="assets/img/team/yannick.jpg" class="rounded-circle" width="48" alt="Avatar">
                </div>
              </div>
              <span class="fs-sm"><span class="text-primary fw-semibold">200+</span> attendees are already with
                us</span>
            </div>
          </div>
        </div>
      </div>
      <div class="position-absolute d-none d-lg-block bottom-0 start-0 w-100 zindex-5 pb-xxl-5">
        <div class="container pb-4 mb-3 mb-xxl-0">
          <a href="#speakers" class="d-table text-light opacity-80 text-decoration-none w-auto py-4" data-scroll
            data-scroll-offset="70">
            <span class="d-flex align-items-center">
              Scroll for more
              <i class="bx bx-down-arrow-circle fs-3 ms-2"></i>
            </span>
          </a>
        </div>
      </div>
    </section>


    <!-- Sponsors -->
    <section id="sponsors" class="position-relative bg-dark py-5">
      <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(255,255,255,.05);"></div>
      <div class="container position-relative zindex-5 pt-1 pt-md-2 pb-lg-2 pt-lg-4">
        <h2 class="h3 text-light text-center text-lg-start mb-4 mb-lg-5">Sponsored by:</h2>
        <div class="swiper ms-xxl-n5 me-xxl-n4" data-swiper-options='{
            "slidesPerView": 2,
            "spaceBetween": 24,
            "pagination": {
              "el": ".swiper-pagination",
              "clickable": true
            },
            "breakpoints": {
              "500": {
                "slidesPerView": 3
              },
              "650": {
                "slidesPerView": 4
              },
              "900": {
                "slidesPerView": 5
              },
              "1100": {
                "slidesPerView": 6
              }
            }
          }'>
          <div class="swiper-wrapper">

            <!-- Item -->
            <div class="swiper-slide">
              <a href="#" class="d-block py-3">
                <img src="assets/img/brands/effex.png" class="d-block mx-auto" width="124" alt="effex">
              </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide">
              <a href="#" class="d-block py-3">
                <img src="assets/img/brands/icreate.png" class="d-block mx-auto" width="124" alt="icreate">
              </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide">
              <a href="#" class="d-block py-3">
                <img src="assets/img/brands/goldlinks.png" style="color: white;" class="d-block mx-auto" width="124"
                  alt="goldlinks">
              </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide">
              <a href="#" class="d-block py-3">
                <img src="assets/img/brands/gitwit.png" class="d-block mx-auto" width="124" alt="gitwit">
              </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide">
              <a href="#" class="d-block py-3">
                <img src="assets/img/brands/CSC_Full logo.png" class="d-block mx-auto" width="124"
                  alt="cameroon software company">
              </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide">
              <a href="https://sesa-tech.com" class="d-block py-3">
                <img src="assets/img/brands/sesa.png" class="d-block mx-auto" width="124" alt="sesa tech">
              </a>
            </div>

            <!-- Item -->
            <div class="swiper-slide">
              <a href="https://coding-hq.com" class="d-block py-3">
                <img src="assets/img/brands/codingHQ_long_logo.png" class="d-block mx-auto" width="124" alt="codinghq">
              </a>
            </div>
          </div>

          <!-- Pagination (bullets) -->
          <div class="swiper-pagination position-relative pt-2 mt-4"></div>
        </div>
      </div>
    </section>


    <!-- Speakers -->
    <section id="speakers" class="container py-5 my-2 my-md-4 my-lg-5">
      <div class="d-md-flex align-items-center justify-content-between text-center text-md-start pt-md-1 pt-lg-3">
        <h2 class="h1 mb-4 mb-md-0 me-md-3">World-Class Speakers</h2>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mt-2 mt-lg-4">

        <!-- Item -->
        <div class="col">
          <div class="card card-hover border-0 bg-transparent">
            <div class="position-relative">
              <img src="assets/img/team/derek.jpg" class="rounded-3" alt="Agendi Derek">
              <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-35 rounded-3"></span>
                <div class="position-relative d-flex zindex-2">

                  <a href="https://www.linkedin.com/in/derekagendia/"
                    class="btn btn-icon btn-secondary btn-linkedin btn-sm bg-white me-2">
                    <i class="bx bxl-linkedin"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body text-center p-3">
              <h3 class="fs-lg fw-semibold pt-1 mb-2">Agendia Derek</h3>
              <p class="fs-sm mb-0">UI/UX Designer, Icreate</p>
            </div>
          </div>
        </div>

        <!-- Item -->
        <div class="col">
          <div class="card card-hover border-0 bg-transparent">
            <div class="position-relative">
              <img src="assets/img/team/daniel.png" class="rounded-3" alt="Nghokeng Daniel">
              <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-35 rounded-3"></span>
                <div class="position-relative d-flex zindex-2">

                  <a href="https://www.linkedin.com/in/nghokeng-daniel-st%C3%A9phane-860340172/"
                    class="btn btn-icon btn-secondary btn-linkedin btn-sm bg-white me-2">
                    <i class="bx bxl-linkedin"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body text-center p-3">
              <h3 class="fs-lg fw-semibold pt-1 mb-2">Nghokeng Daniel</h3>
              <p class="fs-sm mb-0">Senior Software Engineer, CSC</p>
            </div>
          </div>
        </div>

        <!-- Item -->
        <div class="col">
          <div class="card card-hover border-0 bg-transparent">
            <div class="position-relative">
              <img src="assets/img/team/steve.jpg" class="rounded-3" alt="Fasseu Steve">
              <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-35 rounded-3"></span>
                <div class="position-relative d-flex zindex-2">

                  <a href="https://www.linkedin.com/in/steve-fasseu/"
                    class="btn btn-icon btn-secondary btn-linkedin btn-sm bg-white me-2">
                    <i class="bx bxl-linkedin"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body text-center p-3">
              <h3 class="fs-lg fw-semibold pt-1 mb-2">Steve Fasseu</h3>
              <p class="fs-sm mb-0">Senior Software Engineer</p>
            </div>
          </div>
        </div>

        <!-- Item -->
        <div class="col">
          <div class="card card-hover border-0 bg-transparent">
            <div class="position-relative">
              <img src="assets/img/team/collins.png" class="rounded-3" alt="Collins Ngwashi">
              <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-35 rounded-3"></span>
                <div class="position-relative d-flex zindex-2">

                  <a href="https://www.linkedin.com/in/collins-ngwashi-682193152/"
                    class="btn btn-icon btn-secondary btn-linkedin btn-sm bg-white me-2">
                    <i class="bx bxl-linkedin"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body text-center p-3">
              <h3 class="fs-lg fw-semibold pt-1 mb-2">Collins Ngwashi</h3>
              <p class="fs-sm mb-0">Managing Director, Effex Studios</p>
            </div>
          </div>
        </div>

        <!-- Item -->
        <div class="col">
          <div class="card card-hover border-0 bg-transparent">
            <div class="position-relative">
              <img src="assets/img/team/Samuel.jpg" class="rounded-3" alt="Samuel Bakon">
              <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-35 rounded-3"></span>
                <div class="position-relative d-flex zindex-2">

                  <a href="https://www.linkedin.com/in/samuel-bakon-gl/"
                    class="btn btn-icon btn-secondary btn-linkedin btn-sm bg-white me-2">
                    <i class="bx bxl-linkedin"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body text-center p-3">
              <h3 class="fs-lg fw-semibold pt-1 mb-2">Samuel Bakon</h3>
              <p class="fs-sm mb-0">Senior Software Engineer</p>
            </div>
          </div>
        </div>

        <!-- Item -->
        <div class="col">
          <div class="card card-hover border-0 bg-transparent">
            <div class="position-relative">
              <img src="assets/img/team/sandra.jpg" class="rounded-3" alt="AK Sandra">
              <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-35 rounded-3"></span>
                <div class="position-relative d-flex zindex-2">
                  <a href="https://www.facebook.com/ak.sandra.940/" class="btn btn-icon btn-secondary btn-facebook btn-sm bg-white me-2">
                    <i class="bx bxl-facebook"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body text-center p-3">
              <h3 class="fs-lg fw-semibold pt-1 mb-2">AK Sandra</h3>
              <p class="fs-sm mb-0">Frontend Developer, GoldLinks Digital</p>
            </div>
          </div>
        </div>

        <!-- Item -->
        <div class="col">
          <div class="card card-hover border-0 bg-transparent">
            <div class="position-relative">
              <img src="assets/img/team/yannick.jpg" class="rounded-3" alt="Yannick Nde">
              <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-35 rounded-3"></span>
                <div class="position-relative d-flex zindex-2">

                  <a href="https://www.linkedin.com/in/yanicknde/"
                    class="btn btn-icon btn-secondary btn-linkedin btn-sm bg-white me-2">
                    <i class="bx bxl-linkedin"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body text-center p-3">
              <h3 class="fs-lg fw-semibold pt-1 mb-2">Yannick Nde</h3>
              <p class="fs-sm mb-0">Senior Software Engineer</p>
            </div>
          </div>
        </div>

        <!-- Item -->
        <div class="col">
          <div class="card card-hover border-0 bg-transparent">
            <div class="position-relative">
              <img src="assets/img/team/merime.jpg" class="rounded-3" alt="YMérimé Ngouabo">
              <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-35 rounded-3"></span>
                <div class="position-relative d-flex zindex-2">

                  <a href="https://www.linkedin.com/in/m%C3%A9rim%C3%A9-ngouabo-pesijo-479923b8/"
                    class="btn btn-icon btn-secondary btn-linkedin btn-sm bg-white me-2">
                    <i class="bx bxl-linkedin"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body text-center p-3">
              <h3 class="fs-lg fw-semibold pt-1 mb-2">Mérimé Ngouabo</h3>
              <p class="fs-sm mb-0">Avocat Stagiaire au barreau du Cameroun</p>
            </div>
          </div>
        </div>

        <!-- Item -->
        <div class="col">
          <div class="card card-hover border-0 bg-transparent">
            <div class="position-relative">
              <img src="assets/img/team/cedric.jpg" class="rounded-3" alt="Cédric Djomaleu">
              <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-35 rounded-3"></span>
                <div class="position-relative d-flex zindex-2">

                  <a href="https://www.linkedin.com/in/c%C3%A9dric-djomaleu-738131143/"
                    class="btn btn-icon btn-secondary btn-linkedin btn-sm bg-white me-2">
                    <i class="bx bxl-linkedin"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body text-center p-3">
              <h3 class="fs-lg fw-semibold pt-1 mb-2">Cédric Djomaleu</h3>
              <p class="fs-sm mb-0">Coach formateur en Art Oratoire, Leadership Academy</p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Tickets and About -->
    <section id="about" class="container pb-5 mb-2 mb-md-4 mb-lg-5 mt-n3 mt-lg-0">
      <div class="row pt-xl-2 pb-md-3">
        <div class="col-lg-5 mb-4 mb-lg-0">
          <h2 class="h1 text-center text-sm-start mb-4">Welcome to the greatest Tech Conference in Cameroon</h2>
          <p class="pb-2 pb-lg-4 pb-xl-5 mb-3">CodeConnect is an annual tech conference that serves as a platform to
            inspire,
            educate, and connect both aspiring and successful software engineers. Launched
            in 2024, CodeConnect aims to provide valuable insights into the
            tech industry, emphasizing on the broader
            aspects of a tech career, including branding, project management,
            and career progression.</p>
          <h3 class="text-center text-sm-start mb-4">Ticket Prices</h3>

          <!-- Pricing -->
          <ul class="list-group">
            <li class="list-group-item d-flex flex-column flex-sm-row align-items-center justify-content-between p-4">
              <div class="d-flex align-items-center">
                <svg class="flex-shrink-0 me-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M23.794 1.71278C23.5195 1.43819 23.0743 1.43819 22.7997 1.71278L21.4284 3.08406C20.6078 2.1197 19.3859 1.50686 18.0235 1.50686C16.8653 1.50686 15.7764 1.95789 14.9577 2.77675L0.205961 17.5284C0.00486702 17.7295 -0.0552736 18.0319 0.0535233 18.2947C0.162367 18.5574 0.418726 18.7287 0.703117 18.7287H9.44934L11.8087 21.0881H11.2469C10.8585 21.0881 10.5437 21.4029 10.5437 21.7912C10.5437 22.1795 10.8585 22.4943 11.2469 22.4943H15.7656C16.1539 22.4943 16.4687 22.1795 16.4687 21.7912C16.4687 21.4029 16.1539 21.0881 15.7656 21.0881H13.7975L11.4381 18.7287H14.2594C18.7998 18.7287 22.4937 15.0348 22.4937 10.4943V5.97709C22.4937 5.39355 22.3812 4.83578 22.1769 4.32428L23.794 2.70714C24.0687 2.43255 24.0687 1.98737 23.794 1.71278ZM2.4006 17.3224L13.5562 6.1668V8.98806C13.5562 13.5836 9.81745 17.3224 5.22187 17.3224H2.4006ZM21.0875 10.4943C21.0875 14.2594 18.0244 17.3225 14.2594 17.3225H10.2592C13.0761 15.6134 14.9625 12.5168 14.9625 8.98811V6.15995C14.9625 5.25752 15.3139 4.40913 15.952 3.77116C16.5052 3.21784 17.2409 2.91316 18.0235 2.91316C19.713 2.91316 21.0875 4.28767 21.0875 5.97719L21.0875 10.4943Z"
                    fill="currentColor" />
                  <path
                    d="M18.7781 5.97526C19.1664 5.97526 19.4812 5.66046 19.4812 5.27213C19.4812 4.88381 19.1664 4.56901 18.7781 4.56901C18.3898 4.56901 18.075 4.88381 18.075 5.27213C18.075 5.66046 18.3898 5.97526 18.7781 5.97526Z"
                    fill="currentColor" />
                </svg>
                <h4 class="fs-base fw-semibold text-nowrap ps-1 mb-0">Early birds</h4>
              </div>
              <h5 class="text-primary my-2 my-sm-0">Free</h5>
              <div class="fs-sm">until Nov 20, 2024</div>
            </li>
            <li class="list-group-item d-flex flex-column flex-sm-row align-items-center justify-content-between p-4">
              <div class="d-flex align-items-center">
                <svg class="flex-shrink-0 me-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M18.0225 2.91133C17.2397 2.91133 16.5038 3.21602 15.9507 3.76914C15.3132 4.40664 14.9616 5.25508 14.9616 6.15977V8.98633C14.9616 12.516 13.0772 15.6098 10.26 17.3207H14.2585C18.0225 17.3207 21.0882 14.2598 21.0882 10.491V5.97227C21.0882 4.28945 19.71 2.91133 18.0225 2.91133ZM18.7772 5.97695C18.3882 5.97695 18.0741 5.66289 18.0741 5.27383C18.0741 4.88477 18.3882 4.5707 18.7772 4.5707C19.1663 4.5707 19.4804 4.88477 19.4804 5.27383C19.4804 5.66289 19.1663 5.97695 18.7772 5.97695ZM23.7929 1.71133C23.5163 1.43477 23.071 1.43477 22.7991 1.71133L21.4257 3.08477C20.6054 2.11914 19.3819 1.50977 18.0225 1.50977C16.8647 1.50977 15.7772 1.95977 14.9569 2.78008L0.20535 17.527C0.00378752 17.7285 -0.05715 18.0285 0.0506625 18.291C0.158475 18.5535 0.416288 18.727 0.702225 18.727H5.22097H9.4491L11.8069 21.0848H11.2444C10.8553 21.0848 10.5413 21.3988 10.5413 21.7879C10.5413 22.177 10.8553 22.491 11.2444 22.491H15.7632C16.1522 22.491 16.4663 22.177 16.4663 21.7879C16.4663 21.3988 16.1522 21.0848 15.7632 21.0848H13.7944L11.4366 18.727H14.2585C18.8007 18.727 22.4944 15.0332 22.4944 10.491V5.97227C22.4944 5.39102 22.3819 4.8332 22.1757 4.31758L23.7929 2.70039C24.0694 2.4332 24.0694 1.98789 23.7929 1.71133ZM2.3991 17.3207L13.5554 6.16445V8.98633C13.5554 13.5801 9.81472 17.3207 5.22097 17.3207H2.3991ZM21.0882 10.4957C21.0882 14.2598 18.0272 17.3254 14.2585 17.3254H10.26C13.0772 15.6145 14.9616 12.516 14.9616 8.98633V6.15977C14.9616 5.25508 15.3132 4.40664 15.9507 3.76914C16.5038 3.21602 17.2397 2.91133 18.0225 2.91133C19.71 2.91133 21.0882 4.28477 21.0882 5.97695V10.4957Z"
                    fill="currentColor" />
                </svg>
                <h4 class="fs-base fw-semibold text-nowrap ps-1 mb-0">Late birds</h4>
              </div>
              <h5 class="badge bg-primary fs-5 fw-bold rounded px-3 py-0 my-3 my-sm-0">xaf 5000</h5>
              <div class="fs-sm">after Nov 20, 2024</div>
            </li>
          </ul>
        </div>
        <div class="col-xl-6 col-lg-7 offset-xl-1 position-relative">

          <!-- Ticket card -->
          <div class="position-relative">
            <div class="position-relative overflow-hidden bg-gradient-primary rounded-3 zindex-5 py-5 px-4 p-sm-5">
              <span class="position-absolute top-50 start-0 translate-middle bg-light rounded-circle p-4"></span>
              <span class="position-absolute top-0 start-0 w-100 h-100 bg-repeat-0 bg-position-center-end bg-size-cover"
                style="background-image: url(assets/img/landing/conference/price-card-pattern.png);"></span>
              <div class="px-md-4 position-relative zindex-5">
                <div class="d-sm-flex align-items-start justify-content-between">
                  <div class="text-center text-sm-start me-sm-4">
                    <div class="lead fw-semibold text-light text-uppercase mb-2">Nov 23</div>
                    <h3 class="h1 text-light">Beyond The Code</h3>
                  </div>
                  <div class="d-table bg-white rounded-3 p-4 flex-shrink-0 mx-auto mx-sm-0">
                    <img src="assets/img/landing/conference/bit.ly_m_codinghq.png" width="132" alt="QR Code">
                  </div>
                </div>
                <div class="d-flex flex-column flex-sm-row align-items-center pt-4 mt-2">
                  <a href="https://bit/ly/codeconnect2" class="btn btn-light btn-lg mb-3 mb-sm-0 me-sm-3">Register
                    Now</a>
                  <div class="d-flex align-items-center">
                    <span class="fs-lg text-light me-2">for free</span>
                  </div>
                </div>
              </div>
              <span class="position-absolute top-50 end-0 translate-middle-y bg-light rounded-circle p-4 me-n4"></span>
            </div>
            <span class="position-absolute bg-gradient-primary opacity-60 bottom-0 mb-n2 d-dark-mode-none"
              style="left: 1.5rem; width: calc(100% - 3rem); height: 5rem; filter: blur(.625rem);"></span>
          </div>

          <!-- Arrow -->
          <div class="position-absolute bottom-0 text-primary d-none d-lg-block ms-xl-n5 mb-lg-5 mb-xl-4 pb-3">
            <div class="ms-xl-n4">
              <svg width="95" height="100" viewBox="0 0 95 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M78.8361 25.0939C91.1514 40.6379 81.8802 63.3086 61.7212 64.3539C60.7119 64.447 59.5832 64.3477 58.6105 64.2848C58.7669 50.9978 52.4534 36.5276 41.6324 32.847C31.8669 29.5776 26.5235 39.0204 30.5663 47.0383C35.4083 56.5589 43.9198 64.4699 54.2628 67.3808C53.4517 75.7446 49.4008 83.1867 40.4191 85.693C25.2817 89.8859 9.48935 75.832 7.25928 61.4938C7.12064 59.981 4.79 60.0942 4.92864 61.607C5.83171 80.8987 28.9103 96.1621 46.7792 87.3441C53.6867 83.8595 57.3887 76.5003 58.3558 68.173C69.2212 69.5612 79.5859 63.2659 85.1681 54.2081C91.5844 43.7002 88.5763 31.9764 81.257 23.1926C80.1091 21.7727 77.8441 23.7109 78.8361 25.0939ZM39.1221 52.6568C36.2753 49.3596 33.1435 45.1733 32.7276 40.635C32.275 36.2527 38.2211 36.1619 40.7539 36.5897C43.9108 37.163 46.2067 40.0025 47.9151 42.5401C51.7632 47.8805 54.3289 55.8821 54.5172 63.4926C48.5423 61.6026 43.3094 57.2542 39.1221 52.6568Z"
                  fill="currentColor" />
                <path
                  d="M75.1096 15.0312C74.0848 19.3973 73.3354 23.9923 73.4392 28.4577C73.5047 30.2821 76.0279 30.0497 76.1186 28.2613C76.2997 24.6849 77.2976 21.1349 78.2588 17.7408C80.2501 18.3708 82.3978 19.0372 84.3528 19.8231C85.8397 20.4997 87.9238 22.1382 89.7035 21.5672C90.5937 21.2818 90.7767 20.5022 90.6474 19.6495C90.3065 17.596 87.0302 16.8302 85.3872 16.1172C82.6885 14.993 80.073 14.2174 77.2645 13.561C76.3289 13.3423 75.3292 14.0956 75.1096 15.0312Z"
                  fill="currentColor" />
              </svg>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Highlights (Video showreel) -->


    <!-- Schedule -->
    <section class="container py-5" id="schedule">
      <div class="row mt-xl-2 mb-xl-3 pb-3 py-md-4 py-lg-5">
        <div class="col-12">
          <h2 class="h1 text-center text-sm-start pb-2 pb-lg-0 mb-4 mb-lg-5">Schedule</h2>
        </div>
        <div class="col-lg-3 mb-4">

          <!-- Nav tabs -->
          <div class="nav flex-nowrap flex-lg-column nav-tabs" role="tablist" aria-orientation="vertical">
            <a href="#day-1" class="nav-link d-block w-100 rounded-3 p-4 p-xl-5 me-2 me-sm-3 me-lg-0 mb-lg-3 active"
              id="day-1-tab" data-bs-toggle="tab" role="tab" aria-controls="day-1" aria-selected="true">
              <div class="fs-xl">Event Day</div>
              <div class="fs-3 fw-bold">Nov 23, 2024</div>
            </a>
          </div>
        </div>
        <div class="col-lg-8 offset-lg-1">

          <!-- Tab panes -->
          <div class="tab-content">

            <!-- Day 1 schedule -->
            <div class="tab-pane fade show active" id="day-1" role="tabpanel" aria-labelledby="day-1-tab">
              <div class="border-bottom pb-4">
                <div class="row pb-1 pb-xl-3">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="h5 mb-1">9:30 – 10:30 am</div>
                    <p class="text-muted mb-0">November 23rd</p>
                  </div>
                  <div class="col-sm-8">
                    <h5 class="mb-0">Opening party &amp; early registration</h5>
                  </div>
                </div>
              </div>

              <!-- Welcome talk  -->
              <div class="border-bottom py-4">
                <div class="row py-1 py-xl-3">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="h5 mb-1">10:45 – 11:00 am</div>
                    <span class="badge bg-warning shadow-warning fs-sm">Welcome Talk</span>
                  </div>
                  <div class="col-sm-8">
                    <h5>Welcome Message</h5>
                    <p class="mb-4">An opening talk to set the tone, welcome everyone, and
                      introduce the theme of the event, “Beyond the Code: Crafting Your Tech
                      Career.</p>
                    <div class="d-flex align-items-center">
                      <div class="ps-3">
                        <h6 class="fw-semibold mb-1">Nkwenti Deshnic</h6>
                        <p class="fs-sm text-muted mb-0">Coordinator, CodingHQ</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- KeyNote speach  -->
              <div class="border-bottom py-4">
                <div class="row py-1 py-xl-3">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="h5 mb-1">10:45 – 11:00 am</div>
                    <span class="badge bg-warning shadow-warning fs-sm">Keynote Speech</span>
                  </div>
                  <div class="col-sm-8">
                    <h5>The Future of Tech Careers</h5>
                    <p class="mb-4">An inspiring talk focused on the tech journey and the
                      importance of skill-building and self-confidence, aligning with the conference
                      theme.</p>
                    <div class="d-flex align-items-center">
                      <img src="assets/img/team/yannick.jpg" class="" width="50" height="50" alt="Yannick Nde">
                      <div class="ps-3">
                        <h6 class="fw-semibold mb-1">Yannick Nde</h6>
                        <p class="fs-sm text-muted mb-0">Senoir Software Engineer</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border-bottom py-4">
                <div class="row py-1 py-xl-3">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="h5 mb-1">11:20 am – 12:10 pm</div>
                    <span class="badge bg-success shadow-success fs-sm">Workshop</span>
                  </div>
                  <div class="col-sm-8">
                    <h5>Panel Discussion</h5>
                    <p class="mb-4">Topics for aspiring developers, such as foundational skills, career
                      paths, and tips for breaking into the industry.</p>
                    <div class="row row-cols-1 row-cols-md-2 g-3">
                      <div class="col">
                        <div class="d-flex align-items-center">
                          <img src="assets/img/team/daniel.png" class="" width="48" alt="Nghokeng Daniel">
                          <div class="ps-3">
                            <h6 class="fw-semibold mb-1">Nghokeng Daniel</h6>
                            <p class="fs-sm text-muted mb-0">Myths about Software Engineering</p>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center">
                          <img src="assets/img/team/cedric.jpg" class="" width="48" alt="Cédric Djomaleu">
                          <div class="ps-3">
                            <h6 class="fw-semibold mb-1">Cédric Djomaleu</h6>
                            <p class="fs-sm text-muted mb-0">The Art of Public Speaking</p>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center">
                          <img src="assets/img/team/steve.jpg" class="" width="48" alt="Steve Fasseu">
                          <div class="ps-3">
                            <h6 class="fw-semibold mb-1">Steve Fasseu</h6>
                            <p class="fs-sm text-muted mb-0">The Developers RoadMap</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border-bottom py-4">
                <div class="row py-1 py-xl-3">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="h5 mb-1">12:10 – 12:30 pm</div>
                  </div>
                  <div class="col-sm-8">
                    <h5 class="mb-0">Interlude: Sponsor ShowCase</h5>
                  </div>
                </div>
              </div>
              <div class="border-bottom py-4">
                <div class="row py-1 py-xl-3">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="h5 mb-1">12:30 – 1:15 pm</div>
                    <span class="badge bg-warning shadow-warning fs-sm">Panel</span>
                  </div>
                  <div class="col-sm-8">
                    <h5>Panel Discussion </h5>
                    <p class="mb-4">Advanced topics such as freelancing tips, portfolio-building, client management, and
                      career growth strategies.</p>
                    <div class="row row-cols-1 row-cols-md-2 g-3">
                      <div class="col">
                        <div class="d-flex align-items-center">
                          <img src="assets/img/team/derek.jpg" class="" width="48" alt="Agendia Derek">
                          <div class="ps-3">
                            <h6 class="fw-semibold mb-1">Agendia Derek</h6>
                            <p class="fs-sm text-muted mb-0">Other Career Paths</p>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center">
                          <img src="assets/img/team/collins.png" class="" width="48" alt="Colins Ngwashi">
                          <div class="ps-3">
                            <h6 class="fw-semibold mb-1">Colins Ngwashi</h6>
                            <p class="fs-sm text-muted mb-0">Personal Branding and Marketing</p>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="d-flex align-items-center">
                          <img src="assets/img/team/Samuel.jpg" class="" width="48" alt="Samuel Bakon">
                          <div class="ps-3">
                            <h6 class="fw-semibold mb-1">Samuel Bakon</h6>
                            <p class="fs-sm text-muted mb-0">AI as a tool for productivity</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="border-bottom py-4">
                <div class="row py-1 py-xl-3">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="h5 mb-1">1:25 – 2:55 pm</div>
                    <span class="badge bg-info shadow-info fs-sm">Workshop</span>
                  </div>
                  <div class="col-sm-8">
                    <h5>Workshop and Skills Demo</h5>
                    <p class="mb-4">A brief, hands-on session where attendees will engage in
                      a mini-workshop or skills demonstration.</p>
                    <div class="d-flex align-items-center">
                      <img src="assets/img/team/sandra.jpg" class="" width="48" alt="AK Sandra">
                      <div class="ps-3">
                        <h6 class="fw-semibold mb-1">AK Sandra</h6>
                        <p class="fs-sm text-muted mb-0">Modrator</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pt-4">
                <div class="row pt-1 pt-xl-3">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <div class="h5 mb-1">3:00 – 4:00 pm</div>
                  </div>
                  <div class="col-sm-8">
                    <h5 class="mb-0">Closing Remark, Networking and Photo Session</h5>
                  </div>
                </div>
              </div>
            </div>

            <!-- Day 2 schedule -->
          </div>
        </div>
      </div>
    </section>


    <!-- Testimonials slider -->
    <section class="bg-secondary py-5">
      <div class="container py-2 py-md-4 py-lg-5">
        <h2 class="h1 text-center pb-3 pb-lg-0 mb-4 mb-lg-5">What Our Attendees Say</h2>
        <div class="position-relative px-sm-5 mx-auto" style="max-width: 976px;">

          <!-- Prev button -->
          <button type="button" id="prev"
            class="btn btn-prev btn-icon btn-sm position-absolute top-50 translate-middle-y start-0 d-none d-sm-inline-flex mt-n4">
            <i class="bx bx-chevron-left"></i>
          </button>

          <!-- Next button -->
          <button type="button" id="next"
            class="btn btn-next btn-icon btn-sm position-absolute top-50 translate-middle-y end-0 d-none d-sm-inline-flex mt-n4">
            <i class="bx bx-chevron-right"></i>
          </button>

          <!-- Slider -->
          <div class="swiper swiper-nav-onhover pt-1 mx-md-2" data-swiper-options='{
              "spaceBetween": 12,
              "loop": true,
              "pagination": {
                "el": ".swiper-pagination",
                "clickable": true
              },
              "navigation": {
                "prevEl": "#prev",
                "nextEl": "#next"
              }
            }'>
            <div class="swiper-wrapper pt-4 pb-3">

              <!-- Item -->
              <div class="swiper-slide h-auto px-2">
                <figure class="card h-100 position-relative border-0 shadow-sm py-3 p-0 p-xxl-4 my-0">
                  <span
                    class="btn btn-icon btn-primary btn-lg shadow-primary pe-none position-absolute top-0 start-0 translate-middle-y ms-4 ms-xxl-5">
                    <i class="bx bxs-quote-left"></i>
                  </span>
                  <blockquote class="card-body mt-2 mb-2">
                    <p class="fs-lg mb-0">The event was spectacular! The speakers were inspiring, and the networking
                      opportunities were invaluable. Can't wait for
                      the next edition.
                      .</p>
                  </blockquote>
                  <figcaption class="card-footer d-flex align-items-center border-0 pt-0 mt-n2 mt-lg-0">
                    <div class="ps-3">
                      <h6 class="fw-semibold lh-base mb-0">Chituh Innoncentia</h6>
                      <span class="fs-sm text-muted">Student Developer</span>
                    </div>
                  </figcaption>
                </figure>
              </div>

              <!-- Item -->
              <div class="swiper-slide h-auto px-2">
                <figure class="card h-100 position-relative border-0 shadow-sm py-3 p-0 p-xxl-4 my-0">
                  <span
                    class="btn btn-icon btn-primary btn-lg shadow-primary pe-none position-absolute top-0 start-0 translate-middle-y ms-4 ms-xxl-5">
                    <i class="bx bxs-quote-left"></i>
                  </span>
                  <blockquote class="card-body mt-2 mb-2">
                    <p class="fs-lg mb-0">A great mix of knowledge, experience, and networking! Loved the sessions, and
                      the atmosphere was so inclusive and
                      engaging.</p>
                  </blockquote>
                  <figcaption class="card-footer d-flex align-items-center border-0 pt-0 mt-n2 mt-lg-0">
                    <div class="ps-3">
                      <h6 class="fw-semibold lh-base mb-0">Djeuga Kellia</h6>
                      <span class="fs-sm text-muted">Student Developer</span>
                    </div>
                  </figcaption>
                </figure>
              </div>

              <!-- Item -->
              <div class="swiper-slide h-auto px-2">
                <figure class="card h-100 position-relative border-0 shadow-sm py-3 p-0 p-xxl-4 my-0">
                  <span
                    class="btn btn-icon btn-primary btn-lg shadow-primary pe-none position-absolute top-0 start-0 translate-middle-y ms-4 ms-xxl-5">
                    <i class="bx bxs-quote-left"></i>
                  </span>
                  <blockquote class="card-body mt-2 mb-2">
                    <p class="fs-lg mb-0">This is a productive event for a start, the speakers shared lots of insights
                      and they were very open to answer my questions and even after the event, they were still open to
                      talk with me. I pray for such to happen often because we barely have events like this for
                      beginners</p>
                  </blockquote>
                  <figcaption class="card-footer d-flex align-items-center border-0 pt-0 mt-n2 mt-lg-0">
                    <div class="ps-3">
                      <h6 class="fw-semibold lh-base mb-0">Wandji Christian</h6>
                      <span class="fs-sm text-muted">Student UI/UX Designer</span>
                    </div>
                  </figcaption>
                </figure>
              </div>
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination position-relative pt-2 pt-sm-3 mt-4"></div>
          </div>
        </div>
      </div>
    </section>


    <!-- Location -->
    <section class="container py-5">
      <div class="row mt-lg-3 pt-1 pt-md-4 pt-lg-5">
        <div class="col-xl-3 col-md-4 text-center text-md-start">
          <h3 class="h4">Venue</h3>
          <h2 class="h1 mb-4">Hotel Prince De Galles, Akwa</h2>
          <div class="d-none d-md-block text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="118" height="118" fill="none">
              <g clip-path="url(#A)">
                <path
                  d="M116.912 76.527c-4.963-3.081-9.413-6.675-13.52-10.782-1.37-1.369-3.766-.343-3.766 1.54 0 1.54-.171 3.081-.171 4.621-14.89 2.739-29.78 3.936-45.013 4.108-12.836.342-30.123 1.712-41.761-4.45-8.9-4.792-10.269-15.917-6.504-24.475 1.54-3.594 4.279-6.504 7.702-8.557 3.936-2.396 7.873-1.027 11.981-2.054.513-.171.685-.856.342-1.369-6.333-6.675-17.457 1.027-21.565 6.504-5.819 7.702-6.161 18.998-1.027 27.042 7.531 11.981 25.501 11.125 37.653 11.467 19.169.685 39.365.171 58.192-4.108 0 1.712.171 3.252.685 4.963 0 .342.171.513.342.685-1.369 1.198-.171 4.279 2.225 3.765 4.963-1.027 9.927-2.568 14.548-4.792 1.198-1.026.856-3.251-.343-4.107zm-13.178-4.45c2.396 2.054 4.792 4.108 7.531 5.99-2.396 1.027-4.964 1.712-7.531 2.396v-.685c-.514-2.567-.342-5.135 0-7.702z"
                  fill="currentColor" />
              </g>
              <defs>
                <clipPath id="A">
                  <path fill="#fff" d="M0 0h118v118H0z" />
                </clipPath>
              </defs>
            </svg>
          </div>
        </div>
        <div class="col-xl-9 col-md-8">
          <img src="assets/img/landing/conference/prince.WEBP" class="rounded-3" width="952" alt="Venue">
        </div>
      </div>
      <div class="row mb-lg-3 pb-1 pb-md-4 pb-lg-5 mt-4 mt-sm-n5">
        <div class="col-lg-4 col-md-5 offset-md-6 offset-lg-7 mt-md-n5">
          <div class="gallery mt-md-n4 mx-auto" style="max-width: 416px;">
            <a href="https://maps.app.goo.gl/2WUkYwLC9CCw2fix6?g_st=ic" data-iframe="true"
              class="gallery-item rounded-2" data-sub-html='<h6 class="fs-sm text-light">Hotel Prince De Galles</h6>'>
              <img src="assets/img/landing/conference/map-light.jpg" class="d-dark-mode-none" alt="Map preview">
              <img src="assets/img/landing/conference/map-dark.jpg" class="d-none d-dark-mode-block" alt="Map preview">
              <div class="gallery-item-caption fs-sm fw-medium">Hotel Prince De Galles</div>
            </a>
          </div>
        </div>
      </div>
    </section>


    <!-- Buy ticket CTA -->
    <section class="bg-gradient-primary py-5">
      <div class="container py-2 py-md-4 py-lg-5">
        <div class="row py-xl-3">
          <div class="col-xl-4 col-lg-5 offset-xl-1 order-lg-2 mb-4">
            <h2 class="h1 text-light text-center text-sm-start pb-4 mb-0 mb-lg-3">Craft your Tech Career!</h2>
            <div class="d-flex align-items-center">
              <div class="bg-white rounded-circle text-primary flex-shrink-0 p-3">
                <svg style="margin: 2px;" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M18.0225 2.91133C17.2397 2.91133 16.5038 3.21602 15.9507 3.76914C15.3132 4.40664 14.9616 5.25508 14.9616 6.15977V8.98633C14.9616 12.516 13.0772 15.6098 10.26 17.3207H14.2585C18.0225 17.3207 21.0882 14.2598 21.0882 10.491V5.97227C21.0882 4.28945 19.71 2.91133 18.0225 2.91133ZM18.7772 5.97695C18.3882 5.97695 18.0741 5.66289 18.0741 5.27383C18.0741 4.88477 18.3882 4.5707 18.7772 4.5707C19.1663 4.5707 19.4804 4.88477 19.4804 5.27383C19.4804 5.66289 19.1663 5.97695 18.7772 5.97695ZM23.7929 1.71133C23.5163 1.43477 23.071 1.43477 22.7991 1.71133L21.4257 3.08477C20.6054 2.11914 19.3819 1.50977 18.0225 1.50977C16.8647 1.50977 15.7772 1.95977 14.9569 2.78008L0.20535 17.527C0.00378752 17.7285 -0.05715 18.0285 0.0506625 18.291C0.158475 18.5535 0.416288 18.727 0.702225 18.727H5.22097H9.4491L11.8069 21.0848H11.2444C10.8553 21.0848 10.5413 21.3988 10.5413 21.7879C10.5413 22.177 10.8553 22.491 11.2444 22.491H15.7632C16.1522 22.491 16.4663 22.177 16.4663 21.7879C16.4663 21.3988 16.1522 21.0848 15.7632 21.0848H13.7944L11.4366 18.727H14.2585C18.8007 18.727 22.4944 15.0332 22.4944 10.491V5.97227C22.4944 5.39102 22.3819 4.8332 22.1757 4.31758L23.7929 2.70039C24.0694 2.4332 24.0694 1.98789 23.7929 1.71133ZM2.3991 17.3207L13.5554 6.16445V8.98633C13.5554 13.5801 9.81472 17.3207 5.22097 17.3207H2.3991ZM21.0882 10.4957C21.0882 14.2598 18.0272 17.3254 14.2585 17.3254H10.26C13.0772 15.6145 14.9616 12.516 14.9616 8.98633V6.15977C14.9616 5.25508 15.3132 4.40664 15.9507 3.76914C16.5038 3.21602 17.2397 2.91133 18.0225 2.91133C19.71 2.91133 21.0882 4.28477 21.0882 5.97695V10.4957Z"
                    fill="currentColor" />
                </svg>
              </div>
              <p class="fs-xl text-light ps-3 mb-0">Hurry up! Early birds extended until November 23rd, 2024.</p>
            </div>
          </div>
          <div class="col-xl-6 col-lg-7 order-lg-1">

            <!-- Ticket card -->
            <div class="ignore-dark-mode position-relative">
              <div class="position-relative overflow-hidden rounded-3 zindex-5 py-5 px-4 p-sm-5">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-repeat-0 bg-position-center-start zindex-2"
                  style="background-image: url(assets/img/landing/conference/price-card-left-bg.png);"></span>
                <span class="position-absolute top-0 end-0 w-100 h-100 bg-repeat-0 bg-position-center-end zindex-2"
                  style="background-image: url(assets/img/landing/conference/price-card-right-bg.png);"></span>
                <div class="px-md-4 position-relative zindex-5">
                  <div class="d-sm-flex align-items-start justify-content-between">
                    <div class="text-center text-sm-start me-sm-4">
                      <div class="lead text-primary fw-semibold text-uppercase mb-2">Nov 23</div>
                      <h3 class="h1">CodeConnect Conference</h3>
                    </div>
                    <div class="d-table bg-white rounded-3 p-4 flex-shrink-0 mx-auto mx-sm-0">
                      <img src="assets/img/landing/conference/bit.ly_m_codinghq.png" width="142" alt="QR Code">
                    </div>
                  </div>
                  <div class="d-flex flex-column flex-sm-row align-items-center pt-4 mt-2">
                    <a href="https://bit.ly/codeconnect2"
                      class="btn btn-primary shadow-primary btn-lg mb-3 mb-sm-0 me-sm-3">Register Now</a>
                    <div class="d-flex align-items-center">
                      <span class="h4 text-body mb-0">FOR FREE</span>
                    </div>
                  </div>
                </div>
              </div>
              <span class="position-absolute bg-dark opacity-35 bottom-0 mb-n2 d-dark-mode-none"
                style="left: 1.5rem; width: calc(100% - 3rem); height: 5rem; filter: blur(.75rem);"></span>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


  <!-- Footer -->
  <footer class="footer dark-mode bg-dark pt-5 pb-4 pb-lg-5">
    <div class="container text-center pt-lg-3">
      <div class="navbar-brand justify-content-center text-dark mb-2 mb-lg-4">
        <span class="fs-4">CodeConnect</span>
      </div>
      <ul class="nav justify-content-center pt-3 pb-4 pb-lg-5">
        <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="#speakers" class="nav-link">Speakers</a></li>
        <li class="nav-item"><a href="#schedule" class="nav-link">Schedule</a></li>
        <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
        <li class="nav-item"><a href="#sponsors" class="nav-link">Sponsors</a></li>
        <li class="nav-item"><a href="feedback.php" class="nav-link">FeedBack</a></li>
        <li class="nav-item"><a href="powerpoint.html" class="nav-link">Presentions</a></li>
      </ul>
      <div class="d-flex flex-column flex-sm-row justify-content-center">
        <a href="https://bit.ly/codeconnect2" class="btn btn-primary shadow-primary btn-lg me-sm-4 mb-3">Register Now
        </a>
        <a target="_blank"
          href="https://www.google.com/calendar/render?action=TEMPLATE&text=CodeConnect&dates=20241123T090000Z/20241123T160000Z&details=Beyond the code&location=Hotel Prince De Galles"
          class="btn btn-outline-light btn-lg mb-3">
          <i class="bx bx-calendar-check fs-xl me-2 ms-n1"></i>
          Add to calendar
        </a>
      </div>
      <!-- <div class="d-flex justify-content-center pt-4 mt-lg-3">
        <a href="#" class="btn btn-icon btn-secondary btn-facebook mx-2">
          <i class="bx bxl-facebook"></i>
        </a>
        <a href="#" class="btn btn-icon btn-secondary btn-instagram mx-2">
          <i class="bx bxl-instagram"></i>
        </a>
        <a href="#" class="btn btn-icon btn-secondary btn-twitter mx-2">
          <i class="bx bxl-twitter"></i>
        </a>
       <a href="#" class="btn btn-icon btn-secondary btn-youtube mx-2">
          <i class="bx bxl-youtube"></i>
        </a>
      </div> -->
      <p class="nav d-block fs-sm text-center pt-5 mt-lg-4 mb-0">
        <span class="text-light opacity-50">&copy; All rights reserved. Made by </span>
        <a class="nav-link d-inline-block p-0" href="https://coding-hq.com/" target="_blank" rel="noopener">CodingHQ</a>
      </p>
    </div>
  </footer>


  <!-- Back to top button -->
  <a href="#top" class="btn-scroll-top" data-scroll>
    <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span>
    <i class="btn-scroll-top-icon bx bx-chevron-up"></i>
  </a>


  <!-- Vendor Scripts -->
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/lightgallery/lightgallery.min.js"></script>
  <script src="assets/vendor/lightgallery/plugins/fullscreen/lg-fullscreen.min.js"></script>
  <script src="assets/vendor/lightgallery/plugins/zoom/lg-zoom.min.js"></script>
  <script src="assets/vendor/lightgallery/plugins/video/lg-video.min.js"></script>

  <!-- Main Theme Script -->
  <script src="assets/js/theme.min.js"></script>
</body>

</html>