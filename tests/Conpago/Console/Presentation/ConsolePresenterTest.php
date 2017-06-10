<?php
namespace Conpago\Console\Presentation;

use PHPUnit\Framework\TestCase;

class ConsolePresenterTest extends TestCase
{
    public function testWrite()
    {
        $this->expectOutputString("testValue".PHP_EOL);
        $consolePresenter = new ConsolePresenter();
        $consolePresenter->write("testValue");
    }
}
