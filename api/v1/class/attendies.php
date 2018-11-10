<?php
	include "../auth/authentication.php";

	$auth = new Authentication();

	$id_class = $_POST['id_class'];

	// tampilkan daftar kelas yang diikuti
	$result = [];
	$hasil = $auth->attendies($id_class);
	
	$result['code'] = 200;
	$result['message'] = 'OK';
	$result['data'] = $hasil;

	echo json_encode($result);



 ?>