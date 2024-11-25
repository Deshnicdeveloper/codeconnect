<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>CodeConnect by CodingHQ | Presentation</title>

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
      <div class="page-spinner"></div><span>Loading...</span>
    </div>
  </div>


  <!-- Page wrapper for sticky footer -->
  <!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
  <main class="page-wrapper">


    <!-- Navbar -->
    <!-- Remove "fixed-top" class to make navigation bar scrollable with the page -->
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


    <!-- Breadcrumb -->
    <nav class="container mt-lg-4 pt-5" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0 pt-5">
        <li class="breadcrumb-item">
          <a href="../"><i class="bx bx-home-alt fs-lg me-1"></i>Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Powerpoints</li>
      </ol>
    </nav>


    <!-- Page content -->
    <section class="container mt-4 mb-lg-5 pt-lg-2 pb-5">

      <!-- Page title + Layout switcher + Search form -->
      <div class="row align-items-end gy-3 mb-4 pb-lg-3 pb-1">
        <div class="col-lg-8 col-md-8">
          <h1 class="mb-2 mb-md-0">Download the powerpoints here</h1>
        </div>
      </div>

      <!-- Item Yanick -->
      <article class="card border-0 shadow-sm overflow-hidden mb-4">
        <div class="row g-0">
          <div class="col-sm-4 position-relative bg-position-center bg-repeat-0 bg-size-cover"
            style="background-image: url(../assets/img/blog/Yanick.jpg); min-height: 15rem;">
            <p
              class="btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3"
              data-bs-toggle="tooltip" data-bs-placement="left" title="Read later">
              <i class="bx bx-bookmark"></i>
            </p>
          </div>
          <div class="col-sm-8">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <span class="badge fs-sm text-nav bg-secondary text-decoration-none">Keynote</span>
                <span class="fs-sm text-muted border-start ps-3 ms-3">Nov 23, 2024</span>
              </div>
              <h3 class="h4">
                The Future of Tech Careers
              </h3>
              <p>Yanick Nde Shared with us some inspiring thoughts and directions where the tech space is leading it. He
                also refreshed our memories on the history of the tech landscape. Click the download button to see his
                presentation</p>
              <hr class="my-4">
              <div style="color: #6366f1;" class="d-flex align-items-center justify-content-between">
                <a target="_blank" href="https://code-connect-2024.netlify.app/"
                  class="d-flex align-items-center fw-bold text-dark text-decoration-none me-3">
                  View Presentation
                </a>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- Item Steve -->
      <article class="card border-0 shadow-sm overflow-hidden mb-4">
        <div class="row g-0">
          <div class="col-sm-4 position-relative bg-position-center bg-repeat-0 bg-size-cover"
            style="background-image: url(../assets/img/blog/steve.jpg); min-height: 15rem;">
            <p
              class="btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3"
              data-bs-toggle="tooltip" data-bs-placement="left" title="Read later">
              <i class="bx bx-bookmark"></i>
            </p>
          </div>
          <div class="col-sm-8">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <span class="badge fs-sm text-nav bg-secondary text-decoration-none">Panel</span>
                <span class="fs-sm text-muted border-start ps-3 ms-3">Nov 23, 2024</span>
              </div>
              <h3 class="h4">
                The Developers RoadMap
              </h3>
              <p>Steve a partagé avec nous la roadmap et les différentes étapes que nous pouvons suivre pour passer d'un
                niveau de
                développeur au niveau suivant. Cliquez sur le lien pour télécharger sa présentation</p>
              <hr class="my-4">
              <div class="d-flex align-items-center justify-content-between">
                <a href="../assets/presentations/The-Developers-RoadMap.pdf" download="The-Developers-RoadMap.pdf"
                  class="d-flex align-items-center fw-bold text-dark text-decoration-none me-3">

                  Téléchargez la présentation ici !
                </a>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- Item Samuel -->
      <article class="card border-0 shadow-sm overflow-hidden mb-4">
        <div class="row g-0">
          <div class="col-sm-4 position-relative bg-position-center bg-repeat-0 bg-size-cover"
            style="background-image: url(../assets/img/blog/samuel.jpg); min-height: 15rem;">
            <p
              class="btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3"
              data-bs-toggle="tooltip" data-bs-placement="left" title="Read later">
              <i class="bx bx-bookmark"></i>
            </p>
          </div>
          <div class="col-sm-8">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <span class="badge fs-sm text-nav bg-secondary text-decoration-none">L'IA</span>
                <span class="fs-sm text-muted border-start ps-3 ms-3">Nov 23, 2024</span>
              </div>
              <h3 class="h4">
                AI as a tool for productivity
              </h3>
              <p>Samuel nous a montré comment profiter de l'IA pour être plus productif et comment utiliser les outils
                d'IA à bon escient
                en donnant les bonnes instructions. Cliquez ci-dessous pour télécharger sa présentation</p>
              <hr class="my-4">
              <div class="d-flex align-items-center justify-content-between">
                <a href="#" class="d-flex align-items-center fw-bold text-dark text-decoration-none me-3">
                  Cliquez ici pour télécharger sa présentation
                </a>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- Item Merime -->
      <article class="card border-0 shadow-sm overflow-hidden mb-4">
        <div class="row g-0">
          <div class="col-sm-4 position-relative bg-position-center bg-repeat-0 bg-size-cover"
            style="background-image: url(../assets/img/blog/merime.jpg); min-height: 15rem;">
            <p
              class="btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3"
              data-bs-toggle="tooltip" data-bs-placement="left" title="Read later">
              <i class="bx bx-bookmark"></i>
            </p>
          </div>
          <div class="col-sm-8">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <span class="badge fs-sm text-nav bg-secondary text-decoration-none">Legal Aspects</span>
                <span class="fs-sm text-muted border-start ps-3 ms-3">Nov 23, 2024</span>
              </div>
              <h3 class="h4">
                Legal Essentials for Developers
              </h3>
              <p>Merime Showed us how being consious when entering into contracts is very important. click below to
                download his presentation to know more and see the laws that governs the tech space in Cameroon</p>
              <hr class="my-4">
              <div class="d-flex align-items-center justify-content-between">
                <a href="../assets/presentations/Legal-Essentials-for-Developers.pdf" download="Legal-Essentials-for-Developers.pdf" class="d-flex align-items-center fw-bold text-dark text-decoration-none me-3">
                  Download presentation Here!
                </a>
              </div>
            </div>
          </div>
        </div>
      </article>

      <!-- Item David-->
      <article class="card border-0 shadow-sm overflow-hidden mb-4">
        <div class="row g-0">
          <div class="col-sm-4 position-relative bg-position-center bg-repeat-0 bg-size-cover"
            style="background-image: url(../assets/img/blog/david.jpg); min-height: 15rem;">
            <p
              class="btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3"
              data-bs-toggle="tooltip" data-bs-placement="left" title="Read later">
              <i class="bx bx-bookmark"></i>
            </p>
          </div>
          <div class="col-sm-8">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <span class="badge fs-sm text-nav bg-secondary text-decoration-none">Telegram Bot</span>
                <span class="fs-sm text-muted border-start ps-3 ms-3">Nov 23, 2024</span>
              </div>
              <h3 class="h4">
                Creating a Telegram Bot with the Help of LangFlow
              </h3>
              <p>LangFlow est une bibliothèque opensource qui permet de construire des flux de conversation intelligents
                pour les
                chatbots et les assistants virtuels. Il offre des fonctionnalités telles que la gestion des intentions,
                des entités et
                des actions pour faciliter le traitement et la génération de réponses cohérentes. Grâce à LangFlow, il
                est possible de
                créer des conversations fluides et interactives avec les utilisateurs du bot Telegram.</p>
              <a href="https://t.me/CodinHQ_BOT">Cliquez ici pour utiliser et voir comment fonctionne le bot</a>
              <hr class="my-4">
              <div class="d-flex align-items-center justify-content-between">
                <a href="../assets/presentations/Creating-a-Telegram-Bot-with-the-Help-of-LangFlow.pdf" download="Creating-a-Telegram-Bot-with-the-Help-of-LangFlow.pdf" class="d-flex align-items-center fw-bold text-dark text-decoration-none me-3">
                  Cliquez ici pour télécharger sa présentation
                </a>
              </div>
            </div>
          </div>
        </div>
      </article>
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

  <!-- Main Theme Script -->
  <script src="../assets/js/theme.min.js"></script>
</body>

</html>