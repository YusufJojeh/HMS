<!DOCTYPE html>
<html lang="en">


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HMS</title>

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
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">


</>
<nav class=" navbar navbar-expand sticky-top ">
  <div class="container ">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main" aria-controls="main"
      aria-expanded="false" aria-label="Toggle navigation" style="color: white;
    
  border-color: white;">
      <i class="fa-solid fa-bars "></i>
    </button>
    <div class="  mr-auto collapse navbar-collapse " id="main">
      <ul class=" navbar-nav ms-auto">
        <?php
if(!isset($_SESSION['admin'])&&!isset($_SESSION['doctor'])&&!isset($_SESSION['patient']))
      {
        echo'<li class="nav-item nav-tabs mx-3"><a href="login.php" class="nav-link text-black "> Login </a></li>
              <li class="nav-item nav-tabs mx-3"><a href="index.php" class="nav-link text-black">Home</a></li>';
      }
     
         if(isset($_SESSION['admin'])){
            $user1 = $_SESSION['admin'];
          //  echo'<li class="nav-item nav-tabs mx-3"><a href="#" class="nav-link text-black ">' . $user1 . '</a></li>
          //     <li class="nav-item nav-tabs mx-3"><a href="logout.php" class="nav-link text-black">Logout</a></li>';
          echo '<li class="nav-item dropdown mx-3">
        <a class="nav-link dropdown-toggle text-black" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
        . htmlspecialchars($user1) .
        '</a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </li>';
         }
         elseif(isset($_SESSION['doctor'])){
            $user2 = $_SESSION['doctor'];
           echo'<li class="nav-item nav-tabs mx-3"><a href="#" class="nav-link text-black">' . $user2 . '</a></li>
               <li class="nav-item nav-tabs mx-3"><a href="logout.php" class="nav-link text-black">Logout</a></li>';
        }
         elseif(isset($_SESSION['patient'])){
          $user3 = $_SESSION['patient'];
          echo'<li class="nav-item nav-tabs mx-3"><a href="#" class="nav-link text-black">' . $user3 . '</a></li>
               <li class="nav-item nav-tabs mx-3"><a href="logout.php" class="nav-link text-black">Logout</a></li>';
         }

  ?>

      </ul>
    </div>
  </div>
</nav>




<body>










  <!-- <header>

    <nav class=" navbar navbar-expand sticky-top bg-primary navigation">
      <div class="container ">
        <a class="navbar-brand" href="#"><img src="img/Logo.jpeg" class="mx-0"
            style="border-radius:50%; height:80px;width:80px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main"
          aria-controls="main" aria-expanded="false" aria-label="Toggle navigation" style="color: white;
    font-size: 25px;
  border-color: white;">
          <i class="fa-solid fa-bars "></i>
        </button>
        <div class="  mr-auto collapse navbar-collapse " id="main">
          <ul class=" navbar-nav ms-auto">
            <?php
//         if(isset($_SESSION['admin'])){
//             $user1 = $_SESSION['admin'];
//           echo'<li class="nav-item nav-tabs mx-3"><a href="#" class="nav-link text-black ">' . $user1 . '</a></li>
//               <li class="nav-item nav-tabs mx-3"><a href="logout.php" class="nav-link text-black">Logout</a></li>';
//         }
//         elseif(isset($_SESSION['doctor'])){
//             $user2 = $_SESSION['doctor'];
//           echo'<li class="nav-item nav-tabs mx-3"><a href="#" class="nav-link text-black">' . $user2 . '</a></li>
//               <li class="nav-item nav-tabs mx-3"><a href="logout.php" class="nav-link text-black">Logout</a></li>';
//         }
//         elseif(isset($_SESSION['patient'])){
//           $user3 = $_SESSION['patient'];
//           echo'<li class="nav-item nav-tabs mx-3"><a href="#" class="nav-link text-black">' . $user3 . '</a></li>
//               <li class="nav-item nav-tabs mx-3"><a href="logout.php" class="nav-link text-black">Logout</a></li>';
//         }
//         else {
//           echo'
//         <li class="nav-item nav-tabs mx-3"><a href="index.php" class="nav-link text-black">Home</a></li>
//       <li class="nav-item nav-tabs mx-3"><a href="login.php" class="nav-link text-black">Login
      
// </a></li>'; 
//   }
  ?>

          </ul>

        </div>

      </div>

    </nav>


  </header> -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" //
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script> -->
  <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
  <script src="../Bootstrap/all.min.js"></script>
</body>

</html>