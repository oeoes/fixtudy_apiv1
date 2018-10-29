<?php
	include_once "../auth/authentication.php";
	$auth = new Authentication();

	$id_user = $auth->cleanRequest($_GET['id_user']);
	
	/* 
	* sort by due date filter by another users
	* view class except the active user's class
	*/
	$result = [];
	$query = $auth->viewData("SELECT * FROM class WHERE id_user!='$id_user' ORDER BY class_date ASC");

	$result['code'] = 200;
	$result['message'] = 'OK';
	$result['data'] = $query;

	echo json_encode($result);
	/*
	* Dari sini akan disediakan id class untuk join
	* @GET $getIdClass
	* kemudian akan diinsert ke table attendies
	*/

 ?>