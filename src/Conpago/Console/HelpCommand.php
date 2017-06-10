<?php
namespace Conpago\Console;

use Conpago\Console\Contract\ICommand;
use Conpago\Console\Contract\Presentation\IHelpCommandPresenter;

class HelpCommand implements ICommand
{
    private $presenter;
    /**
     * @var array
     */
    private $commandsMetadata;

    /**
     * @param array $commandsMetadata
     * @param IHelpCommandPresenter $presenter
     */
    public function __construct(array $commandsMetadata, IHelpCommandPresenter $presenter)
    {
        $this->commandsMetadata = $commandsMetadata;
        $this->presenter = $presenter;
    }

    public function execute(): void
    {
        foreach ($this->commandsMetadata as $key => $metaData) {
            $this->presenter->printCommandInfo($key, $metaData['desc']);
        }
    }
}
