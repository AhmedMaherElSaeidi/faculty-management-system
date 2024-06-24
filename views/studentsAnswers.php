<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "professor") { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Professor Students</title>
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
            <h2 style="text-align:center;">Courses Table</h2>
            <table style="margin-left: 0%">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th nowrap>Course Code</th>
                        <th>Student</th>
                        <th nowrap>Student ID</th>
                        <th>Answers</th>
                        <th colspan="2">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../include/DatabaseClass.php';
                    $db = new database();

                    $prof_username = $_SESSION['username'];
                    $sql = "SELECT enroll_id,fullname,student.username,name,course_id,answers,grades,assign_id FROM enrollment
                    INNER JOIN student ON student_id = student.username
                    INNER JOIN course ON course_id = code
                    HAVING assign_id IN (SELECT id FROM assign_courses WHERE professor_id = 
                    (SELECT national_id FROM professor WHERE username = '$prof_username'))";

                    $result = $db->selectQuery($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td nowrap><?php echo $row["name"]; ?></td>
                                <td nowrap><?php echo $row["course_id"]; ?></td>
                                <td nowrap><?php echo $row["fullname"]; ?></td>
                                <td nowrap><?php echo $row["username"]; ?></td>
                                <?php if (file_exists($row["answers"])) { ?>
                                    <td><a href="<?php echo $row["answers"]; ?>" class="btn btn-primary" download>Download Answers</a></td><?php } else { ?>
                                    <td nowrap>
                                        <div class="btn-secondary">No answers were uploaded</div>
                                    </td>
                                <?php } ?>
                                <?php if (!empty($row["grades"])) { ?>
                                    <td colspan=" 2">
                                        <div class="btn-warning">Grade Submitted</div>
                                    </td>
                                <?php } else { ?>
                                    <form action="../controller/addGrade.php" method="post">
                                        <td><select id="grade" name="grade">
                                                <option value="" disabled selected hidden>Grade</option>
                                                <?php
                                                for ($i = 1; $i <= 100; $i++) {
                                                ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select></td>
                                        <td><button class="btn btn-success" type="submit" name="submit" value="<?php echo $row["enroll_id"]; ?>">Submit</button></td>
                                    </form>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <td align="center" colspan="7"><?php echo "No students were found*"; ?></td>";
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