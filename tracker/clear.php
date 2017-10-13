<?php
    session_start();

    $methods = array('PUT', 'OPTIONS');
	if (! in_array($_SERVER['REQUEST_METHOD'], $methods)) {
		http_response_code(405);
		exit;
	}

    // DEMO: CORS Vulnerability
    // UNSAFE
    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods: PUT');
    
    // SAFE
    /*
    $whitelist = array('https://demo', 'https://demo2');
	if (in_array($_SERVER['HTTP_ORIGIN'], $whitelist)) {
        header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: PUT');
        header('Vary: Origin');
    }
    */

    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        exit;
    }

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