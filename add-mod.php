<?php
	require_once 'include/start.php';

	if ($_SESSION['username'] == null) {
		header('Location: login.php?destination=add-mod.php');
		exit();
	}
?>
<?php require './include/header.php' ?>

<h2>Add Moderator</h2>

<form id="form" action="add-mod-action.php" method="POST" class="form-inline">
	<div class="form-group">
		<label class="sr-only" for="username">Username</label>
		<input type="text" id="username" name="name" class="form-control" placeholder="Username">
	</div>
	<button type="submit" class="btn btn-default">Add</button>
</form>

<?php require 'include/footer.php' ?>