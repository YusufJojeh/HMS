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
  <title>Check Patient Appointment</title>
</head>

<body>
  <?php
// include("../include/header.php");
        include("sidenav.php");

include("../include/connection.php");
function sendNotification($user_id, $user_type, $message) {
    include("../include/connection.php");
    // Insert notification
    // $query = "INSERT INTO notifications (user_id, user_type, message, status) VALUES ($user_id, '$user_type', '$message', 'unread')";
    // mysqli_query($connect, $query);

}

// Example usage


  ?>

  <div class="col-md-12">
    <div class="row">

      <div class="col-md-10">
        <h5 class="text-center">Total Appointment</h5>
        <?php
        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $query ="SELECT * FROM appointment WHERE id ='$id'";
          $result = mysqli_query($connect, $query);
          $row = mysqli_fetch_array($result);
          $query2 = "SELECT * From patient where patient_id ='$row[patient]'";
          $result2 = mysqli_query($connect,$query2);
          $row2 = mysqli_fetch_array($result2); 
        } 
        
        ?>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md 6">
              <table class="table table-bordered">
                <tr>
                  <td colspan="2" class="text-center fw-bold">Appointment Details</td>
                </tr>
                <tr>
                  <td>Firstname</td>
                  <td><?php echo $row2['firstname'];?></td>
                </tr>
                <tr>
                  <td>Surname</td>
                  <td><?php echo $row2['surname'];?></td>
                </tr>
                <tr>
                  <td>Gender</td>
                  <td><?php echo $row2['gender'];?></td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td><?php echo $row2['phone'];?></td>
                </tr>
                <tr>
                  <td>Appointment Date</td>
                  <td><?php echo $row['appointment_date'];?></td>
                </tr>
                <tr>
                  <td>Symptoms</td>
                  <td><?php echo $row['symptoms'];?></td>
                </tr>

              </table>
            </div>
            <div class="col-md 6">
              <h5 class="text-center my-1">Invoice</h5>
              <?php
                if(isset($_POST['send'])){
                  $fee = $_POST['fee'];
                  $des = $_POST['des'];
                  if(empty($fee)){

                  }elseif(empty($des)){

                }else{
                  $doc = $_SESSION['doctor'];
                  $fname = $row2['firstname'];
                  $sel1=mysqli_query($connect,"SELECT doctor_id from doctors where user ='$doc'" );
                    $res1=mysqli_fetch_array($sel1);
                      extract($res1);
                  $sel2=mysqli_query($connect,"SELECT patient_id from patient where firstname='$fname' " );
                    $res2=mysqli_fetch_array($sel2);
                    extract($res2);
                  
                  $query ="INSERT INTO income(doctor,patient,date_discharge,amount_paid,description,checked,appoint) VALUES('$res1[doctor_id]','$res2[patient_id]',NOW(),'$fee','$des',0,'$appoin')";
                  $result = mysqli_query($connect, $query);

                  if($result){
                    echo "<script>alert('You Have Send Invoice')</script>";
                                    
                    
                  }
                }
                sendNotification($sel2, 'doctor', 'You have a new appointment scheduled.');
              }
                
                ?>





              <form method="post">
                <lable>Fee</lable>
                <input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter Patient ">
                <lable>Description</lable>
                <input type="text" name="des" class="form-control" autocomplete="off" placeholder="Enter Description">
                <input type="submit" class="btn btn-primary my-2" value="Send" name="send">
              </form>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include("../include/footer.php"); ?>
</body>

</html>