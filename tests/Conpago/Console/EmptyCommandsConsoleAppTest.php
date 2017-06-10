<?php
namespace Conpago\Console;

use Conpago\Console\Contract\ICommand;
use Conpago\Console\Contract\Presentation\IConsolePresenter;
use Conpago\Helpers\Contract\IArgs;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject as MockObject;

class EmptyCommandsConsoleAppTest extends TestCase
{
    /** @var ConsoleApp */
    private $sut;

    /** @var IArgs | MockObject */
    private $argsMock;

    /** @var  IConsolePresenter | MockObject */
    private $presenterMock;

    public function testAppRunWithoutArgsWriteCommandNotFound()
    {
        $this->presenterMock->expects($this->once())->method('write')->with($this->equalTo("Command '' not found."));

        $this->sut->run();
    }

    public function testAppRunWithNotExistingCommandWriteCommandNotFound()
    {
        $this->argsMock->method('getArguments')->willReturn(['commandName']);

        $this->presenterMock->expects($this->once())->method('write')->with($this->equalTo("Command 'commandName' not found."));

        $this->sut->run();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getCommandMock()
    {
        return $this->createMock(ICommand::class);
    }

    public function setUp(): void
    {
        $this->argsMock = $this->createMock(IArgs::class);
        $this->presenterMock = $this->createMock(IConsolePresenter::class);
        $this->sut = new ConsoleApp([], $this->argsMock, $this->presenterMock);
    }
}
