<?php
	/**
	 * Created by PhpStorm.
	 * User: Bartosz Gołek
	 * Date: 14.11.13
	 * Time: 00:18
	 */

	namespace Conpago\Console;

	use Conpago\Console\Contract\ICommand;
    use Conpago\Console\Contract\Presentation\IConsolePresenter;
    use Conpago\DI\IFactory;
    use Conpago\Helpers\Contract\IArgs;

    class ConsoleAppTest extends \PHPUnit_Framework_TestCase
	{
		function testAppRunWithoutArgsWriteCommandNotFound(){
			$args = $this->getArgsMock();

			$presenter = $this->getConsolePresenterMock();
			$presenter->expects($this->once())->method('write')->with($this->equalTo("Command '' not found."));

			$app = new ConsoleApp([], $args, $presenter);
			$app->run();
		}

		function testAppRunWithNotExistingCommandWriteCommandNotFound(){
			$args = $this->getArgsMock();
			$args->expects($this->any())->method('getArguments')->willReturn(['commandName']);

			$presenter = $this->getConsolePresenterMock();

			$app = new ConsoleApp([], $args, $presenter);
			$app->run();
		}

		function testAppRunWithExistingCommandRunIt(){
			$command = $this->getCommandMock();
			$command->expects($this->once())->method('execute');

			$args = $this->getArgsMock();
			$args->expects($this->any())->method('getArguments')->willReturn(['commandName']);

			$presenter = $this->getConsolePresenterMock();

			$factory = $this->createMock(IFactory::class);
			$factory->expects($this->any())->method('createInstance')->willReturn($command);

			$app = new ConsoleApp(['commandName' => $factory], $args, $presenter);
			$app->run();
		}

        /**
         * @return \PHPUnit_Framework_MockObject_MockObject
         */
        protected function getArgsMock()
        {
            return $this->createMock(IArgs::class);
        }

        /**
         * @return \PHPUnit_Framework_MockObject_MockObject
         */
        protected function getConsolePresenterMock()
        {
            return $this->createMock(IConsolePresenter::class);
        }

        /**
         * @return \PHPUnit_Framework_MockObject_MockObject
         */
        protected function getCommandMock()
        {
            return $this->createMock(ICommand::class);
        }
    }
