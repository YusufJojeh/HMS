<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Dashboard</title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/master.css" rel="stylesheet">
  <link href="../css/framework.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600&family=Open+Sans:wght@400;600;700&family=Roboto:wght@100;300;500&display=swap"
    rel="stylesheet">
</head>

<body>
  <div class="content w-full">
    <!-- Start Head -->
    <div class="head bg-white p-15 between-flex">

      <div class="icons d-flex align-center">
        <header>

          <nav class=" navbar navbar-expand sticky-top ">
            <div class="container ">

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main"
                aria-controls="main" aria-expanded="false" aria-label="Toggle navigation" style="color: white;
    font-size: 25px;
  border-color: white;">
                <i class="fa-solid fa-bars "></i>
              </button>
              <div class="  mr-auto collapse navbar-collapse " id="main">
                <ul class=" navbar-nav ms-auto">
                  <?php
        if(isset($_SESSION['admin'])){
            $user1 = $_SESSION['admin'];
          echo'<li class="nav-item nav-tabs mx-3"><a href="#" class="nav-link text-black ">' . $user1 . '</a></li>
              <li class="nav-item nav-tabs mx-3"><a href="logout.php" class="nav-link text-black"><i class="icon-signout mx-1"></i><span>Logout</span></a></li>';
        }
        elseif(isset($_SESSION['doctor'])){
            $user2 = $_SESSION['doctor'];
          echo'<li class="nav-item nav-tabs mx-3"><a href="#" class="nav-link text-black">' . $user2 . '</a></li>
              <li class="nav-item nav-tabs mx-3"><a href="logout.php" class="nav-link text-black"><i class="icon-signout mx-1"></i><span>Logout</span></a></li>';
        }
        elseif(isset($_SESSION['patient'])){
          $user3 = $_SESSION['patient'];
          echo'<li class="nav-item nav-tabs mx-3"><a href="#" class="nav-link text-black">' . $user3 . '</a></li>
              <li class="nav-item nav-tabs mx-3"><a href="logout.php" class="nav-link text-black"><i class="icon-signout mx-1"></i><span>Logout</span></a></li>';
        }
        else {
          echo'
        <li class="nav-item nav-tabs mx-3"><a href="index.php" class="nav-link text-black">Home</a></li>
      <li class="nav-item nav-tabs mx-3"><a href="login.php" class="nav-link text-black">Login
      
</a></li>'; 
  }
  ?>

                </ul>

              </div>

            </div>

          </nav>


        </header>
      </div>
    </div>
    <!-- Bootstrap JS & Font Awesome JS -->
    <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../Bootstrap/all.min.js"></script>

</body>

</html>