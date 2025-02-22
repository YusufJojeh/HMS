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
  <title>Doctor Profile Page</title>
</head>

<body>
  <?php
                include("sidenav.php");

    include("../include/connection.php");
    
    ?>

  <div class="page container-fluid bg-dark text-white">
    <div class="col-md-12">
      <div class="row">

        <div class="col-md-12">
          <div class="container-fluid">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                  <?php
                      $doc = $_SESSION['doctor'];
                      $query = "SELECT * FROM doctors WHERE user='$doc'";
                      $res = mysqli_query($connect,$query);
                      $row = mysqli_fetch_array($res);

                      if(isset($_POST['upload'])){
                        $img = $_FILES['img']['name'];
                        if(empty($img)){

                        }else{
                          $query = "UPDATE doctors SET profile_img='$img'WHERE user='$doc'";
                          $res = mysqli_query($connect,$query);
                          if($res){
                            move_uploaded_file($_FILES['img']['tmp_name'],"C:\\xampp\htdocs\hms\doctor\img/$img");
                          }
                        }
                      }
                      ?>
                  <form method="post" enctype="multipart/form-data">
                    <?php echo "<img src='img/".$row['profile_img']."' style='height:250px;' class ='img-fluid  my-2'>";
                        ?>
                    <input type="file" name="img" class="form-control">
                    <input type="submit" name="upload" class="btn btn-primary my-2" value="Update Profile">
                  </form>
                  <div class="my-3">
                    <table class="table table-bordered table-dark">
                      <tr>
                        <th class="text-center" colspan='2'>Details</th>
                      </tr>
                      <tr>
                        <td>Firstname</td>
                        <td><?php
                            echo $row['firstname'];
                            ?></td>

                      </tr>
                      <tr>
                        <td>Firstname</td>
                        <td><?php
                            echo $row['firstname'];
                            ?></td>
                      </tr>
                      <tr>
                        <td>Username</td>
                        <td><?php
                            echo $row['user'];
                            ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php
                            echo $row['email'];
                            ?></td>
                      </tr>
                      </tr>
                      <tr>
                        <td>Phone No.</td>
                        <td><?php
                            echo $row['phone'];
                            ?></td>
                      </tr>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td><?php
                            echo $row['gender'];
                            ?></td>
                      </tr>
                      <tr>
                        <td>Country</td>
                        <td><?php
                            echo $row['country'];
                            ?></td>
                      </tr>
                      <tr>
                        <td>Salary</td>
                        <td><?php
                            echo $row['salary'];
                            ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-md-6">
                  <h5 class="text-center">Update Username</h5>
                  <form method="post">
                    <h5 class="my-2">Change Username</h5>
                    <?php
                          if(isset($_POST['change_uname'])){
                            $uname =$_POST['uname'];
                            if(empty($uname)){

                            }else{
                              $query = "UPDATE doctors SET user='$uname' WHERE user='$doc'";
                              $res =mysqli_query($connect,$query);
                              if($res){
                                $_SESSION['doctor'] =$uname;
                              }
                            }
                          }
                          ?>
                    <input type="text" name="uname" class="form-control" autocomplete="off"
                      placeholder="Enter UserName">
                    <br>
                    <input type="submit" name="change_uname" value="Change Username" class="btn btn-success">
                  </form>
                  <br><br>
                  <h5 class="text-center my-2">Change Password</h5>

                  <?php
                          if(isset($_POST['change_pass'])){
                            $old = $_POST['old_pass'];
                            $new = $_POST['new_pass'];
                            $con = $_POST['con_pass'];

                            $ol = "SELECT * FROM doctors WHERE user ='$doc'";
                            $ols = mysqli_query($connect,$ol);
                            $row = mysqli_fetch_array($ols);
                              if($old != $row['password']){

                              }elseif(empty($new)){

                              }else if($con != $new){

                              }else{
                                $query = "UPDATE doctors SET password='$new'WHERE user='$doc'";
                                mysqli_query($connect,$query);
                              }
                          }
                          ?>
                  <form method="post">
                    <div class="form-group">
                      <h5>Old Password</h5>
                      <input type="password" name="old_pass" class="form-control" autocomplete="off"
                        placeholder="Enter Old Password">
                    </div>
                    <div class="form-group">
                      <h5>New Password</h5>
                      <input type="password" name="new_pass" class="form-control" autocomplete="off"
                        placeholder="Enter New Password">
                    </div>
                    <div class="form-group">
                      <h5>Confirm Password</h5>
                      <input type="password" name="con_pass" class="form-control" autocomplete="off"
                        placeholder="Enter Confirm Password">
                    </div>
                    <input type="submit" value="Change Password" name="change_pass" class="btn btn-primary my-2">
                  </form>
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