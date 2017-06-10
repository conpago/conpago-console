<?php
namespace Conpago\Console\Presentation;


use Conpago\Console\Contract\Presentation\IConsolePresenter;

class ConsolePresenter implements IConsolePresenter
{
    public function write(string $string): void
    {
        echo $string  . PHP_EOL;
    }
}
