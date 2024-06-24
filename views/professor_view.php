<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "professor") { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Professor</title>
        <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/e6688e278c.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" href="../images/assets/logo.png" />
        <link rel="stylesheet" href="../css/admin.css" />
    </head>

    <body>
        <div class="navbar">
            <div class="logo">
                <a href="#"><img src="../images/assets/helwan.jpg" alt="" width="80px"></a>
            </div>
            <nav class="the rest">
                <ul id="MenuItems">
                    <li><a href="" title="home"><i class="fas fa-home"></i></a></li>
                    <li><a href="../controller/LogoutController.php?SignOut=true" title="sign_out"><i class="fa fa-sign-out"></i></a></li>
                    <li><a href="" title="contact us"><i class="fas fa-phone"></i></a></li>
                    <li><a href="" title="about us"><i class="fas fa-info"></i></a></li>
                </ul>
            </nav>
        </div>

        <h1 sstyle="font-size: 20 px;text-align: center;font-weight: bold;">Welcome <?php echo $_SESSION['name']; ?></h1>
        <div class="row2">
            <div class="col2">
                <p>Here you can view<br>all the courses you going to teach!</p>
                <a href="assignedCourses_Prof.php" class="btn">View Courses</a>
            </div>
            <div class="col2">
                <img src="../images/subjects.jpg" alt="img">
            </div>
        </div>
        <div class="row2">
            <div class="col2">
                <img src="../images/png-transparent-computer-icons-grading-in-education-test-school-quiz-text-logo-university.png" alt="img">
            </div>
            <div class="col2">
                <p>Here you can view<br>Students answer files</p>
                <a href="studentsAnswers.php" class="btn">view students</a>
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