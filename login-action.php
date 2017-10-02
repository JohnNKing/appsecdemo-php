<?php
	require_once 'include/start.php';

	require_once 'classes/user.php';
	require_once 'classes/user-manager.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		http_response_code(405);
		exit;
	}

	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];

	if (($username != null) && ($username != '') && ($password != null) && ($password != '')) {

		try {
			if (UserManager::getUser($username)) {

				// Yes, the password is the username. This is intentionally insecure.
				if (strtolower($username) == strtolower($password)) { 

					session_regenerate_id();
					$_SESSION['username'] = $username;

					$destination = $_REQUEST['destination'];
					if ($destination == '') {
						$destination = '.';
					}

					// A10 Unvalidated Redirects and Forwards
					// ==== UNSAFE without this ====
					$whitelist = array('.', 'add-mod.php');
					if (! in_array($destination, $whitelist)) {
						$destination = '.';
					}
					// =============================

					header("Location: " . $destination);
					exit;
				}
			}
		} catch (PDOException $e) {
			error_log($e);
			http_response_code(500);
			die("An error occurred");
		}
	}

	header('Location: login.php?error');
?>
