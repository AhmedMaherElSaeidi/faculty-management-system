<?php
session_start();
if ($_SESSION['username'] && $_SESSION['type'] == "student") { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Time Table</title>
        <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap-5.0.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <script src="https://kit.fontawesome.com/e6688e278c.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" href="../images/assets/logo.png" />
        <link rel="stylesheet" href="../css/tables.css" />
    </head>

    <body>
        <div class="navbar">
            <div class="logo"><img src="../images/assets/helwan.jpg" alt="" width="80px">
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
        <h2 style="text-align: center;">TimeTable</h2>
        <table>
            <thead>
                <tr align="center">
                    <td nowrap><i>Day/Period</i></td>
                    <td nowrap><i>8:00-10:00</i></td>
                    <td nowrap><i>10:00-12:00</i></td>
                    <td nowrap><i>12:00-2:00</i></td>
                    <td nowrap><i>2:00-4:00</i></td>
                    <td nowrap> <i>4:00-6:00</i></td>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../include/DatabaseClass.php';
                $db = new Database();
                ?>
                <tr align="center">
                    <td>
                        <b style="color: #46c2ab;">Saturday</b>
                    </td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Saturday', '08:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Saturday', '10:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Saturday', '12:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Saturday', '14:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Saturday', '16:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                </tr>
                <tr align="center">
                    <td>
                        <b style="color: white;">Sunday</b>
                    </td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Sunday', '08:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Sunday', '10:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Sunday', '12:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Sunday', '14:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Sunday', '16:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                </tr>
                <tr align="center">
                    <td>
                        <b style="color: #46c2ab;">Monday</b>
                    </td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Monday', '08:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Monday', '10:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Monday', '12:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Monday', '14:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Monday', '16:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                </tr>
                <tr align="center">
                    <td>
                        <b style="color: white;">Tuesday</b>
                    </td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Tuesday', '08:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Tuesday', '10:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Tuesday', '12:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Tuesday', '14:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Tuesday', '16:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                </tr>
                <tr align="center">
                    <td>
                        <b style="color: #46c2ab;">Wednesday</b>
                    </td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Wednesday', '08:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Wednesday', '10:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Wednesday', '12:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Wednesday', '14:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Wednesday', '16:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                </tr>
                <tr align="center">
                    <td>
                        <b style="color: white;">Thursday</b>
                    </td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Thursday', '08:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Thursday', '10:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Thursday', '12:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Thursday', '14:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                    <?php $row = $db->selectCourseTimeTable($_SESSION['username'], 'Thursday', '16:00:00'); ?>
                    <td nowrap><?php if ($row) {
                                    echo $row['name'] . "<br>" . $row['Hall'];
                                } ?></td>
                </tr>
                <?php $db->close(); ?>
            </tbody>
        </table>
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