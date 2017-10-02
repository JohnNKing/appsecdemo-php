<?php
	require 'include/header.php';

	require_once 'classes/comment.php';
	require_once 'classes/comment-manager.php';
	require_once 'classes/user.php';
	require_once 'classes/user-manager.php';

	try {
		CommentManager::setDB($GLOBALS['db']);
		$comments = CommentManager::getComments();
		$users = UserManager::getUsers();

	} catch (PDOExeption $e) {
		error_log($e);
		http_response_code(500);
		die("An error occurred");
	}
?>

<div class="row">
<div class="col-xs-12 col-sm-9">

<h2>Comments</h2>
<ul class="list-group">
	<?php
		foreach ($comments as $comment) {
			$extraClass = '';

			if ($comment->getUsername() != '') {
				$extraClass = ' active';
			}
	?>
		<li class="list-group-item<?= $extraClass ?>">

			<? // A3 Cross-Site Scripting (XSS) ?>
			<? // UNSAFE ?>
			<?= $comment->getComment() ?>
			<? // SAFE ?>
			<?//= htmlspecialchars($comment->getComment()) ?>

			<?php if ($_SESSION['username'] != '') { ?>
				<a href="remove-comment-action.php?id=<?= htmlspecialchars($comment->getId()) ?>" class="close">&times</a>
			<?php } ?>

			<?php if ($comment->getUsername() != '') { ?>
				<span class="label"><?= htmlspecialchars($comment->getUsername()) ?></span>
			<?php } ?>
		</li>
	<?php } ?>
</ul>

<form id="form" action="add-comment-action.php" method="POST" class="">
	<div class="form-group">
		<textarea name="comment" class="form-control" placeholder="Your comment..."></textarea>
	</div>
	<button type="submit" class="btn btn-default">Post</button>
</form>

</div>
<div class="col-xs-12 col-sm-3">

<h4>Moderators</h4>
<ul class="list-group">
	<?php foreach ($users as $user) { ?>
		<li class="list-group-item"><?= htmlspecialchars($user->getName()) ?></li> 
	<?php } ?>
</ul>

</div>
</div>

<script src="https://tracker/demo/tracker/tracker.js"></script>

<?php require 'include/footer.php' ?>