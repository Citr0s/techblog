<?php
require 'vendor/autoload.php';
include 'src/config.php';

use Techblog\Database;

$users_table = [
	'name' => 'users',
	'columns' => [
		'id' => 'int(11)',
		'name' => 'varchar(50)',
		'password' => 'varchar(150)',
	]
];

echo Database::seed($users_table);