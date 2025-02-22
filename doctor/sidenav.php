<?php
// تعطيل عرض الأخطاء على الشاشة
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL); // تسجيل جميع الأخطاء
ini_set('log_errors', 1); // تمكين تسجيل الأخطاء
ini_set('error_log', '/path/to/error_log'); // تحديد ملف سجل الأخطاء
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Dashborad </title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/master.css" rel="stylesheet">
  <link href="../css/framework.css" rel="stylesheet">
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
</head>

<body class="fw-bold">
  <div class="page d-flex">
    <div class="sidebar bg-white p-20 p-relative">
      <h3 class="p-relative txt-c mt-0"><a href="index.php"><img src="img/Logo.jpeg" class="mx-0"
            style="border-radius:50%; height:80px;width:80px;"></a></h3>
      <ul>
        <li>
          <a class=" d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="index.php">
            <i class="fa-regular icon-bar-chart fa-fw"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="profile.php">
            <i class="fa-regular  fa-address-card fa-fw"></i>
            <span>Profile</span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="patient.php">
            <i class="fa-regular fa-circle-user fa-fw"></i>
            <span>Patient</span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="appointment.php">
            <i class="fa-regular icon-calendar fa-fw"></i>
            <span>Appoinments</span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="report.php">
            <i class="fa fa-book-open fa-fw"></i>
            <span>Reports</span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="income.php">
            <i class="fa-regular icon-credit-card fa-fw"></i>
            <span>Income</span>
          </a>
        </li>

      </ul>
    </div>
    <div class="content w-full">
      <!-- Start Head -->
      <div class="head bg-white p-15 between-flex">

        <div class="icons d-flex align-center">
          <header>

            <nav class=" navbar navbar-expand sticky-top ">
              <div class="container ">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main"
                  aria-controls="main" aria-expanded="false" aria-label="Toggle navigation" style="color: white;
    font-size: 25px;
  border-color: white;">
                  <i class="fa-solid fa-bars "></i>
                </button>
                <div class="  mr-auto collapse navbar-collapse " id="main">
                  <ul class=" navbar-nav ms-auto">
                    <?php
        if(isset($_SESSION['admin'])){
            $user1 = $_SESSION['admin'];
          echo'<li class="nav-item nav-tabs mx-3"><a href="#" class="nav-link text-black ">' . $user1 . '</a></li>
              <li class="nav-item nav-tabs mx-3"><a href="logout.php" class="nav-link text-black"><i class="icon-signout mx-1"></i><span>Logout</span></a></li>';
        }
        elseif(isset($_SESSION['doctor'])){
            $user2 = $_SESSION['doctor'];
          echo'<li class="nav-item nav-tabs mx-3"><a href="#" class="nav-link text-black">' . $user2 . '</a></li>
              <li class="nav-item nav-tabs mx-3"><a href="logout.php" class="nav-link text-black"><i class="icon-signout mx-1"></i><span>Logout</span></a></li>';
        }
        elseif(isset($_SESSION['patient'])){
          $user3 = $_SESSION['patient'];
          echo'<li class="nav-item nav-tabs mx-3"><a href="#" class="nav-link text-black">' . $user3 . '</a></li>
              <li class="nav-item nav-tabs mx-3"><a href="logout.php" class="nav-link text-black"><i class="icon-signout mx-1"></i><span>Logout</span></a></li>';
        }
        else {
          echo'
        <li class="nav-item nav-tabs mx-3 fw-bold"><a href="index.php" class="nav-link text-black">Home</a></li>
      <li class="nav-item nav-tabs mx-3 fw-bold"><a href="login.php" class="nav-link text-black">Login
      
</a></li>'; 
  }
  ?>

                  </ul>

                </div>

              </div>

            </nav>


          </header>
        </div>
      </div>



      <!--SideBar-->
      <!-- <div class="list-group sidebar" style="height:270vh;">
    <a href="index.php" class="list-group-item fst-italic list-group-item-action sidebar text-center text-white">
      Dashborad<i class=" mx-2 fa fa-area-chart fa-1x">
      </i>
    </a>
    <a href="profile.php" class="list-group-item fst-italic list-group-item-action sidebar text-center text-white">
      Profile<i class="  mx-2 fa-1x fa fa-address-card"></i>
    </a>

    <a href="appointment.php" class="list-group-item fst-italic list-group-item-action sidebar text-center text-white">
      Book Appointment<i class="  fa-sm fa fa-clock"></i>
    </a>
    <a href="report.php" class="list-group-item fst-italic list-group-item-action sidebar text-center text-white">
      Report<i class="  mx-2 fa-1x fa fa-calendar-check"></i>
    </a>
    <a href="income.php" class="list-group-item fst-italic list-group-item-action sidebar text-center text-white">
      Invoice<i class="  mx-2 fa-1x  fa fa-credit-card-alt"></i>
    </a>


  </div> -->

      <!--ends-->

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
      </script>

</body>

</html>