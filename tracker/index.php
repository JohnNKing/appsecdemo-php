<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tracker</title>
</head>

<body>

	<?php if (isset($_REQUEST['error'])) { ?>
		<div>Authentication failed</div>
	<?php } ?>

	<form action="login.php" method="POST">
		<input type="text" id="username" name="username" placeholder="Username"><br>
		<input type="password" id="password" name="password" placeholder="Password"><br>
		<button type="submit" class="btn btn-default">Sign In</button>
	</form>

</body>