<?php
	/**
	 * Created by PhpStorm.
	 * User: Bartosz Gołek
	 * Date: 14.11.13
	 * Time: 00:18
	 */

	namespace Conpago\Console;

	class ConsoleAppTest extends \PHPUnit_Framework_TestCase
	{
		function testAppRunWithoutArgsWriteCommandNotFound(){
			$args = $this->getMock('Conpago\Helpers\Contract\IArgs');

			$presenter = $this->getMock('Conpago\Console\Contract\Presentation\IConsolePresenter');
			$presenter->expects($this->once())->method('write')->with($this->equalTo("Command '' not found."));

			$app = new ConsoleApp([], $args, $presenter);
			$app->run();
		}

		function testAppRunWithNotExistingCommandWriteCommandNotFound(){
			$args = $this->getMock('Conpago\Helpers\Contract\IArgs');
			$args->expects($this->any())->method('getArguments')->willReturn(['commandName']);

			$presenter = $this->getMock('Conpago\Console\Contract\Presentation\IConsolePresenter');

			$app = new ConsoleApp([], $args, $presenter);
			$app->run();
		}

		function testAppRunWithExistingCommandRunIt(){
			$command = $this->getMock('Conpago\Console\Contract\ICommand');
			$command->expects($this->once())->method('execute');

			$args = $this->getMock('Conpago\Helpers\Contract\IArgs');
			$args->expects($this->any())->method('getArguments')->willReturn(['commandName']);

			$presenter = $this->getMock('Conpago\Console\Contract\Presentation\IConsolePresenter');

			$factory = $this->getMock('Conpago\DI\IFactory');
			$factory->expects($this->any())->method('createInstance')->willReturn($command);

			$app = new ConsoleApp(['commandName' => $factory], $args, $presenter);
			$app->run();
		}
	}
