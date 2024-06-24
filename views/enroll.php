<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "student") { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Enroll</title>
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
                    <li><a href="" title="home"><i class="fas fa-home"></i></a></li>
                    <li><a href="" title="contact us"><i class="fas fa-phone"></i></a></li>
                    <li><a href="" title="about us"><i class="fas fa-info"></i></a></li>
                </ul>
            </nav>
        </div>
        <h2 style="text-align: center;">Courses Registeration form</h2>
        <table>
            <thead>
                <tr>
                    <th>Course name</th>
                    <th nowrap>Course code</th>
                    <th>Description</th>
                    <th>Professor</th>
                    <th>Hall</th>
                    <th>Time</th>
                    <th>Day</th>
                    <th>Enrollment</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../include/DatabaseClass.php';
                $db = new database();

                $query = "SELECT course.level_id,assign_courses.id,course.name,course.code,course.description,professor.firstname,professor.lastname,assign_courses.Hall,assign_courses.start_time,assign_courses.day FROM ((assign_courses JOIN course ON course.code = assign_courses.course_code) JOIN professor ON professor.national_id=assign_courses.professor_id)
                HAVING course.level_id =(SELECT student.level_id FROM student WHERE student.username = '{$_SESSION['username']}')";
                $result = $db->selectQuery($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $prof = $row["firstname"] . " " . $row["lastname"];
                ?>
                        <tr>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["code"]; ?></td>
                            <td><?php echo $row["description"]; ?></td>
                            <td><?php echo $prof; ?></td>
                            <td nowrap><?php echo $row["Hall"]; ?></td>
                            <td><?php echo $row["start_time"]; ?></td>
                            <td><?php echo $row["day"]; ?></td>
                            <?php if (!$db->isEnrolled($_SESSION['username'], $row["code"], $row['id'])) { ?>
                                <td><a class="btn btn-primary" href="../controller/registerCourses.php?
                        value[]=<?php echo $_SESSION['username']; ?>
                        &value[]=<?php echo $row["code"]; ?>
                        &value[]=<?php echo $row['id']; ?>
                        &value[]=<?php echo $row['day']; ?>
                        &value[]=<?php echo $row['start_time']; ?>">Enroll</a></td>
                            <?php } else { ?>
                                <td>
                                    <p class="btn btn-warning">Enrolled</p>
                                </td>
                        </tr>
                <?php }
                        } ?>
            <?php } else { ?>
                <td align="center" colspan="11"><?php echo "Zero results*"; ?></td>";
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
            <p style="color:white;">Copyright &copy; 2021, Code Addict</p>
        </footer>
    </body>

    </html>


<?php
} else {
    header("location:../index.php");
}
?>