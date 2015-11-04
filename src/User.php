<?php
namespace Techblog;

use Exception;
use Techblog\Input;
use Techblog\Database;

class User
{
	public static function attemptLogin(){
		$expected = ['email', 'password'];
		$data = Input::check($_POST, $expected);

		$query = [
			'select' => '*',
			'from' => 'users',
			];
		$data = $query + $data;

		if(!Database::find($data)){
			throw new Exception("Email or Password is incorrect.");
		}

		//find email in db
		//check if passwords match
		//check if active
		//update updated_at field
	}	
}