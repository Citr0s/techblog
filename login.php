<?php
	use Techblog\User;
	use Techblog\Database;

	if($_POST){
		echo 'posted';
	}

	include 'inc/header.php';
?>
<h1>Login</h1>
<form method="post" action="login.php">
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" id="email" placeholder="Email">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" id="password" placeholder="Password">
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
<?php
	include 'inc/footer.php';
?>