<?php
	require_once 'include/start.php';

	require_once 'classes/comment.php';
	require_once 'classes/comment-manager.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		http_response_code(405);
		exit;
	}

	$comment = $_REQUEST['comment'];
	if (($comment != null) && ($comment != '')) {

		try {
			CommentManager::setDB($GLOBALS['db']);
			CommentManager::addComment(new Comment(-1, $comment, $_SESSION['username']));

		} catch (PDOException $e) {
			error_log($e);
			http_response_code(500);
			die("An error occurred");
		}
	}
	
	header('Location: ./');
?>