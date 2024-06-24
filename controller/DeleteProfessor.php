<?php
include '../models/functions.php';
include '../include/DatabaseClass.php';
$db = new database();
$user_name = val($_GET["user_name"]);

$db->connect();
$query = "DELETE FROM professor where username = '$user_name' ";
$check = $db->delete($query);

if ($check) {
    $db->close();
    header("location:../views/professorInDept.php?message=Record Deleted.");
} else {
    $db->close();
    header("location:../views/professorInDept.php?Error couldn't delete record.");
}
