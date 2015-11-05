<?php
namespace Techblog;

use Exception;

class InputTest extends \PHPUnit_Framework_TestCase
{
	public function test_check_funciton(){

		$actual = ['test'];
		$expected = ['test'];

		$output = Input::check($actual, $expected);

		$this->assertEquals($expected, $output);
	}
}