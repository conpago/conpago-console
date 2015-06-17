<?php
	/**
 * Created by PhpStorm.
 * User: bg
 * Date: 16.05.15
 * Time: 23:40
 */

	namespace Conpago\Console\Presentation;

	class ConsolePresenterTest extends \PHPUnit_Framework_TestCase {

		public function testWrite() {

			$this->expectOutputString("testValue".PHP_EOL);
			$consolePresenter = new ConsolePresenter();
			$consolePresenter->write("testValue");
		}
	}
