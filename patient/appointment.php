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
  <title>Book Appointment</title>
</head>

<body>

  <?php
          include("sidenav.php");

  include("../include/connection.php");

?>

  <div class="page container-fluid bg-dark text-white">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <h5 class="text-center my-2 fw-bold">
            Book Appointment
          </h5>
          <?php
          
          $pat = $_SESSION['patient'];
          $sel= mysqli_query($connect,"SELECT * FROM patient WHERE user='$pat'");
          $row =mysqli_fetch_array($sel);

          $id = $row['patient_id'];
          $firstname = $row['firstname'];
          $surname = $row['surname'];
          $gender = $row['gender'];
          $phone = $row['phone'];

          if (isset($_POST['book'])) {
    $date = $_POST['date'];
    $symptoms = $_POST['sym'];
    $doctor = $_POST['appoint_doct'];

    // Validate symptoms
    if (empty($symptoms)) {
      echo '<div class="alert alert-danger" role="alert">
              Please enter symptoms.
            </div>';
    } else {
      // Date validation
      $currentDate = new DateTime();
      $appointmentDate = new DateTime($date);

      if ($appointmentDate <= $currentDate) {
        echo '<script>alert("Enter a valid future date or today, please.")</script>';

      } else {
        // Insert appointment into the database
        $query = "INSERT INTO appointment (appointment_date, symptoms, status, date_booked, patient, doctor)
                  VALUES ('$date', '$symptoms', 'Pending', NOW(), '$id', '$doctor')";
        $result = mysqli_query($connect, $query);

        if ($result) {
          echo "<script>alert('You have successfully booked an appointment!');</script>";
        } else {
          echo '<div class="alert alert-danger" role="alert">
                  Failed to book appointment. Please try again.
                </div>';
        }
      }
    }
  }
  ?>

          <div class="container-fluid bg-dark text-white py-4">
            <div class="col-md-12">
              <div class="row justify-content-center">
                <div class="col-md-6 jumbotron border border-primary shadow py-4">
                  <form method="post">
                    <div class="mb-3">
                      <label for="appointmentDate" class="form-label">Appointment Date</label>
                      <input type="date" id="appointmentDate" name="date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label for="symptoms" class="form-label">Symptoms</label>
                      <input type="text" id="symptoms" name="sym" class="form-control" placeholder="Enter Symptoms"
                        required>
                    </div>
                    <div class="mb-3">
                      <label for="doctor" class="form-label">Doctor</label>
                      <select id="doctor" name="appoint_doct" class="form-select" required>
                        <option selected>Select Your Doctor</option>
                        <?php
                $doctorQuery = "SELECT doctor_id, firstname, surname FROM doctors WHERE status='Approved'";
                $doctorResult = mysqli_query($connect, $doctorQuery);

                while ($doctor = mysqli_fetch_array($doctorResult)) {
                  echo "<option value='{$doctor['doctor_id']}'>{$doctor['firstname']} {$doctor['surname']}</option>";
                }
                ?>
                      </select>
                    </div>
                    <div class="d-grid">
                      <button type="submit" name="book" class="btn btn-primary">Book Appointment</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


          <script src="../Bootstrap/bootstrap.bundle.min.js"></script>

</body>

</html>