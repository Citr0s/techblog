<?php
namespace Techblog;

use Input;

class User
{
	public static function attemptLogin(){
		$expected = ['email', 'password'];
		Input::check($_POST, $expected);

		//find email in db
		//check if passwords match
		//check if active
		//update updated_at field
	}	
}