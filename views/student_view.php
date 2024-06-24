<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "student") { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student</title>
        <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/e6688e278c.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" href="../images/assets/logo.png" />
        <link rel="stylesheet" href="../css/admin.css" />

    </head>

    <body>
        <div class="navbar">
            <div class="logo">
                <img src="../images/assets/helwan.jpg" alt="" width="80px">
            </div>

            <nav class="the rest">
                <ul id="MenuItems">
                    <li><a href="#" title="home"><i class="fas fa-home"></i></a></li>
                    <li><a href="../controller/LogoutController.php?SignOut=true"><i class="fa fa-sign-out"></i></a></li>
                    <li><a href="" title="contact us"><i class="fas fa-phone"></i></a></li>
                    <li><a href="" title="about us"><i class="fas fa-info"></i></a></li>
                </ul>
            </nav>
        </div>
        <h1 style="font-size: 40px;text-align: center;font-weight: bold;">Welcome <?php echo $_SESSION['name']; ?></h1>
        <div class="row2">
            <div class="col2">
                <p>Here you can view<br>all your registered courses!</p>
                <a href="viewCourses.php" class="btn">view courses</a>
            </div>
            <div class="col2">
                <img src="../images/subjects.jpg" alt="img">
            </div>
        </div>

        <div class="row2">
            <div class="col2">
                <img src="../images/register.jpg" alt="img">
            </div>
            <div class="col2">
                <h1>Registration</h1>
                <br>
                <p style="font-size:26px;"><b>Helping students with registration.</b></p>
                <p style="font-size:24px;">The Office of the University Registrar (OUR) is here !
                    to support students with the registration process by providing guidelines
                    To register course press the button add courses
                </p>
                <a href="enroll.php" class="btn">Add Course</a>
            </div>
        </div>
        <div class="row2">
            <div class="col2">
                <p> University <b> Time Schedule</b>
                    For information on how to read the Time Schedule view the Time Schedule Legend.
                    <br>
                    To view time schedule press button view time schedule
                </p>
                <a href="viewtimetable.php" class="btn">View time schedule</a>
            </div>
            <div class="col2">
                <img src="../images/project-manager-with-time-schedule-as-background-vector-21939720.jpg" alt="img">
            </div>
        </div>
        <div class="row2">
            <div class="col3">
                <img src="../images/png-transparent-computer-icons-grading-in-education-test-school-quiz-text-logo-university.png" alt="img">
            </div>
            <div class="col3">
                <p>View the Courses with the grades </p>
                <a href="transcript.php" class="btn3">View grades</a>
            </div>

        </div>
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