<?php 

if(isset($_GET["SignOut"])){
		include'../models/UsersClass.php';
		$user = new users();
		$user->logout();	
		}
		
?>