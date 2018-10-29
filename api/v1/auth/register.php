<?php 

	include "authentication.php";

	$auth = new Authentication();

	// escape string
	$email_user = $auth->cleanRequest($_POST['email_user']);
    $name = $auth->cleanRequest($_POST['name']);
    $password_user = $auth->cleanRequest($_POST['password_user']);

    // validate request
    $auth->validateRequest(array($email_user, $name, $password_user));

    // prevent redundant email address
    $auth->isDoubleEmail($email_user);

    // if above validation passed then keep the user
    $query = $auth->createData("INSERT INTO user(email_user, name, password_user) VALUES('$email_user', '$name', '$password_user')");

	if ($query == true) {
		// langsung insert id relationship ke table student
		$id_user = $auth->getId('email_user', $email_user, 'user');
		$student = $auth->createData("INSERT INTO student (id_user, name) VALUES ('$id_user', '$name')");

		if ($student == true) {
			/*
			* returning response
			*
			*/
			$result = [];
			$hasil = $auth->viewData("SELECT id_user, name, email_user, created FROM user WHERE id_user='$id_user'");
			
			$result['code'] = 200;
			$result['message'] = 'CREATED';
			$result['data'] = $hasil;

			echo json_encode($result);
		}
	}

	

 ?>