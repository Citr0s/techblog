<?php
namespace Techblog;

use Exception;
use Techblog\Input;
use Techblog\Database;

class User
{
	private $email;
	function __construct($email){
		$this->email = $email;
	}

	/*
		Try to log user in.
	*/
	public static function attemptLogin(){
		//TODO
		//check if active
		//update updated_at field
		$expected = ['email', 'password'];
		$data = Input::check($_POST, $expected);

		$query = [
			'select' => '*',
			'from' => 'users',
			];
		$data = $query + $data;

		if(Database::find($data)->num_rows === 0){
			throw new Exception("Email or Password is incorrect.");
		}
		$user = new User($data['email']);
		self::login($user);
		header('Location: index.php');
	}

	/*
		Login user.
		@param <object> $user
	*/
	private static function login(User $user){
		$_SESSION['user'] = $user;
	}

	/*
		Logout user.
		@param <object> $user
	*/
	public static function logout(User $user){
		session_destroy();
	}

	/*
		Check if user is logged in.
		@return <bool> $result
	*/
	public static function loggedIn(){
		if(isset($_SESSION['user'])){
			return true;
		}
	}
}