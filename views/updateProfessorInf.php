<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "admin") { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Professor Info</title>
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
                        <a href="professorInDept.php" title="return"><i class="fa fa-arrow-left"></i></a>
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
        <?php
        include '../models/functions.php';
        include '../include/DatabaseClass.php';

        $db = new database();
        $user_name = val($_GET["user_name"]);
        $sql = "SELECT * FROM professor WHERE username='$user_name'";
        $row = $db->select($sql);

        if ($row['username'] === $user_name) {
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $fullname = $firstname . " " . $lastname;

            $degree = $row['degree'];
            $gender = $row['gender'];
            $ssn = $row['national_id'];
            $birthday = $row['DOB'];

            $dept_id = $row['dept_id'];
            $sql = " SELECT name FROM department WHERE id = '$dept_id'; ";
            $dept = $db->select($sql);
            $dept_name = $dept["name"];

            $username = $row['username'];
            $password = $row['password'];
        }
        ?>
        <h1>Update Professor <?php echo $fullname; ?></h1>
        <div class="container">
            <form action="../controller/updateProfessor.php" method="POST">
                <label for="fname">First name</label>
                <input type="text" id="fname" name="fname" value="<?php echo $firstname; ?>" /><br /><br />
                <label for="lname">Last name</label>
                <input type="text" id="lname" name="lname" value="<?php echo $lastname; ?>" /><br /><br />
                <label for="degree">Degree</label>
                <input type="text" id="degree" name="degree" value="<?php echo $degree; ?>" /><br /><br />

                <label for="ssn">National id</label>
                <input type="text" id="ssn" name="ssn" value="<?php echo $ssn; ?>" /><br /><br />
                <label for="birthday">Date of birth</label>
                <input type="date" id="birthday" name="birthday" value="<?php echo $birthday; ?>" /><br /><br />
                <label for="dept_id">Department</label>
                <select id="dept_id" name="dept_id">
                    <option value="<?php echo $dept_id; ?>" selected><?php echo $dept_name; ?></option>
                    <?php
                    $sql = "SELECT * FROM department";
                    $result = $db->selectQuery($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($dept_name == $row["name"]) {
                                continue;
                            }
                    ?>
                            <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                        <?php } ?>
                    <?php } else { ?>
                        <option value="null">Null</option>
                    <?php }
                    $db->close(); ?>
                </select>
                <br /><br />
                <!-- <br /><br />
                <label for="username">Username</label>
                <input type="text" id="username" name="new_username" value="" /><br /><br />
                <label for="password">Password</label>
                <input type="text" id="password" name="password" value="" /><br /><br /> -->
                <button type="submit" class="btn btn-success" style="width: 100%;" name="submit" value="<?php echo $username; ?>">Update</button>
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