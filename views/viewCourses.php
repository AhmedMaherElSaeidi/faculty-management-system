<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "student") { ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Courses</title>
    <!-- Latest compiled and minified CSS -->
    <link href="../css/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e6688e278c.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../images/assets/logo.png" />
    <link rel="stylesheet" href="../css/tables.css" />
  </head>

  <body>
    <div class="navbar">
      <div class="logo">
        <a href="#"><img src="../images/assets/helwan.jpg" alt="" width="80px"></a>
      </div>
      <nav class="the rest">
        <ul id="MenuItems">
          <li><a href="student_view.php" title="return"><i class="fa fa-arrow-left"></i></a></li>
          <li><a href="#" title="home"><i class="fas fa-home"></i></a></li>
          <li><a href="" title="contact us"><i class="fas fa-phone"></i></a></li>
          <li><a href="" title="about us"><i class="fas fa-info"></i></a></li>
        </ul>
      </nav>
    </div>

    <h2 style="text-align: center">Courses Table</h2>

    <table>
      <thead>
        <tr>
          <th>Course name</th>
          <th>Course code</th>
          <th>Description</th>
          <th>Professor</th>
          <th>Day</th>
          <th>FROM</th>
          <th>TO</th>
          <th>Hall</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include '../include/DatabaseClass.php';
        include '../models/functions.php';
        $db = new database();

        $query = "SELECT enrollment.enroll_id,assign_courses.id,course.name,course.code,course.description,professor.firstname,professor.lastname,assign_courses.Hall,assign_courses.day,assign_courses.start_time,assign_courses.question,enrollment.answers FROM (((assign_courses JOIN course ON course.code = assign_courses.course_code) 
        JOIN enrollment ON enrollment.assign_id =assign_courses.id) JOIN professor ON professor.national_id = assign_courses.professor_id)
        HAVING enrollment.enroll_id IN (SELECT enrollment.enroll_id FROM enrollment WHERE enrollment.student_id ='{$_SESSION['username']}')";
        $result = $db->selectQuery($query);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $prof = $row["firstname"] . " " . $row["lastname"];
        ?>
            <tr>
              <td nowrap><?php echo $row["name"]; ?></td>
              <td><?php echo $row["code"]; ?></td>
              <td nowrap><?php echo $row["description"]; ?></td>
              <td nowrap><?php echo $row["firstname"] . " " . $row["lastname"]; ?></td>
              <td><?php echo $row["day"]; ?></td>
              <td><?php echo $row["start_time"]; ?></td>
              <?php
              $end_time;
              $etime = array("08:00:00", "10:00:00", "12:00:00", "14:00:00", "16:00:00");
              $size = count($etime);
              for ($i = 0; $i < $size; $i++) {
                if (!strcmp(val($row["start_time"]), val($etime[$i]))) {
                  $end_time = $etime[$i + 1];
                  break;
                }
              }
              ?>
              <td><?php echo $end_time; ?></td>
              <td nowrap><?php echo $row["Hall"]; ?></td>
            </tr>
          <?php } ?>
        <?php } else { ?>
          <td align="center" colspan="8"><?php echo "No Courses Were Registered*"; ?></td>";
        <?php } ?>
      </tbody>
    </table>
    <!--------------------------->
    <h2 style="text-align: center">Assignments</h2>
    <table>
      <thead>
        <tr>
          <th>Course name</th>
          <th>Course code</th>
          <th>Assignment</th>
          <th colspan="2">Your Answer</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $query = "SELECT enrollment.enroll_id,assign_courses.id,course.name,course.code,course.description,professor.firstname,professor.lastname,assign_courses.Hall,assign_courses.day,assign_courses.start_time,assign_courses.question,enrollment.answers FROM (((assign_courses JOIN course ON course.code = assign_courses.course_code) 
        JOIN enrollment ON enrollment.assign_id =assign_courses.id) JOIN professor ON professor.national_id = assign_courses.professor_id)
        HAVING enrollment.enroll_id IN (SELECT enrollment.enroll_id FROM enrollment WHERE enrollment.student_id ='{$_SESSION['username']}')";
        $result = $db->selectQuery($query);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
              <td nowrap><?php echo $row["name"]; ?></td>
              <td><?php echo $row["code"]; ?></td>
              <td><?php echo $row["question"]; ?></td>
              <?php if (!empty($row["answers"])) { ?>
                <td colspan="2">
                  <div class="btn-warning">You can only upload your answers once</div>
                </td>
              <?php } elseif (empty($row["question"])) { ?>
                <td colspan="2">
                  <div class="btn-warning">There's no assignment yet</div>
                </td>
              <?php } else { ?>
                <form action="../controller/submitAnswers.php" method="post" enctype="multipart/form-data">
                  <td><input type="file" name="file"></td>
                  <td><button class="btn btn-success" type="submit" name="submit" value="<?php echo $row["enroll_id"]; ?>">Upload</button></td>
                </form>
              <?php } ?>
            </tr>
          <?php } ?>
        <?php } else { ?>
          <td align="center" colspan="5"><?php echo "No Courses Were Registered*"; ?></td>";
        <?php }
        $db->close(); ?>
      </tbody>
    </table>

    <!-- Modal -->
    <div class="modal" id="exampleModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Message</h5>
            <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php
            if (isset($_GET['message'])) {
              $msg = $_GET['message'];
              echo $msg;
            }
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../css/bootstrap-4.6.1/js/bootstrap.min.js"></script>


    <?php if (isset($msg)) {
      $url = strtok($_SERVER['REQUEST_URI'], '?');
    ?>
      <script>
        console.log("yes");
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'))
        myModal.show()

        // remove query string
        window.history.pushState({}, '', '<?php echo $url; ?>');
      </script>
    <?php } ?>
    <footer>
      <p style="color: white">Copyright &copy; 2021, Code Addict</p>
    </footer>
  </body>

  </html>

<?php
} else {
  header("location:../index.php");
}
?>