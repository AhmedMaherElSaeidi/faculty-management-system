<?php
include '../include/DatabaseClass.php';
include '../models/functions.php';
$db = new database();

countValues("0");
$id = isempty(val($_POST["lvlid"]));
$name = isempty(val($_POST["lvlname"]));
$num = countValues(null);

if ($num != null) {
    header("location:../views/addNewWholeLevel.php?message=Couldn't add level *All fields are reqired");
} else {
    $query = "INSERT INTO level (id,name) VALUES ('$id','$name');";
    if ($db->insert($query)) {
        header("location:../views/addNewWholeLevel.php?message=Level Inserted Successfully.");
    } else {
        header("location:../views/addNewWholeLevel.php?message=Encountered error while insertion");
    }
    $db->close();
}
