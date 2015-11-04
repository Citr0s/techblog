<?php
namespace Techblog;

use Exception;

class Input
{
	/*
		@param <array> $input
		@return <bool> $result
	*/
	public static function sanitise($input){
		foreach($input as $field => $value){
			if($field === 'email'){
				if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
					throw new Exception("Valid email address required.");
				}
			}
			htmlentities($field);
		}	
	}

	/*
		@param <array> $input
		@param <array> $expected
		@return <bool> $result
	*/
	public static function check($input, $expected){
		if(count($input) !== count($expected)){
			throw new Exception("All inputs are required.");
		}

		foreach($input as $field){
			if(empty($field)){
				throw new Exception("All fields are requierd.");
			}
		}

		self::sanitise($input);

		return true;
	}
}