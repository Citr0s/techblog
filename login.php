<?php
	use Techblog\User;
	use Techblog\Input;

	include 'inc/header.php';


	if($_POST){
		try{
			$expected = ['email', 'password'];
			Input::check($_POST, $expected);
		}catch(Exception $e){
			echo '<div class="alert alert-danger" role="alert">' . $e->getMessage() . '</div>';
		}
	}
?>
<h1>Login</h1>
<form method="post" action="login.php">
	<div class="form-group">
		<label for="email">Email*</label>
		<input type="email" name="email" class="form-control" id="email" placeholder="Email" required value="<?php echo ($_POST) ? $_POST['email'] : ''; ?>">
	</div>
	<div class="form-group">
		<label for="password">Password*</label>
		<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
<?php
	include 'inc/footer.php';
?>