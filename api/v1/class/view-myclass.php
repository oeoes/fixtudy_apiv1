<?php
	include_once "../auth/authentication.php";
	$auth = new Authentication();

	$id_user = $auth->cleanRequest($_GET['id_user']);	
	// view class based on active user
	$result = [];
	$hasil = $auth->viewData("SELECT * FROM class WHERE id_user='$id_user'");
	
	$result['code'] = 200;
	$result['message'] = 'OK';
	$result['data'] = $hasil;

	echo json_encode($result);
 ?>