<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "admin") { ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Professor</title>
    <!-- Latest compiled and minified CSS -->
    <link href="../css/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e6688e278c.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../images/assets/logo.png" />
    <link rel="stylesheet" href="../css/fourpages.css" />
  </head>

  <body>
    <div class="navbar">
      <div class="logo">
        <a href="#"><img src="../images/assets/helwan.jpg" alt="" width="80px" /></a>
      </div>
      <nav class="the rest">
        <ul id="MenuItems">
          <li>
            <a href="admin_view.php" title="return"><i class="fa fa-arrow-left"></i></a>
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
    <h1>New professor</h1><br>
    <div class="container">
      <form action="../controller/addProfessor.php" method="POST">
        <label for="fname">First name</label>
        <input type="text" id="fname" name="fname" /><br /><br />
        <label for="lname">Last name</label>
        <input type="text" id="lname" name="lname" /><br /><br />
        <label for="degree">Degree</label>
        <input type="text" id="degree" name="degree" /><br /><br />

        <div>
          <p>Gender</p>
          <div style="float: left;margin-right:10px">
            <input type="radio" id="female" name="gender" value="female" />
            <label for="female">Female</label><br /><br />
          </div>
          <div style="float: left;margin-right:10px">
            <input type="radio" id="male" name="gender" value="male" />
            <label for="male">Male</label><br /><br />
          </div>
          <div>
            <input type="radio" id="other" name="gender" value="other" />
            <label for="other">Other</label><br /><br />
          </div>
        </div>

        <label for="ssn">National id</label>
        <input type="text" id="ssn" name="ssn" /><br /><br />
        <label for="birthday">Date of birth</label>
        <input type="date" id="birthday" name="birthday" /><br /><br />
        <!--SELECT-->
        <label for="dept_id">Department</label>
        <select id="dept_id" name="dept_id">
          <option value="" disabled selected hidden>Select Department</option>
          <?php
          include '../include/DatabaseClass.php';
          $db = new database();
          $sql = " SELECT * FROM department ";
          $result = $db->selectQuery($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
            <?php } ?>
          <?php } else { ?>
            <option value="null">Null</option>
          <?php }
          $db->close(); ?>
        </select>
        <!--/SELECT-->
        <br /><br />
        <label for="username">Username</label>
        <input type="text" id="username" name="username" /><br /><br />
        <label for="password">Password</label>
        <input type="text" id="password" name="password" /><br /><br />
        <input type="submit" name="submit" value="Add Professor">
      </form>
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
            if (isset($_GET["message"])) {
              include '../models/functions.php';
              $msg = val($_GET["message"]);
              echo $msg;
            }
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
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
      <p style="color:white;">Copyright &copy; 2021, Code Addict</p>
    </footer>
  </body>

  </html>
<?php
} else {
  header("location:../index.php");
}
?>