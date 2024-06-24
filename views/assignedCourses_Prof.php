<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "professor") { ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>professor Courses</title>
    <!-- Latest compiled and minified CSS -->
    <link href="../css/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e6688e278c.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../images/assets/logo.png" />
    <link rel="stylesheet" href="../css/tables.css" />
  </head>

  <body>
    <div class="navbar">
      <div class="logo">
        <img src="../images/assets/helwan.jpg" alt="" width="80px" />
      </div>
      <nav class="the rest">
        <ul id="MenuItems">
          <li><a href="professor_view.php" title="return"><i class="fa fa-arrow-left"></i></a></li>
          <li><a href="#" title="home"><i class="fas fa-home"></i></a></li>
          <li><a href="" title="contact us"><i class="fas fa-phone"></i></a></li>
          <li><a href="" title="about us"><i class="fas fa-info"></i></a></li>
        </ul>
      </nav>
    </div>
    <div align="center">
      <h2 style="text-align:center">Courses Table</h2>
      <table style="margin-left:0%;">
        <thead>
          <tr>
            <th>Course</th>
            <th nowrap>Course Code</th>
            <th>Hall</th>
            <th nowrap>Start Time</th>
            <th>day</th>
            <th>Question</th>
            <th>Upload</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../include/DatabaseClass.php';
          $db = new database();

          $query = "SELECT * FROM assign_courses INNER JOIN course 
          ON course_code = code INNER JOIN professor 
          ON professor_id=national_id 
          AND professor.username = '{$_SESSION['username']}';";
          $result = $db->selectQuery($query);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <tr>
                <td nowrap><?php echo $row["name"]; ?></td>
                <td><?php echo $row["code"]; ?></td>
                <td nowrap><?php echo $row["Hall"]; ?></td>
                <td><?php echo $row["start_time"]; ?></td>
                <td><?php echo $row["day"]; ?></td>
                <?php if (!empty($row["question"])) { ?>
                  <td colspan="2">
                    <div class="btn-warning">You can only upload question once</div>
                  </td>
                <?php } else { ?>
                  <form action="../controller/addQuestion.php" method="post">
                    <td><textarea type="text" id="question" name="question" placeholder="<?php echo $row["question"]; ?>" cols="35" rows="3"></textarea></td>
                    <td><button class="btn btn-success" type="submit" name="submit" value="<?php echo $row["id"] ?>">Upload</button></td>
                  </form>
                <?php } ?>
              </tr>
            <?php } ?>
          <?php } else { ?>
            <td align="center" colspan="6"><?php echo "You don't have courses to teach*"; ?></td>";
          <?php }
          $db->close(); ?>
        </tbody>
      </table>
    </div>
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