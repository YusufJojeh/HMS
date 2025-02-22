<!DOCTYPE html>
<html lang="en">
<?php
// تعطيل عرض الأخطاء على الشاشة
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL); // تسجيل جميع الأخطاء
ini_set('log_errors', 1); // تمكين تسجيل الأخطاء
ini_set('error_log', '/path/to/error_log'); // تحديد ملف سجل الأخطاء
?>

<?php 
include('../include/connection.php');?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashborad </title>
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
<div class="page d-flex fw-bold">
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
          <i class="fa-regular fa-user fa-fw"></i>
          <span>Profile</span>
        </a>
      </li>
      <li>
        <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="admin.php">
          <i class="fa-regular fa-circle-user fa-fw"></i>
          <span>Adminstrators</span>
        </a>
      </li>
      <li>
        <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="doctor.php">
          <i class="fa-1x  fa fa-user-md"></i>
          <span>Doctors</span>
        </a>
      </li>
      <li>
        <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="patient.php">
          <i class="fa fa-procedures fa-1x  fa fa-procedures"></i>
          <span>Patient</span>
        </a>
      </li>
      <li>
        <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href='job_request.php'>
          <i class="fa fa-book-open fa-1x fa fa-book-open"></i>
          <span>Job Request</span>

        </a>
      </li>
      <li>
        <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href='income.php'>
          <i class="fa fa-money-check-alt  fa-1x fa fa-money-check-alt "></i>
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
              <li class="nav-item nav-tabs mx-3"><a href="logout.php" class="nav-link text-black"><i class="icon-signout mx-1"></i><span>Logout</span></a></li>
              <li><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class ="fa fa-bell" ></i>
</button>


</li>
              ';
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Notifications</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php
                $query0 = "SELECT * FROM notifications where doctor != 0 and status = 'unread' ";
                $result0 = mysqli_query($connect,$query0);
                if(mysqli_num_rows($result0)){
                while($row = mysqli_fetch_array($result0)){
                  echo $row['message']."<br>";
                  // $forrmat =  $row['created_at'];
                  // echo date('d F Y, h:i A',$forrmat);
                }
              }
              else {
                echo "No New Notification ..";
              }
                ?>
                <?php
                if(isset($_POST['mark'])){
                $query1 = "UPDATE notifications set status = 'read' where status ='unread'";
                $result1 =mysqli_query($connect,$query1);
                // $row = mysqli_fetch_array($result);
                }
              ?>
              </div>
              <div class="modal-footer">
                <?php
                  if(mysqli_num_rows($result0)){
                  echo '<form action="" method="POST">
                  <input type="submit" name="mark" class="btn btn-primary" value="Mark All Read">
                </form>';
                  }
                  else{
                    
                  } 
                ?>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>




    <!-- <div class="page d-flex">
    <div class=" bg-white page p-20 p-relative">
      <a class=" d-flex align-center fs-14 c-black rad-6 p-10 " href="index.php">
        <img src="../img/Logo.jpeg" width="100px" height="100px" style="border-radius: 50px;margin:auto;">
      </a>
      <ul>
        <li>
          <a class=" d-flex align-center fs-14 c-black rad-6 p-10" href="index.php">
            <i class="fa-regular fa-chart-bar fa-fw"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="profile.php">
            <i class="fa-solid fa-gear fa-fw"></i>
            <span>Profile</span>
          </a>
        </li>

        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="admin.php">
            <i class="fa-solid fa-diagram-project fa-fw"></i>
            <span>Adminstrators</span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="doctor.php">
            <i class="fa-solid fa-graduation-cap fa-fw"></i>
            <span>Doctors</span>
          </a>
        </li>
        <li>
          <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="patient.php">
            <i class="icon-dashboard fa-1x  fa fa-procedures"></i>
            <span>Patient</span>
          </a>
        </li>

      </ul>
    </div> -->
    <!-- <div class="content w-full"></div> -->

    <!-- End Head -->



    <!-- style="height:140vh;" -->

    <!--SideBar-->
    <!-- <div class="list-group sidebar btn-group bg-white text-black">
    <a href="index.php" class="bg-white icon-dashboard list-group-item list-group-item-action sidebar text-center
      text-black">Dashborad<i class=" mx-2 fa fa-area-chart fa-1x">
      </i>
    </a>
    <a href="profile.php"
      class="bg-white icon-dashboard list-group-item list-group-item-action sidebar text-center text-black">
      Profile <i class="  mx-2 fa-1x fa fa-address-card"></i>
    </a>
    <a href="admin.php"
      class="bg-white list-group-item list-group-item-action sidebar text-center  icon-dashboard text-black">
      Administrators<i class=" bg-white fa-1x mx-2 fa fa-user-circle"></i>
    </a>
    <a href="doctor.php"
      class="bg-white icon-dashboard list-group-item list-group-item-action sidebar text-center text-black">
      Doctors<i class=" fa-1x mx-2 fa fa-user-md"></i>
    </a>
    <a href="patient.php"
      class="bg-white icon-dashboard list-group-item list-group-item-action sidebar text-center text-black">
      Patient<i class="icon-dashboard fa-1x mx-2 fa fa-procedures"></i>
    </a>
  </div> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>