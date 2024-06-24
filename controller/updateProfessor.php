<?php
include '../models/functions.php';
include '../include/DatabaseClass.php';

$old_username = val($_POST["submit"]);
$firstname = val($_POST['fname']);
$lastname = val($_POST['lname']);
$degree = val(strtoupper($_POST['degree']));
$ssn = val($_POST['ssn']);
$birthday = val($_POST['birthday']);
$dept_id = val(strtoupper($_POST['dept_id']));
//$username = val($_POST['new_username']);
//$password = val($_POST['password']);

$db = new database();
$sql = "UPDATE professor SET firstname='$firstname',lastname='$lastname',
degree='$degree',national_id='$ssn',DOB='$birthday',dept_id='$dept_id'
WHERE username='$old_username'";
$check = $db->insert($sql);

if ($check) {
    $db->close();
    header("location:../views/professorInDept.php?message=Updated Successfuly");
} else {
    $db->close();
    header("location:../views/professorInDept.php?message=Couldn't update record.");
}
