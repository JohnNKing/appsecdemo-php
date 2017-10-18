<?php
    // DEMO: CORS Vulnerability #1
    // UNSAFE
    header('Access-Control-Allow-Origin: *');

    // ALSO UNSAFE
    // header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);

    // ALSO NOT SUFFICIENT
    /*
    $whitelist = array('https://demo', 'https://demo2');
	if (in_array($_SERVER['HTTP_ORIGIN'], $whitelist)) {
        header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
    }
    */

    // SAFE    
    /*
    $whitelist = array('https://demo', 'https://demo2');
	if (in_array($_SERVER['HTTP_ORIGIN'], $whitelist)) {
        header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
        header('Access-Control-Allow-Methods: PUT');
        header('Vary: Origin');
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        exit;

    } else if ($_SERVER['REQUEST_METHOD'] != 'PUT') {
        http_response_code(405);
        exit;
    }
    */



    $db = new PDO('sqlite:../data/db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $stmt = $db->prepare('UPDATE hits set count = count + 1');
        $stmt->execute();

        $stmt = $db->prepare('SELECT * from hits');
        $stmt->execute();

        $row = $stmt->fetch();
        print $row['count'];

    } catch (PDOException $e) {
		    error_log($e);
		    http_response_code(500);
		    die("An error occurred");
    }
?>