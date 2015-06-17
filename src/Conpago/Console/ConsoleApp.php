<?php
	/**
	 * Created by PhpStorm.
	 * User: Bartosz Gołek
	 * Date: 14.11.13
	 * Time: 00:18
	 */

	namespace Conpago\Console;

	use Conpago\Console\Contract\ICommand;
	use Conpago\DI\IFactory;
	use Conpago\Helpers\Contract\IArgs;
	use Conpago\Contract\IApp;
	use Conpago\Console\Contract\Presentation\IConsolePresenter;

	class ConsoleApp implements IApp
	{
		/**
		 * @var IFactory[]
		 */
		private $commands;
		/**
		 * @var IArgs
		 */
		private $args;
		/**
		 * @var IConsolePresenter
		 */
		private $presenter;

		/**
		 * @param IFactory[] $commands
		 * @param IArgs $args
		 * @param IConsolePresenter $presenter
		 *
		 * @inject Factory<\Conpago\Console\Contract\ICommand> $commands
		 * @inject \Conpago\Helpers\Contract\IArgs $args
		 * @inject \Conpago\Console\Contract\Presentation\IConsolePresenter $presenter
		 */
		function __construct(array $commands, IArgs $args, IConsolePresenter $presenter)
		{
			$this->commands = $commands;
			$this->args = $args;
			$this->presenter = $presenter;
		}

		public function run()
		{
			$arguments = $this->args->getArguments();
			$commandName = $arguments[0];

			if (!array_key_exists($commandName, $this->commands)) {
				$this->presenter->write("Command '" . $commandName . "' not found.");
				return;
			}

			/** @var IFactory $commandFactory */
			$commandFactory = $this->commands[$commandName];
			/** @var ICommand $command */
			$command = $commandFactory->createInstance();
			$command->execute();
		}
	}
