<?php
	include 'inc/header.php';

	use Techblog\User;
?>
<h1>Techblog</h1>
<?php
	if(User::loggedIn()){
		echo '<p><a href="logout.php">Logout</a></p>';
	}else{
		echo '<p><a href="login.php">Login</a></p>';
	}
?>
<?php
	include 'inc/footer.php';
?>