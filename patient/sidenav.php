<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Dashborad </title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/master.css" rel="stylesheet">
  <link href="../css/framework.css" rel="stylesheet">
  <!-- <link href="../Bootstrap/all.min.css" rel="stylesheet">
  <link href=" ../Bootstrap/bootstrap.min.css" rel="stylesheet"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect " href="https://fonts.googelapis.com">
  <link rel="preconnect" href="https://font.gstatic.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&family=Open+Sans:wght@400;600;700&family=Roboto:wght@100;300;500&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">

</head>
<div class="page d-flex fw-bold">
  <div class="sidebar bg-white p-20 p-relative">
    <h3 class="p-relative txt-c mt-0">
      <a href="index.php">
        <img src="img/Logo.jpeg" class="mx-0" style="border-radius:50%; height:80px;width:80px;">
      </a>
    </h3>
    <ul>
      <li>
        <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="index.php">
          <i class="fa-solid fa-house fa-fw"></i><span>Dashboard</span>
        </a>
      </li>
      <li>
        <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="profile.php">
          <i class="fa-solid fa-user fa-fw"></i><span>Profile</span>
        </a>
      </li>
      <li>
        <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" data-bs-toggle="modal"
          data-bs-target="#exampleModal">
          <i class="fa-solid fa-paper-plane fa-fw"></i><span>Send Report</span>
        </a>
      </li>
      <li>
        <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="invoice.php">
          <i class="fa-solid fa-file-invoice-dollar fa-fw"></i><span>Invoice</span>
        </a>
      </li>
      <li>
        <a class="d-flex align-center fs-14 c-black rad-6 p-10 text-decoration-none" href="report.php">
          <i class="fa-solid fa-book fa-fw"></i><span>Reports</span>
        </a>
      </li>
    </ul>
  </div>



  <!--SideBar-->
  <!-- <div class="list-group  sidebar" style="height:270vh;">
  <a href="index.php" class="list-group-item list-group-item-action sidebar text-center text-white">
    Dashborad
  </a>
  <a href="profile.php" class="list-group-item list-group-item-action sidebar text-center text-white">
    Profile
  </a>
  <a href="invoice.php" class="list-group-item list-group-item-action sidebar text-center text-white">
    Invoice
  </a>
  <a href="appointment.php" class="list-group-item list-group-item-action sidebar text-center text-white">
    Appointment
  </a>
  <a href="report.php" class="list-group-item list-group-item-action sidebar text-center text-white">
    Report
  </a>

</div> -->

  <!--ends-->



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
  </script>

</html>