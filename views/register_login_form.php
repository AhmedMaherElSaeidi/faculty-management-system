<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log-in & Registration</title>
  <!-- Latest compiled and minified CSS -->
  <link href="../css/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/e6688e278c.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/png" href="../images/assets/logo.png" />
  <link rel="stylesheet" href="../css/register_login_form.css" />
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
          <a href="../index.php" title="home"><i class="fas fa-home"></i></a>
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
  <h1 style="background: #f2f2f2;margin-top: 50px;">Log-in & Register</h1>
  <div class="login-page">
    <div class="form">
      <form class="Register-form" action="../controller/registerController.php" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Enter your name" /><br />
        <label for="email">E-mail</label>
        <input type="email" name="email" placeholder="Enter your e-mail" /><br />
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter password" /><br />
        <label for="age">Age</label>
        <input type="text" name="age" placeholder="Enter age" /><br />
        <label for="phnum">Phone-Number</label>
        <input type="text" name="phonenumber" placeholder="Enter phone-number" /><br />
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
        <button type="submit" name="submit" align="center">Register</button>
        <p class="message" align="center"> Already Registered ?<a href="#"> Log-in </a></p>
      </form>
      <form class="Log-in-form" action="../controller/loginController.php" method="POST">
        <label for="username">Username or E-mail</label>
        <input type="text" name="username" placeholder="Enter username" /><br />
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter password" id="password" /><br />
        <button type=" submit" name="submit" align="center">Log-in</button>
        <p class="message" align="center"> Not Registered ? <a href="#"> Register </a></p>
        </p>
      </form>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal" id="exampleModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo $_GET['header']; ?></h5>
          <button type="button" class="close btn btn-danger" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo $_GET['message']; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../css/bootstrap-4.6.1/js/bootstrap.min.js"></script>


  <?php if (isset($_GET['message'])) {
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

<script src="../js/jquery-3.3.1.min.js"></script>
<script>
  $(".message a").click(function() {
    $("form").animate({
      height: "toggle",
      opacity: "toggle"
    }, "medium");
  });
</script>
<script>
  function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>