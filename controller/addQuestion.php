<?php
include '../include/DatabaseClass.php';
include '../models/functions.php';
$db = new database();

$question = val($_POST["question"]);
$id = val($_POST["submit"]);

if (empty($question)) {
    header("location:../views/assignedCourses_Prof.php?message=You can't upload an empty question");
} else {
    $query = "UPDATE assign_courses 
    SET question = '$question'
    WHERE id = '$id';";
    $check = $db->insert($query);
    if ($check) {
        header("location:../views/assignedCourses_Prof.php?message=Question Uploaded");
    } else {
        header("location:../views/professor_insertion_form.php?message=Couldn't Upload Question");
    }
    $db->close();
}
