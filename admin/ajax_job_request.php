<?php
include("../include/connection.php");

$query = "SELECT * FROM doctors WHERE status='Pendding' ORDER BY date_reg ASC";
$res = mysqli_query($connect,$query) or die(" Error");

$output = "";

$output .="

      <table class='table table-bordered'>
        <tr>
          <th>ID</th>
          <th>Firstname</th>
          <th>Surname</th>
          <th>Username</th>
          <th>Gender</th>
          <th>Phone</th>
          <th>Country</th>
          <th>Date Registered</th>
          <th>Action</th>
        </tr>
      
";


if(mysqli_num_rows($res) < 1){
  $output .= "
        <tr>
          <td colspan ='10' class='text-center'> No Job Request Yet. </td>
        </tr>
  ";
}

while($row = mysqli_fetch_array($res)){
  $output .="
    <tr>
      <td>".$row['doctor_id']. "</td>
      <td>" . $row['firstname'] . " </td>
      <td>" . $row['surname'] . "</td>
      <td>" . $row['user'] . "</td>
      <td>" . $row['gender'] . "</td>
      <td>" . $row['phone'] . "</td>
      <td>" . $row['country'] . "</td>
      <td>" . $row['date_reg'] . "</td>
      <td>
          <div class='col-md-12'>
              <div class='row'>
              <div class='col-md-6'>
                <button id='" . $row['doctor_id'] . "' class='btn invoice text-dard fw-bold approve'>Approve</button>
              </div>
                
              <div class='col-md-6'>
              <button id='".$row['doctor_id']."' class='btn  text-dard fw-bold appointment reject'>Reject</button>
              </div>
              </div>
          </div>
        </td>


  ";


}
$output .="

    </tr>
</table>
";


echo $output;
?>
<?php
// تعطيل عرض الأخطاء على الشاشة
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL); // تسجيل جميع الأخطاء
ini_set('log_errors', 1); // تمكين تسجيل الأخطاء
ini_set('error_log', '/path/to/error_log'); // تحديد ملف سجل الأخطاء
?>