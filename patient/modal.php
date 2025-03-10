<!-- modal.php -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Send Report</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
                    include("../include/connection.php");
                    if (isset($_POST['send'])) {
                        $doctor = $_POST['doctor'];
                        $title = $_POST['title'];
                        $message = $_POST['message'];
                        $img = $_FILES['img']['name'];
                        $file = $_FILES['file']['name'];

                        if (!empty($title) && !empty($message)) {
                            $user = $_SESSION['patient'];
                            $query = "INSERT INTO reports(doctor_id, patient_id, report_title, report_content, img, file) VALUES('$doctor','$user','$title','$message','$img','$file')";
                            $res = mysqli_query($connect, $query);
                            if ($res) {
                                echo "<script>alert('You Have Sent Your Report')</script>";
                                move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
                                move_uploaded_file($_FILES['file']['tmp_name'], "img/$file");
                            }
                        }
                    }
                ?>
        <form method="post" enctype="multipart/form-data">
          <label>Title</label>
          <input type="text" name="title" autocomplete="off" class="form-control"
            placeholder="Enter Title Of The Report">
          <label>Message</label>
          <input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter Message">
          <label>Photograph OF Test</label>
          <input type="file" name="img" autocomplete="off" class="form-control">
          <label>File OF Test</label>
          <input type="file" name="file" autocomplete="off" class="form-control">
          <label for="doctor" class="form-label">Doctor</label>
          <select id="doctor" name="doctor" class="form-select" required>
            <option selected>Select Your Doctor</option>
            <?php
                            $doctorQuery = "SELECT doctor_id, first_name, last_name FROM doctors WHERE status='approved'";
                            $doctorResult = mysqli_query($connect, $doctorQuery);
                            while ($doctor = mysqli_fetch_array($doctorResult)) {
                                echo "<option value='{$doctor['doctor_id']}'>{$doctor['first_name']} {$doctor['last_name']}</option>";
                            }
                        ?>
          </select>
          <input type="submit" name="send" value="Send Report" class="btn btn-primary my-3">
        </form>
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>