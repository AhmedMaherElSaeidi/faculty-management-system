<?php
include '../models/functions.php';
include_once '../include/DatabaseClass.php';

$db = new database();
$id = isempty(val($_POST["submit"]));
$grade = isempty(val($_POST["grade"]));

if (empty($grade)) {
    header("location:../views/studentsAnswers.php?message=Error : NullGradeException.");
} else {
    $query = "UPDATE enrollment SET grades = '$grade' WHERE enroll_id = '$id';";
    $check = $db->insert($query);
    $db->close();
    if ($check) {
        header("location:../views/studentsAnswers.php?message=Grade Submitted Successfuly.");
    } else {
        header("location:../views/studentsAnswers.php?message=Encountered error while submitting grade.");
    }
}
