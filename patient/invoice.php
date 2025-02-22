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
<title>My Invoice</title>
</head>

<body>
<?php
// include( '../include/header.php' );

if ( isset( $_SESSION[ 'doctor' ] ) ) {

    include( '../doctor/sidenav.php' );

} else {

    include( 'sidenav.php' );

}

include( '../include/connection.php' );

?>
<div class = 'page container-fluid bg-dark text-white'>
<div class = 'col-md-12'>
<div class = 'row'>
<div class = 'col-md-12'>
<h5 class = 'text-center fw-bold my-3'>My Invoice</h5>
<?php
$pat = $_SESSION[ 'patient' ];

$query = "SELECT * FROM patients WHERE user='$pat'";

$res = mysqli_query( $connect, $query );

$row = mysqli_fetch_array( $res );

$fname = $row[ 'firstname' ];

$querys = mysqli_query( $connect, "
                        SELECT 
                            income.id,
                            d.firstname AS doctor_firstname,
                            d.surname AS doctor_surname,
                            patients.firstname AS patient_firstname,
                            patients.surname AS patient_surname,
                            income.date_discharge,
                            income.amount_paid

                        FROM 
                            income 
                        JOIN 
                            patients ON income.patient = patients.patient_id 
                        JOIN 
                            doctors d ON income.doctor = d.doctor_id 
                        WHERE 
                            patients.firstname = '$fname' ;
                    " );

$output = ' ';

$output .= "               
                        <table class='table table-bordered'>                 
                            <tr>                 
                                <th>ID</th>                 
                                <th>Doctor</th>                 
                                <th>Patient</th>                 
                                <th>Date Discharge</th>                 
                                <th>Amount Paid</th>                 
                                <th>ACT</th>                 
                                <th>REJ</th>                 
                            </tr>           
                    ";

if ( mysqli_num_rows( $querys ) < 1 ) {

    $output .= "                 
                            <tr>                 
                                <td colspan='7' class='text-center'>No Invoice Yet.</td>                 
                            </tr>              
                        ";

} else {

    while ( $row = mysqli_fetch_assoc( $querys ) ) {

        $output .= "                   
                                <tr>                     
                                    <td>".$row[ 'id' ]."</td>                     
                                    <td>".$row[ 'doctor_firstname' ].' '.$row[ 'doctor_surname' ]."</td>                     
                                    <td>".$row[ 'patient_firstname' ].' '.$row[ 'patient_surname' ]."</td>                     
                                    <td>".$row[ 'date_discharge' ]."</td>                     
                                    <td>".$row[ 'amount_paid' ]."</td>'";

        // Check if the income is not checked
        if ( !$row[ 'checked' ] ) {

            $output .= "<td><a href = 'stripe_payment.php?id=".$row[ 'id' ]."'><button class = 'btn btn-info'>View</button></a></td>";
        } else {
            $output .= '<td></td>';
        }

        $output .= "<td><a href = 'delete.php?id=".$row[ 'id' ]."'><button class = 'btn btn-danger'>Reject</button></a></td></tr>";
    }

}

$output .= '</table>';

echo $output;

// ?>
</div>
</div>
</div>
</div>
<!-- <?php include( '../include/footer.php' );
?> -->
</body>

</html>