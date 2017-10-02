<?php
	require_once 'include/start.php';
	session_regenerate_id();
	session_destroy();
	header('Location: ./');
?>
