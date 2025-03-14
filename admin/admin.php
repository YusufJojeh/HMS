<?php
session_start();
include( '../include/connection.php' );
?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<title>Admin</title>
</head>

<body>

<?php include( 'sidenav.php' );
?>

<div class = 'page container-fluid bg-dark text-white'>
<div class = 'col-md-12 gap-20'>
<div class = 'row'>
<div class = 'col-md-6 mx-2'>
<h5 class = 'text-center fw-bold'>All Admin</h5>

<?php
$ad = $_SESSION[ 'admin' ];
$query = "SELECT * FROM admins WHERE username != '$ad'";
$res = mysqli_query( $connect, $query );

$output = "<table class='table table-responsive table-bordered'>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Permission Type</th>
                        <th style='width:10%;'>Action</th>
                    </tr>";

if ( mysqli_num_rows( $res ) < 1 ) {
    $output .= "<tr><td class='text-center' colspan='4'>No New Admin</td></tr>";
}

while ( $row = mysqli_fetch_assoc( $res ) ) {
    $id = $row[ 'admin_id' ];
    $username = $row[ 'username' ];
    $per = $row[ 'permissions' ];

    $output .= "<tr>
                        <td>$id</td>
                        <td>$username</td>
                        <td>$per</td>
                        <td>";

    if ( $per == "Can't Add Or Delete Admins" ) {
        $output .= "<a href='admin.php?id=$id'><button class='btn btn-danger'>Remove</button></a>";
    }

    $output .= '</td></tr>';
}

$output .= '</table>';
echo $output;

if ( isset( $_GET[ 'id' ] ) ) {
    $id = $_GET[ 'id' ];
    $query = "DELETE FROM admins WHERE admin_id='$id'";
    mysqli_query( $connect, $query );
    header( 'Location: admin.php' );
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

    $error = [];
    if ( empty( $uname ) ) {
        $error[ 'u' ] = 'Enter Admin Username';
    } elseif ( empty( $pass ) ) {
        $error[ 'u' ] = 'Enter Admin Password';
    } elseif ( empty( $image ) ) {
        $error[ 'u' ] = 'Add Admin Picture';
    }

    if ( count( $error ) == 0 ) {
        $q = "INSERT INTO admins(username, password, profile_img, permissions) VALUES ('$uname','$pass','$image','$type')";
        $result = mysqli_query( $connect, $q );
        if ( $result ) {
            move_uploaded_file( $_FILES[ 'profile_img' ][ 'tmp_name' ], "C:/xampp/htdocs/hms/img/$image" );
            header( 'Location: admin.php' );
        }
    }
}

$show = isset( $error[ 'u' ] ) ? "<h5 class='text-center alert alert-danger'>{$error['u']}</h5>" : '';
?>

<h5 class = 'text-center fw-bold'>Add Admin</h5>
<form method = 'post' enctype = 'multipart/form-data' action = ''>
<div>< ?= $show;
?></div>
<div class = 'form-group'>
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
<input type = 'file' name = 'profile_img' class = 'form-control'>
</div>
<input type = 'submit' name = 'add' value = 'Add New Admin' class = 'btn btn-success'>
</form>
</div>
</div>
</div>
</div>

</body>

</html>