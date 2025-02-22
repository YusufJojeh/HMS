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

<body>
  <?php
  include("sidenav.php");
  include("../include/connection.php");
  ?>

  <div class="page container-fluid bg-dark text-white">
    <div class="col-md-12">
      <div class="row justify-content-center">

        <div class="col-md-12">
          <h5 class="my-3 fw-bold">Patient Dashboard</h5>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3  mx-5 navigation" style="height:150px;">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-8">
                      <h5 class="text-white my-4">My Profile</h5>
                    </div>
                    <div class="col-md-4">
                      <a href="profile.php">
                        <i class="fa fa-user-circle fa-3x my-4" style="color:white;"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 bg-warning mx-2 appointment" style="height:150px;">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-8">
                      <h5 class="text-white my-4">Book Appointment</h5>
                    </div>
                    <div class="col-md-4">
                      <a href="appointment.php">
                        <i class="fa fa-calendar fa-3x my-4" style="color:white;"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 bg-success mx-5 invoice" style="height:150px;">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-8">
                      <h5 class="text-white my-4">My Invoice</h5>
                    </div>
                    <div class="col-md-4">
                      <a href="invoice.php">
                        <i class="fa fa-file-invoice-dollar fa-3x my-4" style="color:white;"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- <?php include("../include/footer.php");?> -->
</body>

</html>