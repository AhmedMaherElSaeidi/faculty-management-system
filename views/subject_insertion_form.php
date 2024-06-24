<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "admin") { ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Subject</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
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
    <h1>Add new subject</h1><br>
    <div class="container">
      <form action="../controller/addSubject.php" method="post">
        <label for="subname">Subject name</label>
        <input type="text" id="subname" name="subname" /><br /><br />
        <label for="subcode">Subject code</label>
        <input type="text" id="subcode" name="subcode" /><br /><br />
        <label for="description">Description</label>
        <input type="text" id="description" name="description" /><br /><br />
        <!-- Select -->
        <label for="level">Level</label>
        <select id="level" name="level">
          <option value="" disabled selected hidden>Choose level</option>
          <?php include '../include/DatabaseClass.php';
          $db = new database();
          $sql = "SELECT * FROM level";
          $result = $db->selectQuery($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
          ?>
              <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
            <?php } ?>
          <?php } else { ?>
            <option value="null"> Null</option>
          <?php } ?>
        </select>
        <!-- /Select -->
        <br /><br />
        <!-- Select -->
        <!--SELECT-->
        <label for="semester">Semester</label>
        <select id="semester" name="semester">
          <option value="" disabled selected hidden>Semester</option>
          <?php
          $sql = "SELECT * FROM semester";
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
        <input type="submit" name="submit" value="Add subject" />
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