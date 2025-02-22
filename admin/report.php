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
  <title></title>
</head>

<body>
  <?php
  // include("../include/header.php");
              include("sidenav.php");

  include("../include/connection.php");
  ?>
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="row">

      </div>
      <div class="col-md-12">
        <h5 class="text-center my-2">Total Report</h5>
        <?php
          $query = "SELECT * FROM report";
          $res = mysqli_query($connect,$query);
          $output = "";
          $output .="
                <table class='table table-bordered'>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Username</th>
                    <th>Date Send</th>
                  </tr>
          ";

          if(mysqli_num_rows($res)<1){
            $output .="
            <tr>
              <td class='text-center' colspan='6'>No Report Yet</td>
            </tr>
            ";
          }
          while($row = mysqli_fetch_array($res)){
            $output .="
                  <tr>
                    <td>".$row['id']."</td>
                    <td>".$row['title']."</td>
                    <td>".$row['message']."</td>
                    <td>".$row['user']."</td>
                    <td>".$row['date_send']."</td>
                  
            ";
          }
$output .="
          </tr>
          </table>

";
echo $output;
          ?>
      </div>
    </div>
  </div>
  </div>




</body>

</html>