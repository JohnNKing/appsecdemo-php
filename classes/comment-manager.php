<?php
require_once ('classes/comment.php');

class CommentManager {

	private static $db;

	public static function setDB($db) {
		self::$db = $db;
	}

	/*
	 * Get a list of all comments
	 */
	public static function getComments() {
		$result = array();

		try {
			$stmt = self::$db->prepare('select * from comments');
			$stmt->execute();
			$rs = $stmt->fetchAll();

			foreach ($rs as $row) {
				$result[] = new Comment($row['id'], $row['comment'], $row['username']);
			}

		} catch (PDOException $e) {
			throw $e;
		}

		return $result;
	}

	/*
	 * Add a comment
	 */
	public static function addComment($comment) {

		try {
			// A1 Injection
			// UNSAFE
			$stmt = self::$db->query("INSERT INTO comments (comment, username) VALUES ('{$comment->getComment()}', '{$comment->getUsername()}');");
			// SAFE
			//$stmt = self::$db->prepare('INSERT INTO comments (comment, username) VALUES (?, ?)');
			//$stmt->execute(array($comment->getComment(), $comment->getUsername()));
			    
		} catch (PDOException $e) {
			throw $e;
		}
	}

	/*
	 * Remove a comment
	 */
	public static function removeComment($id) {

		try {
			$stmt = self::$db->prepare('DELETE FROM comments WHERE id = ?');
			$stmt->execute(array($id));
			    
		} catch (PDOException $e) {
			throw $e;
		}
	}
}
