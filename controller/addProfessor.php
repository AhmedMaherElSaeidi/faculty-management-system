<?php
include '../include/DatabaseClass.php';
include '../models/functions.php';
$db = new database();

countValues("0");
$fname = isempty(val($_POST["fname"]));
$lname = isempty(val($_POST["lname"]));
$degree = isempty(val(strtoupper($_POST["degree"])));
$gender = isempty(val($_POST["gender"]));
$ssn = isempty(val($_POST["ssn"]));
$birthday = isempty(val($_POST["birthday"]));
$dept_id = isempty(val($_POST["dept_id"]));
$username = isempty(val($_POST["username"]));
$password = isempty(val($_POST["password"]));

$num = countValues(null);

if ($num != null) {
    $db->close();
    header("location:../views/professor_insertion_form.php?message=Couldn't add professor *All fields are reqired");
} else {
    $name = $fname . " " . $lname;
    $query = "INSERT INTO professor (firstname,lastname,degree,gender,national_id,DOB,dept_id,username,password) VALUES ('$fname','$lname', '$degree', '$gender', '$ssn', '$birthday','$dept_id','$username', '$password');";
    $check = $db->insert($query);
    if ($check) {
        $db->close();
        header("location:../views/professor_insertion_form.php?message=Professor $name were added");
    } else {
        $db->close();
        header("location:../views/professor_insertion_form.php?message=Duplicate entry for key 'PRIMARY', couldn't add $name. $query");
    }
    $db->close();
}
