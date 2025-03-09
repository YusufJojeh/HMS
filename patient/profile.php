<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Patient Profile</title>
</head>

<body>
  <?php

include( '../include/connection.php' );
include( 'sidenav.php' );

$patient = $_SESSION[ 'patient' ];
$query = "SELECT * FROM patients WHERE username='$patient' ";
$res = mysqli_query( $connect, $query );
$row = mysqli_fetch_array( $res );
?>

  <div class='page container-fluid bg-dark text-white'>
    <div class='col-md-12'>
      <div class='row'>
        <div class='col-md-12'>

          <div class='col-md-12'>
            <div class='row'>
              <div class='col-md-6 mx-4'>
                <?php
if ( isset( $_POST[ 'upload' ] ) ) {
    $img  = $_FILES[ 'img' ][ 'name' ];
    if ( empty( $img ) ) {

    } else {
        $query = "UPDATE patients SET profile_img='$img'WHERE username='$patient'";
        $res = mysqli_query( $connect, $query );
        if ( $res ) {
            move_uploaded_file( $_FILES[ 'img' ][ 'tmp_name' ], "img/$img" );
        }

    }
}

?>
                <h5 class='my-2'><?php echo $row[ 'username' ];
?> Profile</h5>
                <form method='post' enctype='multipart/form-data'>
                  <?php
echo "<img src='img/".$row[ 'profile_img' ]."'class='col-md-12' style='height:250px;'>";
?>
                  <input type='file' name='img' class='form-control my-2'>
                  <input type='submit' name='upload' value='Update Profile' class='btn btn-primary'>
                </form>
                <table class='table table-bordered my-3'>
                  <tr>
                    <th colspan='2' class='text-center'>My Details</th>
                  </tr>
                  <tr>
                    <td>Firstname</td>
                    <td><?php echo $row[ 'first_name' ];
?></td>
                  </tr>
                  <tr>
                    <td>Surname</td>
                    <td><?php echo $row[ 'last_name' ];
?></td>
                  </tr>
                  <tr>
                    <td>Username</td>
                    <td><?php echo $row[ 'username' ];
?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $row[ 'email' ];
?></td>
                  </tr>
                  <tr>
                    <td>Phone Number</td>
                    <td><?php echo $row[ 'phone' ];
?></td>
                  </tr>
                  <tr>
                    <td>Gender</td>
                    <td><?php echo $row[ 'gender' ];
?></td>
                  </tr>


                </table>
              </div>
              <div class='col-md-5 my-2'>
                <h5 class='text-center'>Change Username</h5>
                <?php
if ( isset( $_POST[ 'update' ] ) ) {
    $uname = $_POST[ 'uname' ];
    if ( empty( $uname ) ) {

    } else {
        $query = "UPDATE patient SET username ='$uname' WHERE user='$patient'";
        $res = mysqli_query( $connect, $query );
        if ( $res ) {
            $_SESSION[ 'patient' ] = $uname;
        }
    }
}
?>

                <form method='post'>
                  <label>Username</label>
                  <input type='text' name='uname' class='form-control' autocomplete='off' placeholder='Enter Username'>
                  <input type='submit' name='update' class='btn btn-primary my-3' value='Update Username'>
                </form>
                <?php
if ( isset( $_POST[ 'change' ] ) ) {
    $old = $_POST[ 'old_pass' ];
    $new = $_POST[ 'new_pass' ];
    $con = $_POST[ 'con_pass' ];

    $ol = "SELECT * FROM patient WHERE user ='$patient'";
    $ols = mysqli_query( $connect, $ol );
    $row = mysqli_fetch_array( $ols );
    if ( $old != $row[ 'password' ] ) {

    } elseif ( empty( $new ) ) {

    } else if ( $con != $new ) {

    } else {
        $query = "UPDATE patient SET password='$new'WHERE username='$patient'";
        mysqli_query( $connect, $query );
    }
}
?>
                <h5 class='my-4 text-center'>Change Password</h5>
                <form method='post'>
                  <label>Old Password</label>
                  <input type='password' name='old_pass' class='form-control my-2' autocomplete='off'
                    placeholder='Enter Old Password'>
                  <label>New Password</label>
                  <input type='password' name='new_pass' class='form-control my-2' autocomplete='off'
                    placeholder='Enter New Password'>
                  <label>Confirm Password</label>
                  <input type='password' name='con_pass' class='form-control my-2 ' autocomplete='off'
                    placeholder='Enter Confirm Password'>
                  <input type='submit' name='change' class='btn btn-primary my-3' value='Change Password'>
                </form>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>