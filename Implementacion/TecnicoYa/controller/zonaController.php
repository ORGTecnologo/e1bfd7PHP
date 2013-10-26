<?php

	class zonaController extends baseController {

		public function index() {
			/*** set a template variable ***/
				$this->registry->template->welcome = 'Welcome to PHPRO MVC';

			/*** load the index template ***/
				$this->registry->template->show('index');
		}
		
		public function getMapa() {
			$this->registry->template->show('vista_mapa');
		}

	}

?>
