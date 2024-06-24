<?php
include '../models/functions.php';

if (isset($_POST["submit"])) {
	include '../models/UsersClass.php';
	if (!empty($_POST['username']) && !empty($_POST['password'])) {
		$username = val($_POST['username']);
		$password = val($_POST['password']);
		$user = new users();
		$true = $user->login($username, $password);

		if ($true == true) {
			@$type =  $_SESSION['type'];
			if ($type == 'admin') {
				header("location: ../views/admin_view.php");
			} elseif ($type == 'student') {
				header("location: ../views/student_view.php");
			} elseif ($type == 'professor') {
				header("location: ../views/professor_view.php");
			}
		} else {
			$param = "false";
			header("location:../views/register_login_form.php?id=$param");
		}
	} else {
		$param1 = "Username or password is wrong!<br>Please login again";
		header("location:../views/register_login_form.php?message=$param1&header=Login failed");
	}
}
