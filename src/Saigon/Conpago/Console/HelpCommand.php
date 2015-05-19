<?php
	/**
	 * Created by PhpStorm.
	 * User: Bartosz Gołek
	 * Date: 09.02.14
	 * Time: 23:22
	 */

	namespace Saigon\Conpago\Console;

	use Saigon\Conpago\Console\Contract\ICommand;
	use Saigon\Conpago\Console\Contract\Presentation\IHelpCommandPresenter;

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
		function __construct(array $commandsMetadata, IHelpCommandPresenter $presenter)
		{
			$this->commandsMetadata = $commandsMetadata;
			$this->presenter = $presenter;
		}

		function execute()
		{
			foreach ($this->commandsMetadata as $key => $metaData)
				$this->presenter->printCommandInfo($key, $metaData['desc']);
		}
	}