<?php
require_once ('classes/user.php');

class UserManager {
	
	/*
	 * Get a list of all users
	 */
	public static function getUsers() {
		$result = array();

		try {
			$stmt = $GLOBALS['db']->prepare('select * from users');
			$stmt->execute();
			$rs = $stmt->fetchAll();

			foreach ($rs as $row) {
				$result[] = new User($row['name']);
			}

		} catch (PDOException $e) {
			throw $e;
		}

		return $result;
	}

	/*
	 * Get a particular user
	 */
	public static function getUser($name) {
		$result = null;

		try {
			$stmt = $GLOBALS['db']->prepare('select * from users where name = ?');
			$stmt->execute(array($name));
			if ($row = $stmt->fetch()) {
				$result = new User($row['name']);
			}

		} catch (PDOException $e) {
			throw $e;
		}

		return $result;
	}	

	/*
	 * Add a user
	 */
	public static function addUser($user) {

		try {
			$stmt = $GLOBALS['db']->prepare('INSERT INTO users VALUES (?)');
			$stmt->execute(array($user->getName()));

		} catch (PDOException $e) {
			throw $e;
		}
	}
}
?>