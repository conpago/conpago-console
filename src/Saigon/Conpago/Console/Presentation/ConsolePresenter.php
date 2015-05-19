<?php
	/**
 * Created by PhpStorm.
 * User: bg
 * Date: 16.05.15
 * Time: 23:40
 */

	namespace Saigon\Conpago\Console\Presentation;


	use Saigon\Conpago\Console\Contract\Presentation\IConsolePresenter;

	class ConsolePresenter implements IConsolePresenter {

		public function write( $string ) {
			echo $string  . PHP_EOL;
		}
	}