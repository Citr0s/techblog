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
		Checks if actual match expected inputs.
		@param <array> $input
		@param <array> $expected
		@return <bool> $result
	*/
	private static function hasEnoughInputs($input, $expected){
		if(count($input) !== count($expected)){
			throw new Exception("All inputs are required.");
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
		self::hasEnoughInputs($input, $expected);
		self::hasEmptyInputs($input, $expected);
		return self::sanitise($input);
	}
}