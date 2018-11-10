<?php
	include "../auth/authentication.php";

	$auth = new Authentication();

	$id_attendies = $_POST['id_attendies'];
	$id_user = $_POST['id_user'];

	// cancle class
	$query = "DELETE FROM attendies WHERE id_attendies = '$id_attendies' AND id_user = '$id_user'";
	$auth->deleteData($query);

 ?>