<?php
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