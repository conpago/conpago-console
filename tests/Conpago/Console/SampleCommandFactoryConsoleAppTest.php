<?php
namespace Conpago\Console;

use Conpago\Console\Contract\ICommand;
use Conpago\Console\Contract\Presentation\IConsolePresenter;
use Conpago\DI\IFactory;
use Conpago\Helpers\Contract\IArgs;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject as MockObject;

class SampleCommandFactoryConsoleAppTest extends TestCase
{
    /** @var ConsoleApp */
    private $sut;

    /** @var IArgs | MockObject */
    private $argsMock;

    /** @var  IConsolePresenter | MockObject */
    private $presenterMock;

    public function testAppRunWithExistingCommandRunIt()
    {
        $this->sut->run();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getArgsMock()
    {
        return $this->createMock(IArgs::class);
    }

    public function setUp(): void
    {
        $command = $this->createMock(ICommand::class);
        $factory = $this->createMock(IFactory::class);
        $this->argsMock = $this->createMock(IArgs::class);
        $this->presenterMock = $this->createMock(IConsolePresenter::class);

        $command->expects($this->once())->method('execute');
        $factory->expects($this->any())->method('createInstance')->willReturn($command);

        $this->argsMock->expects($this->any())->method('getArguments')->willReturn(['commandName']);

        $this->sut = new ConsoleApp(['commandName' => $factory], $this->argsMock, $this->presenterMock);
    }
}
