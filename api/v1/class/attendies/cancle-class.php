<?php
	include "../profile/app.php";

	$getIdAttendance = $_GET['getIdAttendance'];

	// cancle class
	$query = "DELETE FROM attendies WHERE id_attendies=";
	$auth->deleteData($query, $getIdAttendance);

 ?>