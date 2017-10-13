<?php
    session_start();

    // DEMO: CORS Vulnerability
    $origin = $_SERVER['HTTP_ORIGIN'];
    // UNSAFE
    header('Access-Control-Allow-Origin: ' . $origin);
    header('Access-Control-Allow-Credentials: true');
    // SAFE
    /*
	$whitelist = array('https://demo', 'https://demo2');
	if (in_array($origin, $whitelist)) {
        header('Access-Control-Allow-Origin: ' . $origin);
        header('Access-Control-Allow-Credentials: true');
    }
    */

	if ($_SESSION['username'] == null) {
		http_response_code(403);
		exit();
	}

    $db = new PDO('sqlite:../data/db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $stmt = $db->prepare('UPDATE hits set count = 0');
        $stmt->execute();

    } catch (PDOException $e) {
		error_log($e);
		http_response_code(500);
		die("An error occurred");
    }
?>