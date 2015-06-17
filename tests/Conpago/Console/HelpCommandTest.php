<?php
	/**
	 * Created by PhpStorm.
	 * User: Bartosz Gołek
	 * Date: 09.02.14
	 * Time: 23:22
	 */

	namespace Conpago\Console;


	class HelpCommandTest extends \PHPUnit_Framework_TestCase
	{
		function testExecutePrintCommandInfo(){
			$command = 'command';
			$description = 'description';
			$commandMetadata = array ( $command => array('desc' => $description ));

			$presenter = $this->getMock('Conpago\Console\Contract\Presentation\IHelpCommandPresenter');
			$presenter->expects($this->once())->method('printCommandInfo')
				->with($this->equalTo($command), $this->equalTo($description));

			$helpCommand = new HelpCommand($commandMetadata, $presenter);
			$helpCommand->execute();
		}

		function testExecutePrintAllCommandsInfo(){
			$command1 = 'command';
			$description1 = 'description';
			$command2 = 'command';
			$description2 = 'description';
			$commandsMetadata = array
			(
				$command1 => array('desc' => $description1 ),
				$command2 => array('desc' => $description2 )
			);

			$presenter = $this->getMock('Conpago\Console\Contract\Presentation\IHelpCommandPresenter');
			$presenter->expects($this->once())->method('printCommandInfo')
				->withConsecutive(
					array($this->equalTo($command1), $this->equalTo($description1)),
					array($this->equalTo($command2), $this->equalTo($description2))
				);

			$helpCommand = new HelpCommand($commandsMetadata, $presenter);
			$helpCommand->execute();
		}
	}
