<?php
	/**
	 * Created by PhpStorm.
	 * User: bg
	 * Date: 18.05.15
	 * Time: 00:37
	 */

	namespace Saigon\Conpago\Console\Presentation;


	use Saigon\Conpago\Console\Contract\Presentation\IConsolePresenter;
	use Saigon\Conpago\Console\Contract\Presentation\IHelpCommandPresenter;

	class HelpCommandPresenter implements IHelpCommandPresenter {
		/**
		 * @var IConsolePresenter
		 */
		private $consolePresenter;

		/**
		 * @param IConsolePresenter $consolePresenter
		 */
		public function __construct(IConsolePresenter $consolePresenter){
			$this->consolePresenter = $consolePresenter;
		}

		public function printCommandInfo( $command, $desc ) {
			$this->consolePresenter->write($command . '     ' . $desc);
		}
	}