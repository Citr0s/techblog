<?php
	use Techblog\User;
	use Techblog\Input;

	include 'inc/header.php';


	if($_POST){
		$expected = ['email', 'password'];
		if(!Input::check($_POST, $expected)){
			echo '<div class="alert alert-danger" role="alert">There were errors with your input. Please correct and try again.</div>';
		}
	}
?>
<h1>Login</h1>
<form method="post" action="login.php">
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" class="form-control" id="email" placeholder="Email"  value="<?php echo ($_POST) ? $_POST['email'] : ''; ?>">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="password" class="form-control" id="password" placeholder="Password" >
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
<?php
	include 'inc/footer.php';
?>