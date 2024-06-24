<?php


class users
{

	private $name;
	private $username;
	private $password;
	private $type;
	private $db;

	function __construct()
	{
		include_once '../include/DatabaseClass.php';
		$this->db = new database();
	}


	function login($username, $password)
	{
		$this->username = $username;
		$this->password = $password;

		/* Search in admin */
		$sql = "SELECT * FROM admin
    	WHERE username = '$this->username'";
		$row = $this->db->select($sql);

		if ($row['password'] === $this->password) {
			session_start();
			$_SESSION['username'] = $row['username'];
			$_SESSION['type'] = $row['type'];
			$_SESSION['name'] = $row['name'];
			$this->db->close();
			return true;
		}

		/* Search in professor */
		$sql = "SELECT * FROM professor
    	WHERE username = '$this->username'";
		$row = $this->db->select($sql);

		if ($row['password'] === $this->password) {
			session_start();
			$_SESSION['username'] = $row['username'];
			$_SESSION['type'] = $row['type'];
			$_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
			$this->db->close();
			return true;
		}

		/* Search in student */
		$sql = "SELECT * FROM student
    	WHERE username = '$this->username'";
		$row = $this->db->select($sql);

		if ($row['password'] === $this->password) {
			session_start();
			$_SESSION['username'] = $row['username'];
			$_SESSION['type'] = $row['type'];
			$_SESSION['name'] = $row['fullname'];
			$this->db->close();
			return true;
		}
		/* if user not found */
		$this->db->close();
		return false;
	}

	function logout()
	{

		session_start();
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		unset($_SESSION['type']);
		session_destroy();
		header("location:../index.php");
		$this->db->close();
	}
}
