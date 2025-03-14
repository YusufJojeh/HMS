<?php
include("../include/connection.php");

$id = $_POST['id'];
$query = "UPDATE doctors SET status='Approved' WHERE doctor_id='$id'";

mysqli_query($connect,$query);

?>