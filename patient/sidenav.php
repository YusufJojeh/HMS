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
  <title>Patient Dashborad </title>
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
  <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">

</head>
<div class="page d-flex fw-bold">
  <div class="sidebar bg-white p-20 p-relative">
    <h3 class="p-relative txt-c mt-0"><a class="" href="index.php"><img src="img/Logo.jpeg" class="mx-0"
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
          <i class="fa-regular fa-user fa-fw"></i>
          <span>Profile</span>
        </a>
      </li>
      <li>
        <a class=" d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none link-list " data-bs-toggle="modal"
          data-bs-target="#exampleModal">
          <i class="fa-regular icon-envelope-alt fa-fw"></i>
          <span>Send Report</span>
        </a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Send Report</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php
                include("../include/connection.php");
      if(isset($_POST['send'])){
          $title= $_POST['title'];
          $message=$_POST['message'];
          $img  = $_FILES['img']['name'];
              $file  = $_FILES['file']['name'];
          if(empty($title)){
            
          }elseif(empty($message)){

          }else{
            $user = $_SESSION['patient'];
            $query = "INSERT INTO report(title,message,patient,date_send,img,file) VALUES('$title','$message','$user',NOW(),'$img','$file')";

            $res = mysqli_query($connect,$query);
            if($res){
              echo "<script>alert('You Have Sent Your Report')</script>";
                  move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
                  move_uploaded_file($_FILES['file']['tmp_name'],"img/$file");
            }
            
          }
      }
    ?>
                <div class=" jumbotron ">
                  <form method="post" enctype="multipart/form-data">
                    <lable class="">Title</lable>
                    <input type="text" name="title" autocomplete="off" class="form-control"
                      placeholder="Enter Title Of The Report">
                    <label class="">Message</label>
                    <input type="text" name="message" autocomplete="off" class="form-control"
                      placeholder="Enter Message ">
                    <label class="">Photograph OF Test</label>
                    <input type="file" name="img" autocomplete="off" class="form-control">
                    <input type="submit" name="send" value="Send Report" class="btn btn-primary my-3">
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->


              </div>
            </div>
          </div>
        </div>

      </li>
      <li>
        <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="invoice.php">
          <i class="fa fa-file-invoice-dollar fa-fw"></i>
          <span>Invoice</span>
        </a>
      </li>
      <li>
        <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="report.php">
          <i class="fa fa-book-open fa-fw"></i>
          <span>Reports</span>
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
        <li class="nav-item nav-tabs mx-3"><a href="index.php" class="nav-link text-black">Home</a></li>
      <li class="nav-item nav-tabs mx-3"><a href="login.php" class="nav-link text-black">Login
      
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
    <!-- <div class="list-group  sidebar" style="height:270vh;">
  <a href="index.php" class="list-group-item list-group-item-action sidebar text-center text-white">
    Dashborad
  </a>
  <a href="profile.php" class="list-group-item list-group-item-action sidebar text-center text-white">
    Profile
  </a>
  <a href="invoice.php" class="list-group-item list-group-item-action sidebar text-center text-white">
    Invoice
  </a>
  <a href="appointment.php" class="list-group-item list-group-item-action sidebar text-center text-white">
    Appointment
  </a>
  <a href="report.php" class="list-group-item list-group-item-action sidebar text-center text-white">
    Report
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

</html>