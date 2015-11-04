<?php
namespace Techblog;

use Exception;
use mysqli;

class Database
{
	/*
		Connects to a database.
		@return <object> $response
	*/
	private static function connect(){
		$connection = new mysqli(host, username, password, database);

		try{
			if(!$connection){
				throw new Exception("Could not establish connection with database.");
			}
			return $connection;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	/*
		Creates database table.
		@param <array> $table
		@return <string> $result
	*/
	public static function seed($table){
		$query = '';

		foreach($table as $name => $column){
			switch($name){
				case 'name':
					$query .= "CREATE TABLE " . $column . ' ( ';
					break;
				default:
					foreach($column as $name => $col){
						$query .= $name . ' ' . $col . ', ';
					}
					$query = rtrim($query, ', ');
					break;
			}
		}

		$query .= ' );';

		return self::connect()->query($query) == 1 ? 'Done!' : 'Failed!';
	}
}