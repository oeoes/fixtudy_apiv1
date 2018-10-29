<?php
	include_once "../auth/authentication.php";

	$auth = new Authentication();

	$id_user = $auth->cleanRequest($_GET['id_user']);
	$id_class = $auth->cleanRequest($_GET['id_class']);


	$query = "DELETE FROM class WHERE id_user='$id_user' AND id_class='$id_class'";

    $auth->deleteData($query);

 ?>