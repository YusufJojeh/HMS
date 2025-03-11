<?php
session_start();

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
    include( '../include/header.php' );
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

$query = "SELECT * FROM patients WHERE username='$pat'";

$res = mysqli_query( $connect, $query );

$row = mysqli_fetch_array( $res );

$fname = $row[ 'first_name' ];

$querys = mysqli_query( $connect, "
                        SELECT 
    income_id,
    d.first_name AS doctor_first_name,
    d.last_name AS doctor_last_name,
    patients.first_name AS patient_first_name,
    patients.last_name AS patient_last_name,
    incomes.date_discharge,
    incomes.amount_paid
FROM incomes
JOIN patients ON incomes.patient_id = patients.patient_id 
JOIN doctors d ON incomes.doctor_id = d.doctor_id 
WHERE patients.first_name = '$fname';
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
                                    <td>".$row[ 'doctor_first_name' ].' '.$row[ 'doctor_last_name' ]."</td>                     
                                    <td>".$row[ 'patient_first_name' ].' '.$row[ 'patient_last_name' ]."</td>                     
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