<?php
namespace Techblog;

use Exception;

class Input
{
	/*
		Checks if email is valid.
		@param $email
	*/
	private static function isValidEmail($email){
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			throw new Exception("Valid email address required.");
		}
	}

	/*
		Checks if actual match expected inputs.
		@param <array> $input
		@param <array> $expected
	*/
	private static function hasEnoughInputs($input, $expected){
		if(count($input) !== count($expected)){
			throw new Exception("All inputs are required.");
		}
	}

	/*
		Checks if any fields are empty.
		@param <array> $input
	*/
	private static function hasEmptyInputs($input){
		foreach($input as $field){
			if(empty($field)){
				throw new Exception("All fields are requierd.");
			}
		}
	}
	/*
		Sanitises input.
		@param <array> $input
	*/
	public static function sanitise($input){
		foreach($input as $field => $value){
			if($field === 'email'){
				self::isValidEmail($value);
			}
			htmlentities($field);
		}	
	}

	/*
		Checks for correct input.
		@param <array> $input
		@param <array> $expected
	*/
	public static function check($input, $expected){
		self::hasEnoughInputs($input, $expected);
		self::hasEmptyInputs($input);
		self::sanitise($input);
	}
}