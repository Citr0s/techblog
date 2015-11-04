<?php
	require 'vendor/autoload.php';
	include 'src/config.php';

	use Techblog\User;
	use Techblog\Database;

	include 'inc/header.php';
?>
<h1>Techblog</h1>
<p><?php echo User::test(); ?></p>
<?php
	include 'inc/footer.php';
?>