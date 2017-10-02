<?php
	require_once 'include/start.php';

	require_once 'classes/comment.php';
	require_once 'classes/comment-manager.php';
	
	if ($_SESSION['username'] == null) {
		header('Location: login.php');
		exit;
	}

	$id = $_REQUEST['id'];
	if (($id != '') && is_numeric($id)) {

		try {
			CommentManager::setDB($GLOBALS['db']);
			CommentManager::removeComment($id);

		} catch (PDOException $e) {
			error_log($e);
			http_response_code(500);
			die("An error occurred");
		}
	}
	
	header('Location: ./');
?>
