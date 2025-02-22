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
  <title>View Invoice</title>
</head>


<body>
  <?php
            include("sidenav.php");

include("../include/connection.php");
/*                        $query = "SELECT 
    income.id,
    d.firstname AS doctor_firstname,
    d.surname AS doctor_surname,
    patient.firstname AS patient_firstname,
    patient.surname AS patient_surname,
    income.date_discharge,
    income.amount_paid,
    income.description
FROM 
    income
JOIN 
    patient ON income.patient = patient.patient_id
JOIN 
    doctors d ON income.doctor = d.doctor_id
WHERE 
    income.id = '$id';"; */
?>
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="row">

        <div class="col-md-12">
          <h5 class="text-center my-2">View Invoice</h5>

          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <?php

                      if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $query = "DELETE From income
WHERE 
    income.id = '$id'";
                        $result = mysqli_query($connect, $query);
                        
                      }
                    
                    ?>