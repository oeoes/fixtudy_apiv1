<?php
	include_once "../auth/authentication.php";
	$auth = new Authentication();

	// GET id_user
	$a =[];
	$id_user = $auth->cleanRequest($_GET['id_user']);
	$res = $auth->viewData("SELECT name FROM user WHERE id_user='$id_user'");
	array_push($a, $res[0]['name']);
	$mentor = implode(",", $a);

	/*
	* Request $_POST[''];
	*/
	$class_name = $auth->cleanRequest($_POST['class_name']);
	$class_loc = $auth->cleanRequest($_POST['class_loc']);
	$class_date = $auth->cleanRequest($_POST['class_date']);
	$class_time = $auth->cleanRequest($_POST['class_time']);
	$class_desc = $auth->cleanRequest($_POST['class_desc']);
	$class_payment = $auth->cleanRequest($_POST['class_payment']);
	$quota = $auth->cleanRequest($_POST['quota']);
	/*
	*
	*
	*/

	$auth->validateRequest(array($class_name, $class_loc, $class_date, $class_time, $class_desc, $class_payment, $quota));
	
	$query = $auth->createData("INSERT INTO class(id_user, class_name, class_loc, class_date, class_time, class_desc, class_payment, quota, mentor) VALUES ('$id_user', '$class_name', '$class_loc', '$class_date', '$class_time', '$class_desc', '$class_payment', '$quota', '$mentor')");

	if ($query == true) {
		$result = [];
		$hasil = $auth->viewData("SELECT * FROM class WHERE id_user='$id_user'");
		
		$result['code'] = 200;
		$result['message'] = 'CREATED';
		$result['data'] = $hasil;

		echo json_encode($result);
	}

 ?>