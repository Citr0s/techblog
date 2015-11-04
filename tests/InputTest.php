<?php
namespace Techblog;

use Exception;

class InputTest extends \PHPUnit_Framework_TestCase
{
	public function testSanitiseFunciton(){

		$input = ['email' => 'xxx@aaa.pl'];

		Input::sanitise($input);
	}

	public function testCheckFunciton(){

		$actual = ['test'];
		$expected = ['test'];

		Input::check($actual, $expected);
	}
}