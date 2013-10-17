<?php

	class usuarioController extends baseController {

		public function index() {
			/*** set a template variable ***/
				$this->registry->template->welcome = 'Welcome to PHPRO MVC';

			/*** load the index template ***/
				$this->registry->template->show('index');
		}
		
		public function getFormRegistro() {
			$this->registry->template->show('registro_usuario');
		}

	}

?>
