<?php
namespace Techblog;

class Input
{
	/*
		@param <array> $input
		@return <bool> $result
	*/
	public static function sanitise($input){
		foreach($input as $field){
			if($input === 'email'){
				if(!filter_var($field, FILTER_VALIDATE_EMAIL)){
					return false;
				}
			}
			htmlentities($field);
		}
		return true;
	}
	/*
		@param <array> $input
		@param <array> $expected
		@return <bool> $result
	*/
	public static function check($input, $expected){
		if(count($input) !== count($expected)){
			return false;
		}

		foreach($input as $field){
			if(empty($field)){
				return false;
			}
		}

		self::sanitise($input);
		return true;
	}
}