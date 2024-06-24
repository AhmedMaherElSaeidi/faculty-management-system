<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "student") { ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transcript</title>
    <!-- Latest compiled and minified CSS -->
    <link href="../css/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/e6688e278c.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../images/assets/logo.png" />
    <link rel="stylesheet" href="../css/tables.css" />
  </head>

  <body>
    <div class="navbar">
      <div class="logo"><img src="../images/assets/helwan.jpg" alt="" width="80px" />
      </div>
      <nav class="the rest">
        <ul id="MenuItems">
          <li>
            <a href="student_view.php" title="return"><i class="fa fa-arrow-left"></i></a>
          </li>
          <li>
            <a href="#" title="home"><i class="fas fa-home"></i></a>
          </li>
          <li>
            <a href="" title="contact us"><i class="fas fa-phone"></i></a>
          </li>
          <li>
            <a href="" title="about us"><i class="fas fa-info"></i></a>
          </li>
        </ul>
      </nav>
    </div>
    <h2 style="text-align: center">Courses with grades</h2>
    <table>
      <thead>
        <tr>
          <th>Course code</th>
          <th>Course name</th>
          <th nowrap>Credit hours</th>
          <th>Degree(100)</th>
          <th>Grade</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include '../include/DatabaseClass.php';
        include '../models/functions.php';
        $db = new database();

        $sql = "SELECT student_id,name,course_id,grades FROM enrollment 
          JOIN course ON course_id=course.code
          WHERE student_id = '{$_SESSION['username']}';";
        $result = $db->selectQuery($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
              <td nowrap><?php echo $row["course_id"]; ?></td>
              <td nowrap><?php echo $row["name"]; ?></td>
              <td><?php echo 2; ?></td>
              <?php if (!empty($row['grades'])) { ?>
                <td><?php echo $row["grades"]; ?></td>
                <td><?php echo grading($row["grades"]); ?></td>
              <?php } else { ?>
                <td colspan="2">
                  <div class="btn-warning">Not Available*</div>
                </td>
              <?php } ?>
            <?php } ?>
          <?php } else { ?>
            <td align="center" colspan="5"><?php echo "No Courses Were Registered*"; ?></td>";
          <?php }
        $db->close(); ?>
            </tr>
      </tbody>
    </table>
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