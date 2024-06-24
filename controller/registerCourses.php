<?php
include '../include/DatabaseClass.php';
include '../models/functions.php';

$db = new database();
$array = $_GET["value"];
$std_username = val($array[0]);
$subjectCode = val($array[1]);
$assignID = val($array[2]);
$day = val($array[3]);
$time = val($array[4]);

if ($db->isScheduledInSameTime($std_username, $day, $time)) {
    header("location:../views/enroll.php?message=Can't enroll in $subjectCode ,Because it's interfered with another course.");
} else {
    $query = "INSERT INTO enrollment (student_id,course_id,assign_id) VALUES ('$std_username','$subjectCode','$assignID');";
    $check = $db->insert($query);
    if ($check) {
        header("location:../views/enroll.php?message=Enrolled successfuly.");
    } else {
        header("location:../views/enroll.php?message=Error couldn't enroll.");
    }
}
