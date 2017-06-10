<?php
namespace Conpago\Console\Presentation;

use Conpago\Console\Contract\Presentation\IConsolePresenter;
use Conpago\Console\Contract\Presentation\IHelpCommandPresenter;

class HelpCommandPresenter implements IHelpCommandPresenter
{
    /** @var IConsolePresenter */
    private $consolePresenter;

    /**
     * @param IConsolePresenter $consolePresenter
     */
    public function __construct(IConsolePresenter $consolePresenter)
    {
        $this->consolePresenter = $consolePresenter;
    }

    public function printCommandInfo(string $command, string $desc): void
    {
        $this->consolePresenter->write($command . '     ' . $desc);
    }
}
