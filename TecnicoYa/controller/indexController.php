<?php

	class indexController extends baseController {

		public function index() {
			/*** set a template variable ***/
				$this->registry->template->welcome = 'Welcome to PHPRO MVC';

			/*** load the index template ***/
				$this->registry->template->show('index');
		}

		public function mensajeOperacion(){
			$this->registry->template->mensaje = $_GET["mensaje"];
			$this->registry->template->operacion = $_GET["operacion"];
			$this->registry->template->show('mensaje_operacion');
		}

	}

?>
