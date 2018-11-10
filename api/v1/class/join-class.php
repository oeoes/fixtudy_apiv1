<?php
	include "../auth/authentication.php";

	$auth = new Authentication();

	/*
	* @GET idClass
	*
	*/
	$id_class = $auth->cleanRequest($_POST['id_class']);
	$id_user = $auth->cleanRequest($_POST['id_user']);


	// join class
	$query = "INSERT INTO attendies(id_user, id_class) VALUES ('$id_user', '$id_class')";
	$hasil = $auth->createData($query);


	if($hasil == true)
	{
		$result = [];
		$has = $auth->joined($id_user, $id_class);
		
		$result['code'] = 200;
		$result['message'] = 'JOINED';
		$result['data'] = $has;

		echo json_encode($result);
	}

 ?>