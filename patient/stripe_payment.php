<?php
session_start();
require('../vendor/autoload.php'); // Include Stripe library

// Include header and connection
include("../include/header.php");
include("../include/connection.php");

// تعطيل عرض الأخطاء على الشاشة
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL); // تسجيل جميع الأخطاء
ini_set('log_errors', 1); // تمكين تسجيل الأخطاء
ini_set('error_log', '/path/to/error_log'); // تحديد ملف سجل الأخطاء

// Assuming $connect is your database connection
if(isset($_POST['pay'])){
$stmt = $connect->prepare("UPDATE appointment SET status = 'Discharge' WHERE id = ?");
$stmt1 = $connect->prepare("UPDATE income SET checked = 1 WHERE id = ?");

if ($stmt && $stmt1) { // Corrected variable name $stms1 to $stmt1
$id = $_GET['id']; // Fetch the ID from the URL parameter
$stmt->bind_param("i", $id); // Bind $id as an integer to the first query
$stmt1->bind_param("i", $id); // Bind $id as an integer to the second query

if ($stmt->execute() && $stmt1->execute()) {
// Redirect to the view page with the updated ID
header("Location: view.php?id=" . $id);
exit();
} else {
// Handle execution error for both statements
echo "Error executing queries: " . $stmt->error . " | " . $stmt1->error;
}
} else {
// Handle preparation error for both statements
echo "Error preparing statements: " . $connect->error;
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
  <div class="container my-5">
    <h2 class="text-center">Make a Payment</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label for="amount">Payment Amount (USD):</label>
        <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter amount" required>
      </div>
      <button type="submit" class="btn btn-primary w-100" name="pay">Pay Now</button>
    </form>
  </div>

  <script src="https://js.stripe.com/v3/"></script>
</body>

</html>