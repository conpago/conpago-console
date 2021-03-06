<?php
namespace Conpago\Console;

use Conpago\Console\Contract\Presentation\IHelpCommandPresenter;
use PHPUnit\Framework\TestCase;

class HelpCommandTest extends TestCase
{
    public function testExecutePrintCommandInfo()
    {
        $command = 'command';
        $description = 'description';
        $commandMetadata = array ( $command => array('desc' => $description ));

        $presenter = $this->getHelpCommandPresenterMock();
        $presenter->expects($this->once())->method('printCommandInfo')
            ->with($this->equalTo($command), $this->equalTo($description));

        $helpCommand = new HelpCommand($commandMetadata, $presenter);
        $helpCommand->execute();
    }

    public function testExecutePrintAllCommandsInfo()
    {
        $command1 = 'command';
        $description1 = 'description';
        $command2 = 'command';
        $description2 = 'description';
        $commandsMetadata = array
        (
            $command1 => array('desc' => $description1 ),
            $command2 => array('desc' => $description2 )
        );

        $presenter = $this->getHelpCommandPresenterMock();
        $presenter->expects($this->once())->method('printCommandInfo')
            ->withConsecutive(
                array($this->equalTo($command1), $this->equalTo($description1)),
                array($this->equalTo($command2), $this->equalTo($description2))
            );

        $helpCommand = new HelpCommand($commandsMetadata, $presenter);
        $helpCommand->execute();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getHelpCommandPresenterMock()
    {
        return $this->createMock(IHelpCommandPresenter::class);
    }
}
