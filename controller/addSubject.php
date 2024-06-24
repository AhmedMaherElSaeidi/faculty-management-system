<?php
include '../models/functions.php';
include_once '../include/DatabaseClass.php';
$db = new database();

countValues("0");
$subname = isempty(val($_POST["subname"]));
$subcode = isempty(val($_POST["subcode"]));
$description = isempty(val($_POST["description"]));
$level_id = isempty(val($_POST["level"]));
$semester_id = isempty(val($_POST["semester"]));

$num = countValues(null);

if ($num != null) {
    header("location:../views/subject_insertion_form.php?message=Course wasn't added *All fields are reqired");
} else {
    $query = "INSERT INTO course (name,code,description,level_id,semester_id) VALUES ('$subname','$subcode','$description','$level_id','$semester_id');";
    $check = $db->insert($query);
    $db->close();
    if ($check) {
        header("location:../views/subject_insertion_form.php?message=Course was added successfuly.");
    } else {
        header("location:../views/subject_insertion_form.php?message=Error couldn't insert course. Duplicate entry for key 'PRIMARY'");
    }
}
