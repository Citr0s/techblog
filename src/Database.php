<?php
namespace Techblog;

use Exception;
use mysqli;

class Database
{
	private static function connect(){
		$host = 'localhost';
		$username = 'homestead';
		$password = 'secret';
		$database = 'techblog';

		$connection = new mysqli($host, $username, $password, $database);

		try{
			if(!$connection){
				throw new Exception("Could not establish connection with database.");
			}
			return $connection;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public static function add($id, $name, $message, $timestamp){
		try{
			$query = "SELECT * FROM guestbook WHERE '{$name}' = name AND '{$message}' = message";
			$result = self::connect()->query($query);
			if($result->num_rows <= 0){
				$query = "INSERT INTO guestbook (id, name, message, timestamp) VALUES ('{$id}', '{$name}', '{$message}', '{$timestamp}')";
				if(!self::connect()->query($query)){
					throw new Exception("Could not add records to db.");
				}
			}
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public static function get($items, $from){
		$query = "SELECT {$items} FROM {$from}";
		return self::connect()->query($query);
	}
}