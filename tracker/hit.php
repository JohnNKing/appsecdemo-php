<?php
    $db = new PDO('sqlite:../data/db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $stmt = $db->prepare('UPDATE hits set count = count + 1');
        $stmt->execute();

        $stmt = $db->prepare('SELECT * from hits');
        $stmt->execute();

        $row = $stmt->fetch();

        header('Content-Type: image/svg+xml');
?>
<svg width="60" height="20" xmlns="http://www.w3.org/2000/svg">
   <g>
        <text x="5" y="15" fill="#000000"><?= $row['count'] ?> hits</text>
   </g>
 </svg>
<?php
    } catch (PDOException $e) {
		    error_log($e);
		    http_response_code(500);
		    die("An error occurred");
    }
?>