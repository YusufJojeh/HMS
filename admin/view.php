<?php
session_start();
?>
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
  <title>View Patient Detalis</title>
</head>

<body>
  <?php

        // include("../include/header.php");
                include("sidenav.php");

        include("../include/connection.php");
    ?>
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="row">

        <div class="col-md-12">
          <h5 class="text-center my-3">Patient Details</h5>

          <div class="col-md-12">
            <div class="row">
              <?php
                if(isset($_GET['patient_id'])){
                  $id = $_GET['patient_id'];
                  $query = "SELECT * FROM patient WHERE patient_id='$id'";
                  $res = mysqli_query($connect,$query);
                  $row = mysqli_fetch_array($res);
                }
              ?>
              <div class="col-md-5 mx-5">
                <?php echo "<img src='../patient/img/".$row['profile_img']."' alt='Img'  class='col-md-12 my-2' height='250px'>";
                    
                    ?>
              </div>
              <div class="col-md-5">
                <table class="table table-bordered">
                  <tr>
                    <th class="text-center" colspan="2">Details</th>
                  </tr>
                  <tr>
                    <td>Firstname</td>
                    <td><?php echo $row['firstname'];?></td>
                  </tr>
                  <tr>
                    <td>Surname</td>
                    <td><?php echo $row['surname'];?></td>
                  </tr>
                  <tr>
                    <td>Username</td>
                    <td><?php echo $row['user'];?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $row['email'];?></td>
                  </tr>

                  <tr>
                    <td>Phone</td>
                    <td><?php echo $row['phone'];?></td>
                  </tr>

                  <tr>
                    <td>Gender</td>
                    <td><?php echo $row['gender']?></td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td><?php echo $row['country'];?></td>
                  </tr>

                  <tr>
                    <td>Date Registered</td>
                    <td><?php echo $row['date_reg'];?></td>
                  </tr>

                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- <?php include("../include/footer.php");?> -->
</body>

</html>