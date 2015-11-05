<script>
	if(!confirm("Entering this page will reseed your database. Are you sure you want to proceed?")){
		window.location = history.back();
	}
</script>
<?php
require 'vendor/autoload.php';
include 'src/config.php';

use Techblog\Database;

$users_table = [
	'name' => 'users',
	'columns' => [
		'id' => 'int(11) NOT NULL AUTO_INCREMENT',
		'email' => 'varchar(50)',
		'password' => 'varchar(150)',
		'active' => 'boolean DEFAULT 1',
		'created_at' => 'timestamp',
		'updated_at' => 'timestamp',
		'' => 'PRIMARY KEY (id)'
	]
];

echo Database::seed($users_table);