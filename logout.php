<?php
	use Techblog\User;
	include 'inc/header.php';

	User::logout($_SESSION['user']);
	header('Location: index.php');
?>