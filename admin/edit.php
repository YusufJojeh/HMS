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
  <title>Edit Doctor</title>
</head>

<body>
  <?php
        include("sidenav.php");
      
      include("../include/connection.php");
      ?>

  <div class="container-fluid">
    <div class="col-md-12">
      <div class="row">

        <div class="col-md-10">
          <h5 class="text-center">Edit Doctor</h5>
          <?php
    if(isset($_GET['doctor_id'])){
      $id =$_GET['doctor_id'];
      $query ="SELECT * FROM doctors WHERE doctor_id='$id'";
      $res = mysqli_query($connect,$query); 
      $row = mysqli_fetch_array($res);
    }
    
    
    ?>
          <div class="row">
            <div class="col-md-8">
              <h5 class="text-center my-3">DOCTOR DETAILS</h5>
              <h5 class="my-3">ID : <?php echo $row['doctor_id'];?></h5>
              <h5 class="my-3">FirstName : <?php echo $row['firstname'];?></h5>
              <h5 class="my-3">Surname : <?php echo $row['surname'];?></h5>
              <h5 class="my-3">UserName : <?php echo $row['user'];?></h5>
              <h5 class="my-3">Email : <?php echo $row['email'];?></h5>
              <h5 class="my-3">Phone : <?php echo $row['phone'];?></h5>
              <h5 class="my-3">Gender : <?php echo $row['gender'];?></h5>
              <h5 class="my-3">Country : <?php echo $row['country'];?></h5>
              <h5 class="my-3">Date Registered : <?php echo $row['date_reg'];?></h5>
              <h5 class="my-3">Salary : $<?php echo $row['salary'];?></h5>

            </div>
            <div class="col-md-4">
              <h5 class="text-center my-3">UPDATE SALARY</h5>
              <?php
          if(isset($_POST['update'])){
            $salary = $_POST['salary'];
            $q = "UPDATE doctors SET salary = '$salary' WHERE doctor_id = '$id'";
            mysqli_query($connect,$q);
          }
          
          ?>
              <form method="post">
                <h5 class="text-center">Enter Doctor's Salary </h5>
                <input type="number" name="salary" class="form-control" autocomplete="off"
                  placeholder="Enter Doctor's Salary" value="<?php echo $row['salary'];?>">
                <input type="submit" name="update" class="btn navigation text-dark fw-bold my-3" value="Update Salary">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <?php include("../include/footer.php");?> -->
</body>

</html>