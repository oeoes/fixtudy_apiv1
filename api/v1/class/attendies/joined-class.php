<?php
	include "../profile/app.php";

	$id_user = $auth->getId('email_user', $auth->getAuthenticateUser(), 'user');

	// tampilkan daftar kelas yang diikuti
	$query = "SELECT * FROM attendies WHERE id_user= '$id_user'";
	$auth->viewData($query);

	/*
	* akan disediakan id untuk di kirim ke 
	* halaman pembatalan class
	*/

 ?>