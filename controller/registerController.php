<?php

include '../include/DatabaseClass.php';
include '../models/functions.php';
$db = new database();
countValues("0");

$name = val(isempty($_POST["name"]));
$age = val(isempty($_POST["age"]));
$phone = val(isempty($_POST["phonenumber"]));
$level = val(isempty($_POST["level"]));
$email = val(isempty($_POST["email"]));
$password = val(isempty($_POST["password"]));

$num = countValues();
if ($num != null) {
    $db->close();
    header("location:../views/register_login_form.php?message=Couldn't register <br>*All fields are reqired&header=Registeration Failed");
} else {
    $query = "INSERT INTO student (fullname,age,phone_number,level_id,username,password) 
            VALUES ('$name','$age','$phone','$level','$email','$password')";
    $check = $db->insert($query);
    if ($check) {
        $db->close();
        header("location:../views/register_login_form.php?message=Successfuly registered $name&header=Successful Registeration");
    } else {
        $db->close();
        header("location:../views/register_login_form.php?message=Ugh ,Sorry $name<br>We encountered a problem with registering you.&header=Registeration Failed");
    }
}
