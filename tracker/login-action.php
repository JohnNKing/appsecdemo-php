<?php
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		http_response_code(405);
		exit;
	}

	session_start();
    $GLOBALS['db'] = new PDO('sqlite:../data/db');
	$GLOBALS['db']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];

	// Intentionally insecure
	if (($username == 'John') && ($password == 'John')) {
		session_regenerate_id();
		$_SESSION['username'] = $username;
		
		header("Location: .");
		exit;
	}

	header('Location: .?error');
?>
