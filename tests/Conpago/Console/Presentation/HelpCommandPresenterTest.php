<?php
namespace Conpago\Console\Presentation;

use Conpago\Console\Contract\Presentation\IConsolePresenter;
use PHPUnit\Framework\TestCase;

class HelpCommandPresenterTest extends TestCase
{
    public function testPrintCommandInfo()
    {
        $command = 'commandName';
        $desc = 'commandDesc';

        $consolePresenter = $this->createMock(IConsolePresenter::class);
        $consolePresenter->expects($this->once())->method('write')->with($this->equalTo($command . '     ' . $desc));

        $helpCommandPresenter = new HelpCommandPresenter($consolePresenter);
        $helpCommandPresenter->printCommandInfo($command, $desc);
    }
}
