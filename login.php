<?php require './include/header.php' ?>

<h2>Sign In</h2>

<?php if (isset($_REQUEST['error'])) { ?>
	<div class="alert alert-danger" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<span class="sr-only">Error:</span> 
		Authentication failed
	</div>
<?php } ?>

<form action="login-action.php" method="POST" class="form-inline">
	<div class="form-group">
		<label class="sr-only" for="username">Username</label>
		<input type="text" id="username" name="username" class="form-control" placeholder="Username">
	</div>
	<div class="form-group">
		<label class="sr-only" for="username">Password</label>
		<input type="password" id="password" name="password" class="form-control" placeholder="Password">
	</div>
	
	<?php if ($_REQUEST['destination'] != null) { ?>
		<input type="hidden" name="destination" value="<?= htmlspecialchars($_REQUEST['destination']) ?>">
	<?php } ?>
	<button type="submit" class="btn btn-default">Sign In</button>
</form>

<?php require 'include/footer.php' ?>