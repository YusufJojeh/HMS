<?php
session_start();
?>

<body>
  <?php

include( 'sidenav.php' );
include( '../include/header.php' );
include( '../include/connection.php' );
?>

  <div class='page container-fluid bg-dark text-white'>
    <div class='col-md-12'>
      <div class='row justify-content-center'>

        <div class='col-md-12'>
          <h5 class='my-3 fw-bold'>Patient Dashboard</h5>
          <div class='col-md-12'>
            <div class='row justify-content-center'>
              <!-- My Profile Section -->
              <div class='col-lg-3 col-md-5 col-sm-10 mx-3 p-3 navigation bg-primary text-white rounded shadow-sm'>
                <div class='d-flex align-items-center justify-content-between'>
                  <h5 class='mb-0'>My Profile</h5>
                  <a href='profile.php'>
                    <i class='fa fa-user-circle fa-3x text-white'></i>
                  </a>
                </div>
              </div>

              <!-- Book Appointment Section -->
              <div class='col-lg-3 col-md-5 col-sm-10 mx-3 p-3 bg-warning text-white rounded shadow-sm'>
                <div class='d-flex align-items-center justify-content-between'>
                  <h5 class='mb-0'>Book Appointment</h5>
                  <a href='appointment.php'>
                    <i class='fa fa-calendar fa-3x text-white'></i>
                  </a>
                </div>
              </div>

              <!-- My Invoice Section -->
              <div class='col-lg-3 col-md-5 col-sm-10 mx-3 p-3 bg-success text-white rounded shadow-sm'>
                <div class='d-flex align-items-center justify-content-between'>
                  <h5 class='mb-0'>My Invoice</h5>
                  <a href='invoice.php'>
                    <i class='fa fa-file-invoice-dollar fa-3x text-white'></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <?php include( '../include/footer.php' );
?> -->
</body>

</html>