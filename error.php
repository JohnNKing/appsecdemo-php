<?php require './include/header.php' ?>
<?php
	$error = $_REQUEST['error'];
	if ($error == null) {
		$error = "An error occurred";
	}
?>

<div class="alert alert-danger" role="alert">
	<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	<span class="sr-only">Error:</span> 

	<?php // A3 Cross-Site Scripting (XSS) ?>
	<?php // UNSAFE ?>
	<?= $error ?>
	<?php // SAFE ?>
	<?php //= htmlspecialchars($error) ?>

</div>

<?php require 'include/footer.php' ?>