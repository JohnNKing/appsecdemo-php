<?php
class Comment {

	private $id;
	private $comment;
	private $username;
	
	public function __construct($id, $comment, $username) {
		$this->id = $id;
		$this->comment = $comment;
		$this->username = $username;
	}

	public function getId() {
		return $this->id;
	}

	public function getComment() {
		return $this->comment;
	}

	public function setComment($comment) {
		$this->comment = $comment;
	}

	public function getUsername() {
		return $this->username;
	}

	public function setUsername($username) {
		$this->username = $username;
	}
}
?>