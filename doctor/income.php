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
<title>Total Income</title>
</head>

<body>
<?php
include( '../include/connection.php' );
include( 'sidenav.php' );

?>
<div class = 'page container-fluid bg-dark text-white'>
<div class = 'col-md-12'>
<div class = 'row'>

<div class = 'col-md-12'>
<h5 class = 'text-center my-4 fw-bold'>Total Income</h5>
<?php
$query = "SELECT 
    income.id,
    d.firstname AS doctor_firstname,
    d.surname AS doctor_surname,
    p.firstname AS patient_firstname,
    p.surname AS patient_surname,
    income.date_discharge,
    income.amount_paid
FROM 
    income 
JOIN 
    doctors d ON d.doctor_id = income.doctor 
JOIN 
    patients p ON p.patient_id = income.patient";
$res = mysqli_query( $connect, $query );
$output = '';
$output .= "
            <table class='table table-bordered'>
              <tr>
                <th>ID</th>
                <th>Doctor</th>
                <th>Patient</th>
                <th>date_discharge</th>
                <th>Amount Paid</th>
              
              
              </tr>
          ";

if ( mysqli_num_rows( $res )<1 ) {
    $output .= "
                <tr>
                  <td class='text-center'colspan='5'>No Patient Discharge Yet.</td>
                </tr>
              ";
}

while( $row = mysqli_fetch_array( $res ) ) {
    $money = $row[ 'amount_paid' ];
    $money = $money-( 20/100 )*$money;
    $output .= "
              
                <tr>
                  <td>".$row[ 'id' ]."</td>
                  <td>".$row[ 'doctor_firstname' ].$row[ 'doctor_surname' ]."</td>
                  <td>".$row[ 'patient_firstname' ].$row[ 'patient_surname' ]."</td>
                  <td>".$row[ 'date_discharge' ]."</td>
                  <td>".$money."</td>
              
              
              ";

}
$output .= "
          </tr>
          </table>
          
          ";
echo $output;
?>
</div>
</div>
</div>
</div>

<?php include( '../include/footer.php' );
?>
</body>

</html>