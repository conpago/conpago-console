<?php
	/**
 * Created by PhpStorm.
 * User: bg
 * Date: 16.05.15
 * Time: 23:40
 */

	namespace Conpago\Console\Presentation;


	use Conpago\Console\Contract\Presentation\IConsolePresenter;

	class ConsolePresenter implements IConsolePresenter {

		public function write( $string ) {
			echo $string  . PHP_EOL;
		}
	}
