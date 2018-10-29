<?php 

	include "authentication.php";
	$auth = new Authentication();

	$id_user = $auth->cleanRequest($_GET['id_user']);

	$auth->logoutUser($id_user);

 ?>