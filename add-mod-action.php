<?php
	require_once 'include/start.php';

	require_once 'classes/user.php';
	require_once 'classes/user-manager.php';

	// A8 Cross-Site Request Forgery (CSRF)				
	// ==== Doesn't prevent CSRF ====
	/* if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		http_response_code(405);
		exit;
	} */
	// ==============================

	if ($_SESSION['username'] == null) {
		header('Location: login.php');
		exit;
	}

	$name = $_REQUEST['name'];

	if (($name != null) && ($name != '')) {
		
		try {
			UserManager::addUser(new User($name));

		} catch (PDOException $e) {
			error_log($e);
			http_response_code(500);
			die("An error occurred");
		}
	}

	header('Location: ./');
?>
