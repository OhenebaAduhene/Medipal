<?php

	//start_sessiom
	
	session_start();
	session_destroy();
	$_SESSION['user_id'] = false;

	header('Location: index.php');

?>