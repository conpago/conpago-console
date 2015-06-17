<?php
	/**
	 * Created by PhpStorm.
	 * User: bg
	 * Date: 18.05.15
	 * Time: 00:37
	 */

	namespace Conpago\Console\Presentation;


	class HelpCommandPresenterTest extends \PHPUnit_Framework_TestCase {

		function testPrintCommandInfo(){
			$command = 'commandName';
			$desc = 'commandDesc';

			$consolePresenter = $this->getMock('Conpago\Console\Contract\Presentation\IConsolePresenter');
			$consolePresenter->expects($this->once())->method('write')->with($this->equalTo($command . '     ' . $desc));

			$helpCommandPresenter = new HelpCommandPresenter($consolePresenter);
			$helpCommandPresenter->printCommandInfo($command, $desc);
		}
	}
