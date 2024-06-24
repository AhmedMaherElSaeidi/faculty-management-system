<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "admin") { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Professor_Dept</title>
        <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/e6688e278c.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" href="../images/assets/logo.png" />
        <link rel="stylesheet" href="../css/tables.css">
    </head>

    <body>
        <div class="navbar">
            <div class="logo">
                <a href=""><img src="../images/assets/helwan.jpg" alt="" width="80px"></a>
            </div>
            <nav class="the rest">
                <ul id="MenuItems">
                    <li><a href="admin_view.php" title="return"><i class="fa fa-arrow-left"></i></a></li>
                    <li><a href="" title="home"><i class="fas fa-home"></i></a></li>
                    <li><a href="" title="contact us"><i class="fas fa-phone"></i></a></li>
                    <li><a href="" title="about us"><i class="fas fa-info"></i></a></li>
                </ul>

            </nav>

        </div>

        <br><br><br><br>
        <?php
        include '../include/DatabaseClass.php';
        include '../models/functions.php';
        $db = new database();

        if (isset($_POST["search"])) {
            if (val($_POST["search"]) != "null") {
                $_SESSION["dept_id"] = val(strtoupper($_POST["search"]));
            } else {
                header("location:../views/admin_view.php?message=Please select a department first.");
            }
        }

        $sql = " SELECT name FROM department WHERE id = '{$_SESSION["dept_id"]}'; ";
        $dept = $db->select($sql);

        ?>
        <h2 style="text-align: center;">Professors in <?php echo $dept["name"]; ?></h2>

        <table style="margin-left: 10%;">
            <thead>
                <tr>
                    <th nowrap>Name</th>
                    <th>degree</th>
                    <th>gender</th>
                    <th>national_ID</th>
                    <th>DOB</th>
                    <th>username</th>
                    <th>password</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $dept_id = $_SESSION["dept_id"];
                $sql = "SELECT * FROM professor INNER JOIN department ON (dept_id = '$dept_id') = id ";
                $result = $db->selectQuery($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                ?>
                        <tr>
                            <td nowrap><?php echo $row["firstname"] . " " . $row["lastname"]; ?></td>
                            <td><?php echo $row["degree"]; ?></td>
                            <td><?php echo $row["gender"]; ?></td>
                            <td><?php echo $row["national_id"]; ?></td>
                            <td nowrap><?php echo $row["DOB"]; ?></td>
                            <td><?php echo $row["username"]; ?></td>
                            <td><?php echo $row["password"]; ?></td>
                            <td><a class="btn btn-primary" href="updateProfessorInf.php?user_name=<?php echo $row["username"] ?>">Update</a></td>
                            <td><a class="btn btn-danger" href="../controller/DeleteProfessor.php?user_name=<?php echo $row["username"] ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <td align="center" colspan="11"><?php echo "Zero results*"; ?></td>";
                <?php } ?>
            </tbody>
        </table>
        <?php $db->close(); ?>
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
            <p style="color:white;">Copyright &copy; 2021, Code Addict</p>
        </footer>
    </body>

    </html>
<?php
} else {
    header("location:../index.php");
}
?>