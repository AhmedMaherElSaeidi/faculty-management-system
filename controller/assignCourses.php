<?php
include '../models/functions.php';
include_once '../include/DatabaseClass.php';
$db = new database();

countValues("0");
$subcode = isempty(val($_POST["subject"]));
$professor_id = isempty(val($_POST["profname"]));
$hall = isempty(val($_POST["hall"]));
$day = isempty(val($_POST["day"]));
$time = isempty(val($_POST["time"]));

$num = countValues(null);
if ($db->isAssignCourse($day, $hall, $time)) {
    $db->close();
    header("location:../views/assign_course.php?message=At $time the $hall isn't available On $day.");
} elseif ($num != null) {
    $db->close();
    header("location:../views/assign_course.php?message=Course wasn't assigned *All fields are reqired");
} else {
    $query = "INSERT INTO assign_courses (professor_id,course_code,Hall,day,start_time) values('$professor_id','$subcode','$hall','$day','$time')";
    $check = $db->insert($query);
    $db->close();
    if ($check) {
        header("location:../views/assign_course.php?message=Course was assigned successfuly.");
    } else {
        header("location:../views/assign_course.php?message=Error couldn't assign course.");
    }
}
