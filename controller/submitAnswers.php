<?php
if (empty($_FILES["file"]["name"])) {
    header("location:../views/viewCourses.php?message=You can't submit an empty file");
} else {
    include '../include/DatabaseClass.php';
    include '../models/functions.php';
    $db = new database();

    $id = val($_POST["submit"]);
    $file_name = rand(1000, 100000) . "-" . $_FILES["file"]["name"];
    $temporaryFileName = $_FILES["file"]["tmp_name"];
    $uploads_dir = '../uploads/stdtxt/' . $file_name;

    $fileType = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    $allowedTypes = array('txt', 'word', 'pdf', 'ppt');

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($temporaryFileName, $uploads_dir)) {
            $query = "UPDATE enrollment 
            SET enrollment.answers ='$uploads_dir'  
            WHERE enrollment.enroll_id='$id'";
            $check = $db->insert($query);
            if ($check) {
                $db->close();
                header("location:../views/viewCourses.php?message=File was uploaded successfuly");
            } else {
                $db->close();
                header("location:../views/viewCourses.php?message=Encountered error while uploading file");
            }
        }
    } else {
        $db->close();
        header("location:../views/viewCourses.php?message=Allowed extensions are : .pdf, .ppt, .txt & .word");
    }
}
