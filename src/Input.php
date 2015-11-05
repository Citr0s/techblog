<?php
namespace Techblog;

use Exception;

class Input
{
	/*
		Checks if email is valid.
		@param <string> $email
		@return <bool> $result
	*/
	private static function isValidEmail($email){
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			throw new Exception("Valid email address required.");
		}
		return true;
	}

	/*
		Checks if strings match is valid.
		@param <string> $password
		@param <string> $password_confirm
		@return <bool> $result
	*/
	private static function doPasswordsMatch($password, $password_confirm){
		if($password !== $password_confirm){
			throw new Exception("Passwords do not match.");
		}
		return true;
	}

	/*
		Checks if any fields are empty.
		@param <array> $input
		@param <array> $expected
		@return <bool> $result
	*/
	private static function hasEmptyInputs($input, $expected){
		foreach($input as $field){
			if(in_array($field, $expected) && empty($field)){
				throw new Exception("Fields marked with (*) are required.");
			}
		}
		return true;
	}
	/*
		Sanitises input.
		@param <array> $input
		@return <array> $input
	*/
	private static function sanitise($input){
		foreach($input as $field => $value){
			if($field === 'email'){
				self::isValidEmail($value);
			}
			htmlentities($field);
		}

		return $input;
	}

	/*
		Checks for correct input.
		@param <array> $input
		@param <array> $expected
		@return <array> $input
	*/
	public static function check($input, $expected){
		self::hasEmptyInputs($input, $expected);
		(isset($input['password']) && isset($input['password_confirm'])) ? self::doPasswordsMatch($input['password'], $input['password_confirm']) : '';
		return self::sanitise($input);
	}
}