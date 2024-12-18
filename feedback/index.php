<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>CodeConnect by CodingHQ | FeedBack</title>

  <!-- SEO Meta Tags -->
  <meta name="description" content="CodeConnect is an annual tech conference that serves as a platform to inspire,
  educate, and connect both aspiring and successful software engineers">
  <meta name="keywords"
    content="codeconnect2, codinghq, tech conference, Douala, douala conference, tech submit in douala">
  <meta name="author" content="CodingHQ">

  <!-- Viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon and Touch Icons -->
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/codingHQ_small.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/codingHQ_small.png">
  <link rel="manifest" href="../assets/favicon/site.webmanifest">
  <link rel="mask-icon" href="../assets/favicon/safari-pinned-tab.svg" color="#6366f1">
  <link rel="shortcut icon" href="../assets/favicon/codingHQ_small.png">
  <meta name="msapplication-TileColor" content="#080032">
  <meta name="msapplication-config" content="../assets/favicon/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">

  <!-- Vendor Styles -->
  <link rel="stylesheet" media="screen" href="../assets/vendor/boxicons/css/boxicons.min.css" />
  <link rel="stylesheet" media="screen" href="../assets/vendor/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" media="screen" href="../assets/vendor/lightgallery/css/lightgallery-bundle.min.css" />

  <!-- Main Theme Styles + Bootstrap -->
  <link rel="stylesheet" media="screen" href="../assets/css/theme.min.css">

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
    (function() {
      window.onload = function() {
        const preloader = document.querySelector('.page-loading');
        preloader.classList.remove('active');
        setTimeout(function() {
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
      <div class="page-spinner"></div><span>Let's Hear from you</span>
    </div>
  </div>


  <!-- Page wrapper for sticky footer -->
  <!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
  <main class="page-wrapper">


    <!-- Navbar -->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page -->
    <header class="header navbar navbar-expand-lg bg-light shadow-sm fixed-top">
      <div class="container px-3">
        <a href="../" class="navbar-brand pe-3">
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
                        <a href="../feedback" class="nav-link">FeedBack</a>
                    </li>
                    <li class="nav-item">
                        <a href="../presentation" class="nav-link">Presentations</a>
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


    <!-- Links + Contact form -->
    <section class="position-relative bg-secondary pt-5">
      <div class="container position-relative zindex-2 pt-5">

        <!-- Breadcrumb -->
        <nav class="pt-lg-4 pb-3 mb-2 mb-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="../"><i class="bx bx-home-alt fs-lg me-1"></i>Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">FeedBack</li>
          </ol>
        </nav>

        <div class="row">

          <!-- Contact links -->
          <div class="col-xl-4 col-lg-5 pb-4 pb-sm-5 mb-2 mb-sm-0">
            <div class="pe-lg-4 pe-xl-0">
              <h1 class="pb-3 pb-md-4 mb-lg-5">FeedBack</h1>
              <div class="d-flex align-items-start pb-3 mb-sm-1 mb-md-3">
                <div class="ps-3 ps-sm-4">
                  <h2 class="h4 pb-1 mb-2">Tell us</h2>
                  <p class="mb-2">Your feedback is essential in helping us improve and create even better experiences
                    for future events. Whether it is your favourite session, seggestions for improvement, or any
                    thoughts you will like share, we are all ears!</p>
                  <div class="btn btn-link btn-lg px-0">
                    Leave a message
                    <i class="bx bx-right-arrow-alt lead ms-2"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Contact form -->
          <div class="col-xl-6 col-lg-7 offset-xl-2">
            <div class="card border-light shadow-lg py-3 p-sm-4 p-md-5">
              <div class="bg-dark position-absolute top-0 start-0 w-100 h-100 rounded-3 d-none d-dark-mode-block"></div>
              <div class="card-body position-relative zindex-2">
                <h2 class="card-title pb-3 mb-4">Let us know what you think</h2>
                <form method="post" action="" class="row g-4 needs-validation" novalidate>
                  <div class="col-12">
                    <label for="fn" class="form-label fs-base">Full name</label>
                    <input type="text" class="form-control form-control-lg" id="fn" name="fullname" required>
                    <div class="invalid-feedback">Please enter your full name!</div>
                  </div>
                  <div class="col-12">
                    <label for="email" class="form-label fs-base">Email address</label>
                    <input type="email" class="form-control form-control-lg" id="email" name="email" required>
                    <div class="invalid-feedback">Please provid a valid email address!</div>
                  </div>
                  <div class="col-12">
                    <label for="email" class="form-label fs-base">Phone Number</label>
                    <input type="number" class="form-control form-control-lg" id="email" name="phonenumber" required>
                    <div class="invalid-feedback">Please provid a valid Phone Number!</div>
                  </div>
                  <div class="col-12">
                    <label for="email" class="form-label fs-base">FeedBack</label>
                    <textarea name="feedback" id="" class="form-control form-control-lg" cols="20" rows="5"
                      required></textarea>
                  </div>
                  <div class="col-12 pt-2 pt-sm-3">
                    <button type="submit" class="btn btn-lg btn-primary w-100 w-sm-auto">Send</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="position-absolute bottom-0 start-0 w-100 bg-light" style="height: 8rem;"></div>
    </section>


    <!-- Branches -->
    <section class="container py-2 py-lg-4 py-xl-5 mb-2 mb-md-3">
      <div class="row py-5">
        <div class="offset-lg-1">
          <ul class="list-unstyled pb-2 pb-lg-0 mb-4 mb-lg-5">
            <li class="d-flex pb-1 mb-2">
              <i class="bx bx-map text-primary fs-xl me-2" style="margin-top: .125rem;"></i>
              Bonaberi, Douala, Cameroon
            </li>
            <li class="d-flex pb-1 mb-2">
              <i class="bx bx-phone-call text-primary fs-xl me-2" style="margin-top: .125rem;"></i>
              (+237) 681-901-252 | 697-972-357
            </li>
            <li class="d-flex">
              <i class="bx bx-envelope text-primary fs-xl me-2" style="margin-top: .125rem;"></i>
              <div>
                <strong class="text-nav">contact@coding-hq.com
                  <br>
              </div>
            </li>
          </ul>
          <div class="d-flex pt-1 pt-md-3 pt-xl-4">
            <a href="www.facebook.com/codinghq" class="btn btn-icon btn-secondary btn-facebook me-3">
              <i class="bx bxl-facebook"></i>
            </a>
            <a href="www.x.com/codinghq" class="btn btn-icon btn-secondary btn-twitter me-3">
              <i class="bx bxl-twitter"></i>
            </a>
            <a href="www.linkedin.com/codinghq" class="btn btn-icon btn-secondary btn-youtube">
              <i class="bx bxl-youtube"></i>
            </a>
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
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
  <script src="../assets/vendor/cleave.js/dist/cleave.min.js"></script>

  <!-- Main Theme Script -->
  <script src="../assets/js/theme.min.js"></script>
</body>

</html>



<?php
$conn = new mysqli('localhost', 'fast5003_codinghq', 'CodingHQ@2024', 'fast5003_codeconnect');

if ($conn->error) {
  # code...
  echo "db connect failed" . $conn->error;
}

// insert into db
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  # code...
  $fullname = $conn->real_escape_string($_POST['fullname']);
  $email = $conn->real_escape_string($_POST['email']);
  $phonenumber = $conn->real_escape_string($_POST['phonenumber']);
  $feedback = $conn->real_escape_string($_POST['feedback']);

  $stmt = $conn->prepare("INSERT INTO feedback (fullname, email, phonenumber, feedback) VALUES (?, ?, ?, ?)");
  $stmt->bind_param('ssss', $fullname, $email, $phonenumber, $feedback);
  $stmt->execute();
  $stmt->close();
  echo "<script>alert('Your feedback was successfully recorded. Thank you');</script>";
}
?>