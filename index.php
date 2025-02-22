<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>HMS Home page</title>
</head>
<link href="./css/style.css" rel="stylesheet">
<link href="./css/master.css" rel="stylesheet">
<link href="./css/framework.css" rel="stylesheet">
<!-- <link href="../Bootstrap/all.min.css" rel="stylesheet">
  <link href=" ../Bootstrap/bootstrap.min.css" rel="stylesheet"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
  integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect " href="https://fonts.googelapis.com">
<link rel="preconnect" href="https://font.gstatic.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&family=Open+Sans:wght@400;600;700&family=Roboto:wght@100;300;500&display=swap"
  rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<body>

  <nav class=" navbar navbar-expand sticky-top ">
    <div class="container ">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main" aria-controls="main"
        aria-expanded="false" aria-label="Toggle navigation" style="color: white;
    font-size: 25px;
  border-color: white;">
        <i class="fa-solid fa-bars "></i>
      </button>
      <div class="  mr-auto collapse navbar-collapse " id="main">
        <ul class=" navbar-nav ms-auto">
          <?php
if(!isset($_SESSION['admin'])&&!isset($_SESSION['doctor'])&&!isset($_SESSION['patient']))
      {
  echo'
        <li class="nav-item nav-tabs mx-3"><a href="index.php" class="nav-link text-black">Home</a></li>
        <li class="nav-item nav-tabs mx-3"><a href="./Login/login.php" class="nav-link text-black">Login</a></li>
      '; 
      }

  ?>

        </ul>
      </div>
    </div>
  </nav>

  <section id="banner">

    <!--Slider -->
    <div id="main-slider" class="flexslider">
      <ul class="slides">
        <li>
          <img src="img/slides/2.jpg" alt="" />
          <div class="flex-caption container">
            <h3>Welcome to Hms Site Caring Health</h3>
            <p>we are employing for doctors Manage their appointment</p>
            <a class="col-md-12 " href="./Login/apply.php"><button style="font-size:30px;padding:10px;"
                class="btn btn-dark fw-bolder shadow  rounded-pill px-3">Join Us Now</button></a>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <div class="col-md-12 " style="background-image: url(img/hero-bg.jpg); height:100vh; display: grid;
  text-align:center;">
    <div class="row align-items-center">
      <div class="col-md-6 ">
        <h1< /h1>
          <h5 class="fw-bolder" style="font-size:45px;">we are employing for doctors Manage their appointment</h5>
          <a class="col-md-12 m-5" href="apply.php"><button style="font-size:30px;padding:10px;"
              class="btn navigation fw-bolder shadow my-5 rounded-pill px-3">Join Us Now</button></a>
      </div>

    </div>
  </div>

  <section id="services">


    <div class="container ">
      <div class="row">
        <div class="features mt-5">
          <div class="col-md-4 col-sm-6 wow fadeInUp animated" data-wow-duration="300ms" data-wow-delay="0ms">
            <div class="media service-box">
              <div class="pull-left">
                <img src="img/1.png" alt="" />
              </div>
              <div class="media-body">
                <h4 class="media-heading">Child Care</h4>
                <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that
                  fosters
                  greater</p>
              </div>
            </div>
          </div>
          <!--/.col-md-4-->

          <div class="col-md-4 col-sm-6 wow fadeInUp animated" data-wow-duration="300ms" data-wow-delay="100ms">
            <div class="media service-box">
              <div class="pull-left">
                <img src="img/2.png" alt="" />
              </div>
              <div class="media-body">
                <h4 class="media-heading">Women Care</h4>
                <p>Backed by some of the biggest names in the industry, Firefox OS is an open platform that
                  fosters
                  greater</p>
              </div>
            </div>
          </div>
          <!--/.col-md-4-->

          <div class="col-md-4 col-sm-6 wow fadeInUp animated" data-wow-duration="300ms" data-wow-delay="200ms">
            <div class="media service-box">
              <div class="pull-left">
                <img src="img/3.png" alt="" />
              </div>
              <div class="media-body">
                <h4 class="media-heading">Family</h4>
                <p>Morbi vitae tortor tempus, placerat leo et, suscipit lectus. Phasellus ut euismod massa, eu
                  eleifend
                  ipsum.</p>
              </div>
            </div>
          </div>
          <!--/.col-md-4-->

          <div class="col-md-4 col-sm-6 wow fadeInUp animated" data-wow-duration="300ms" data-wow-delay="300ms">
            <div class="media service-box">
              <div class="pull-left">
                <img src="img/4.png" alt="" />
              </div>
              <div class="media-body">
                <h4 class="media-heading">Heart</h4>
                <p>Morbi vitae tortor tempus, placerat leo et, suscipit lectus. Phasellus ut euismod massa, eu
                  eleifend
                  ipsum.</p>
              </div>
            </div>
          </div>
          <!--/.col-md-4-->

          <div class="col-md-4 col-sm-6 wow fadeInUp animated" data-wow-duration="300ms" data-wow-delay="400ms">
            <div class="media service-box">
              <div class="pull-left">
                <img src="img/5.png" alt="" />
              </div>
              <div class="media-body">
                <h4 class="media-heading">Eye Care</h4>
                <p>Morbi vitae tortor tempus, placerat leo et, suscipit lectus. Phasellus ut euismod massa, eu
                  eleifend
                  ipsum.</p>
              </div>
            </div>
          </div>
          <!--/.col-md-4-->

          <div class="col-md-4 col-sm-6 wow fadeInUp animated" data-wow-duration="300ms" data-wow-delay="500ms">
            <div class="media service-box">
              <div class="pull-left">
                <img src="img/7.png" alt="" />
              </div>
              <div class="media-body">
                <h4 class="media-heading">Testing</h4>
                <p>Morbi vitae tortor tempus, placerat leo et, suscipit lectus. Phasellus ut euismod massa, eu
                  eleifend
                  ipsum.</p>
              </div>
            </div>
          </div>
          <!--/.col-md-4-->
        </div>
      </div>


    </div>

  </section>
  <section class="aboutUs">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aligncenter">
            <h2 class="aligncenter">Hey You Register Now</h2>
          </div>
          <br />
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <img src="img/img1.png" alt="">
          <div class="space"></div>
        </div>
        <div class="col-md-6">
          <h4 class="fw-bolder text-center text-white pd-4">Create Account so that we can take good
            care
            of you
          </h4>
          <ul class="list-unstyled">
            <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Child Care</li>
            <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Women Care</li>
            <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Family</li>
            <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Heart</li>
            <li><i class="fa fa-arrow-circle-right pr-10 colored"></i> Eye Care</li>
          </ul>
          <h1 class="fw-bolder text-center"><a class="col-md-12 m-5 text-center text-white"
              href="./Login/account.php"><button style="font-size:30px;padding:10px;"
                class="btn btn-dark fw-bolder shadow my-5 rounded-pill px-3 text-white">Register Now</button></a>
          </h1>
        </div>
      </div>

    </div>
  </section>



  <!-- <div class="row align-items-center ">
    <div class="col-md-6 p-5 border border-primary "
      style="background: linear-gradient(45deg, #103ce7, #64e9ff);background-size:100;">
      <h1 class="fw-bolder text-center text-white">Hey You Register Now</h1>
      <h5 class="fw-bolder text-center text-white" style="font-size:45px;">Create Account so that we can take good
        care
        of you
      </h5>
      <h1 class="fw-bolder text-center"><a class="col-md-12 m-5 text-center text-white" href="account.php"><button
            style="font-size:30px;padding:10px;"
            class="btn appointment fw-bolder shadow my-5 rounded-pill px-3 text-white">Register Now</button></a>
      </h1>
    </div>
    <div class="col-md-6">
      <img src="img/slide-1.jpg" class=" w-100 h-100 ">
    </div>
  </div> -->










  <!-- </div> -->

  <!-- <script src="/Bootstrap/all.min.js"></script>
  <script src="/Bootstrap/bootstrap.bundle.min.js"></script> -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.fancybox.pack.js"></script>
  <script src="js/jquery.fancybox-media.js"></script>
  <script src="js/portfolio/jquery.quicksand.js"></script>
  <script src="js/portfolio/setting.js"></script>
  <script src="js/jquery.flexslider.js"></script>
  <script src="js/animate.js"></script>
  <script src="js/custom.js"></script>
  <?php include("./include/footer.php");?>
</body>

</html>