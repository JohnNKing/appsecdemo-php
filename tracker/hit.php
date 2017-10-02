<?php
    $db = new PDO('sqlite:../data/db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $stmt = $db->prepare('UPDATE hits set count = count + 1');
        $stmt->execute();

    } catch (PDOException $e) {
		error_log($e);
		http_response_code(500);
		die("An error occurred");
    }
?>