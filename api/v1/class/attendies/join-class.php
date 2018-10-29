<?php
	include "../profile/app.php";

	/*
	* @GET idClass
	*
	*/
	$getIdClass = $_GET['getIdClass'];

	$id_user = $auth->getId('email_user', $auth->getAuthenticateUser(), 'user');

	// join class
	$query = "INSERT INTO attendies (id_user, id_class) VALUES ('$id_user', '$getIdClass')";
	$auth->createData($query);

 ?>