
<?php 
	
	include_once "authentication.php";

	$auth = new Authentication();

	$email_user = $auth->cleanRequest($_POST['email_user']);
	$password_user = $auth->cleanRequest($_POST['password_user']);

	$auth->validateRequest(array($email_user, $password_user));

	$query = $auth->loginUser("SELECT * FROM user WHERE email_user='$email_user' and password_user='$password_user'");

	if(count($query))
	{
		$has = $auth->viewData("SELECT id_user, name, email_user, created FROM user WHERE id_user='$query[id_user]'");
		
		// array that collects data
		$result = [];

		$result['code'] = 200;
		$result['message'] = 'Login Success';
		$result['data'] = $has;

		echo json_encode($result);
	}


 ?>