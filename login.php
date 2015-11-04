<?php
	use Techblog\User;

	include 'inc/header.php';


	if($_POST){
		echo 'posted';
	}
?>
<h1>Login</h1>
<form method="post" action="login.php">
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" id="email" placeholder="Email" required>
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" id="password" placeholder="Password" required>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
<?php
	include 'inc/footer.php';
?>