<?php
session_start();
?>
<?php
// تعطيل عرض الأخطاء على الشاشة
ini_set( 'display_errors', 0 );
ini_set( 'display_startup_errors', 0 );
error_reporting( E_ALL );
// تسجيل جميع الأخطاء
ini_set( 'log_errors', 1 );
// تمكين تسجيل الأخطاء
ini_set( 'error_log', '/path/to/error_log' );
// تحديد ملف سجل الأخطاء
?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<title>Admin</title>
</head>

<body>
<?php

include( 'sidenav.php' );
include( '../include/connection.php' );
?>
<div class = 'page contanier-fluid bg-dark text-white'>
<div class = 'col-md-12'>
<div class = 'row'>
<div class = 'col-md-6 mx-1'>
<h5 class = 'text-center fw-bold'>
All Admin
</h5>
<?php
$ad = $_SESSION[ 'admin' ];
$query = "SELECT A.id, A.user, ATT.type_id, ATT.permissions 
                FROM admin A
                JOIN admin_type ATT ON A.type_id = ATT.type_id 
                WHERE A.user != '$ad'";

;
$res = mysqli_query( $connect, $query );

$output = " <table class='table table-responsive table-bordered'>
                  <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>PermssionType</th>
                  <th style='width:10%;'id='Act'>Action</th>
                  </tr>";

if ( mysqli_num_rows( $res )<1 ) {
    $output .= "<tr> 
                    <td class='text-center'colspan='3'>No New Admin</td>
                    </tr>";
}
while( $row = mysqli_fetch_array( $res ) ) {
    $id = $row[ 'id' ];
    $username = $row[ 'user' ];
    $type1 = $row[ 'type_id' ];
    $per = $row[ 'permissions' ];
    if ( $type1 == 1 ) {

        $output .= "
                  <tr>
                    <td>$id</td>
                    <td>$username</td>
                    <td>$per</td>
                    <td></td>"
        ;

    }
    if ( $type1 != 1 ) {

        $output .= "
                  <tr>
                    <td>$id</td>
                    <td>$username</td>
                    <td>$per</td>
                    <td>
                      <a href ='admin.php?id=$id'><button id='remove' class='btn btn-danger'>
                      Remove</button></a>
                    </td>";
    }
}
$output .= "
                  </tr>
                  </table> 
                  ";
echo $output;

if ( isset( $_GET[ 'id' ] ) && $type1 != 1 ) {
    $id = $_GET[ 'id' ];

    $query = "DELETE FROM admin WHERE id='$id'";
    mysqli_query( $connect, $query );

}

?>

</div>

<div class = 'col-md-5'>
<?php
if ( isset( $_POST[ 'add' ] ) ) {
    $uname = $_POST[ 'uname' ];
    $type = $_POST[ 'type' ];
    $pass = $_POST[ 'pass' ];
    $image = $_FILES[ 'profile_img' ][ 'name' ];
    $error = array();
    if ( empty( $uname ) ) {
        $error[ 'u' ] = 'Enter Admin Username';
    } elseif ( empty( $pass ) ) {
        $error[ 'u' ] = 'Enter Admin Password' ;
    } elseif ( empty( $image ) ) {
        $error[ 'u' ] = 'Add Admin Picture';
    }

    if ( count( $error ) == 0 ) {
        $q = "INSERT INTO admin(user,password,profile_img,type_id) VALUES ('$uname','$pass','$image','$type')";
        $result = mysqli_query( $connect, $q );
        if ( $result ) {
            move_uploaded_file( $_FILES[ 'profile_img' ][ 'tmp_name' ], "C:\\xampp\htdocs\hms\img/$image" );
            header( 'Location:#' );
        }

    }

}

if ( isset( $error[ 'u' ] ) ) {
    $er = $error[ 'u' ];
    $show = "<h5 class='text-center alert alert-danger'>$er</h5>";
} else {
    $show = '';
}
?>
<h5 class = 'text-center fw-bold'> Add Admin</h5>
<form method = 'post' enctype = 'multipart/form-data' action = ''>
<div>
<?php echo $show;
?>
</div>
<div class = 'form-group '>
<label>Username</label>
<input type = 'text' name = 'uname' class = 'form-control' autocomplete = 'off'>
</div>
<div class = 'form-group my-1'>
<label>Type</label>
<input type = 'number' name = 'type' class = 'form-control' autocomplete = 'off'>
</div>
<div class = 'form-group my-1'>
<label>Password</label>
<input type = 'password' name = 'pass' class = 'form-control' autocomplete = 'off'>
</div>
<div class = 'form-group my-3'>
<label>Add Admin Picture</label>
<input type = 'file' name = 'profile_img' class = 'from-control'>
</div>
<input type = 'submit' name = 'add' value = 'Add New Admin' class = 'btn btn-success'>
</form>
</div>
</div>
</div>
</div>

</body>

</html>