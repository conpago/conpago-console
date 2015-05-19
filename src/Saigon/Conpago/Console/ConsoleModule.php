<?php
	/**
	 * Created by PhpStorm.
	 * User: bg
	 * Date: 19.05.15
	 * Time: 23:45
	 */

	namespace Saigon\Conpago\Console;


	use Saigon\Conpago\DI\IContainerBuilder;
	use Saigon\Conpago\DI\IModule;

	class ConsoleModule implements IModule {

		public function build( IContainerBuilder $builder ) {
			$builder
				->registerType('Saigon\Conpago\Console\Presentation\ConsolePresenter')
				->asA('Saigon\Conpago\Console\Contract\Presentation\IConsolePresenter');

			$builder
				->registerType('Saigon\Conpago\Console\HelpCommand')
				->asA('Saigon\Conpago\Console\Contract\ICommand');

			$builder
				->registerType('Saigon\Conpago\Console\Presentation\HelpCommandPresenter')
				->asA('Saigon\Conpago\Console\Contract\Presentation\IHelpCommandPresenter');

			$builder
				->registerType('Saigon\Conpago\Console\ConsoleApp')
				->asA('Saigon\Conpago\Contract\IApp');
		}
	}