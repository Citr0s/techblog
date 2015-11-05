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
		self::drop($table['name']);
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
	/*
		Returs records from database.
		@param <array> $field
		@return <array> $data
	*/
	public static function find($field){
		$query = "";
		foreach($field as $item => $value){
			switch($item){
				case 'select':
					$query .= "SELECT {$value}";
					break;
				case 'from':
					$query .= " FROM {$value} WHERE ";
					break;
				case 'password':
					//do nothing
					break;
				case 'password_confirm':
					//do nothing
					break;
				default:
					$query .= "{$item} = '{$value}' AND ";
					break;
			}
		}
		$query = rtrim($query, ' AND ');
		return self::connect()->query($query);
	}

	/*
		Create records in database.
		@param <array> $field
		@return <array> $data
	*/
	public static function create($field){
		$query = "INSERT INTO {$field['to']} VALUES ( '', ";
		foreach($field as $item => $value){
			switch($item){
				case 'to':
					//do nothing
					break;
				case 'password':
					$query .= "'".sha1($value) . "', ";
					break;
				case 'password_confirm':
					//do nothing
					break;
				default:
					$query .= "'{$value}', ";
					break;
			}
		}
		switch($field['to']){
			case 'users':
				$query .= "1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP";
				break;
			default:
				$query = rtrim($query, ' AND ');
				break;

		}
		$query .= ' );';
		return self::connect()->query($query);
	}

	/*
		Check if row exists.
		@param <array> $data
		@return <bool> $result
	*/
	public static function exists($data){
		$results = Database::find($data);

		if($results->num_rows === 0){
			return false;
		}
		return true;
	}

	/*
		Drops passed table.
		@param <string> $table
	*/
	private static function drop($table){
		$query = "DROP TABLE {$table}";
		self::connect()->query($query);
	}
}