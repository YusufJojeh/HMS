<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>
    Admin Profile
  </title>
</head>

<body>
  <?php

include( 'sidenav.php' );

include( '../include/connection.php' );
$ad = $_SESSION[ 'admin' ];
$query = "SELECT * from admins WHERE username='$ad'";
$res = mysqli_query( $connect, $query );
while( $row = mysqli_fetch_array( $res ) ) {
    $username = $row[ 'username' ];
    $profiles = $row[ 'profile_img' ];
}
?>
  <div class='page container-fluid text-white bg-dark'>
    <div class='col-md-12'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='col-md-12'>
            <div class='row'>
              <div class='col-md-6 mx-2'>
                <h4 class='my-3 fw-bold'><?php echo"$username";
?> Profile</h4>
                <?php
if ( isset( $_POST[ 'update' ] ) ) {
    $profile = $_FILES[ 'profile_img' ][ 'name' ];
    if ( empty( $profile ) ) {
    } else {
        $query = "UPDATE admins SET profile_img ='$profile' WHERE username ='$ad'";
        $result = mysqli_query( $connect, $query );

        if ( $result ) {
            move_uploaded_file( $_FILES[ 'profile_img' ][ 'tmp_name' ], "img/$profile" );
        }
    }
}

?>
                <form method='post' enctype='multipart/form-data'>
                  <?php
echo "<img src='img/$profiles'class='col-md-12 'style='height:250px;border-radius:10%;'>";
?>
                  <br><br>
                  <div class='form-group'>
                    <h4 class='text-center my-4'>Update Profile</h4>
                    <input type='file' name='profile_img' class='form-control'>
                  </div>
                  <br>
                  <input type='submit' name='update' value='UPDATE' class='btn btn-success invoice text-dark fw-bold '>
                </form>
              </div>
              <div class='col-md-5'>
                <br>
                <?php
if ( isset( $_POST[ 'change' ] ) ) {
    $uname = $_POST[ 'uname' ];
    if ( empty( $uname ) ) {

    } else {
        $query = "UPDATE admins SET username='$uname' WHERE username ='$ad'";
        $res = mysqli_query( $connect, $query );

        if ( $res ) {
            $_SESSION[ 'admin' ] = $uname;
        }
    }
}
?>

                <?php
if ( isset( $_POST[ 'update_pass' ] ) ) {
    $old_pass = $_POST[ 'old_pass' ];
    $new_pass = $_POST[ 'new_pass' ];
    $con_pass = $_POST[ 'con_pass' ];
    $error = array();

    $old = mysqli_query( $connect, "SELECT * FROM admins WHERE username = '$ad'" );
    $row = mysqli_fetch_array( $old );
    $pass = $row[ 'password' ];

    if ( empty( $old_pass ) ) {
        $error [ 'p' ] = 'ENTER OLD PASSWORD';
    } elseif ( empty( $new_pass ) ) {
        $error[ 'p' ] = 'ENTER NEW PASSWORD ';
    } elseif ( empty( $con_pass ) ) {
        $error[ 'p' ] = 'ENTER CONFIRM PASSWORD';
    } elseif ( $old_pass != $pass ) {
        $error[ 'p' ] = 'INVAILD OLD PASSWORD';
    } elseif ( $new_pass != $con_pass ) {
        $error [ 'p' ] = 'BOTH PASSWORD DOES NOT MATCH';
    }
    if ( count( $error ) == 0 ) {
        $query = "UPDATE admin SET password = '$new_pass' WHERE username ='$ad'";
        $res = mysqli_query( $connect, $query );
        if ( $res ) {
            echo "<script> window.alert('UPDATED'); </script>";
        }
    }
}
if ( isset( $error[ 'p' ] ) ) {
    $e = $error[ 'p' ];
    $show = "<h5 class ='text-center alert alert-danger'>$e</h5>";
} else {
    $show = '';
}
?>

                <form method='post'>
                  <h4 class='text-center my-4'>Change username</h4>
                  <input type='text' name='uname' class='form-control' autocomplete='off'>
                  <br>
                  <input type='submit' name='change' value='Change' class='btn navigation text-dark fw-bold'>
                </form>
                <br>
                <form method='post'>
                  <h4 class='text-center my-4'>Change Password</h4>
                  <div><?php echo $show;
?></div>
                  <div class='form-group'>
                    <label>Old Password</label>
                    <input type='password' name='old_pass' class='form-control'>
                  </div>
                  <div class='form-group'>
                    <label>New Password</label>
                    <input type='password' name='new_pass' class='form-control'>
                  </div>
                  <div class='form-group'>
                    <label>Confirm Password</label>
                    <input type='password' name='con_pass' class='form-control'>
                  </div>
                  <input type='submit' name='update_pass' value='Update Password'
                    class='btn  navigation text-dark fw-bold'>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- <?php include( '../include/footer.php' );
?> -->
</body>

</html>