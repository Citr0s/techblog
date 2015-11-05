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
		$expected = ['email', 'password'];
		$data = Input::check($_POST, $expected);

		$extra = [
			'select' => '*',
			'from' => 'users',
			];
		$data = $extra + $data;

		$results = Database::find($data);

		if($results->num_rows === 0){
			throw new Exception("Email or Password is incorrect.");
		}
		self::checkIfActive($results);
		$user = new User($data['email']);
		self::login($user);
		header('Location: index.php');
	}

	/*
		Try to log register in.
	*/
	public static function attemptRegister(){
		$expected = ['email', 'password', 'password_confirm'];
		$data = Input::check($_POST, $expected);

		$extra = [
			'to' => 'users',
			];
		$data = $extra + $data;

		//$results = Database::create($data);

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

	/*
		Check if user is active.
		@param <object> $data
	*/
	private static function checkIfActive($data){
		while($row = mysqli_fetch_object($data)){
			if($row->active !== '1'){
				throw new Exception("This account is not currenty active.");
			}
		}
	}
}