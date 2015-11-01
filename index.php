<?php
	require 'vendor/autoload.php';

	use Techblog\User;
	use Techblog\Database;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Techblog</title>
</head>
<body>
	<h1>Techblog</h1>
	<p><?php echo User::test(); ?></p>
</body>
</html>