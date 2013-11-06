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
		
		public function getFormLogin() {
			$this->registry->template->show('login_usuario');
		}

		public function logout(){
			include __SITE_PATH . '/model/' . 'usuarioModel.php';
	        $usuarioModel = new usuarioModel;
	        $usuarioModel->logout();
	        $this->registry->template->show('index');
		}

		public function login(){
			$usuario = $_GET["usuario"];			
			$contrasenia = $_GET["contrasenia"];
			include __SITE_PATH . '/model/' . 'usuarioModel.php';
	        $usuarioModel = new usuarioModel;
	        $usuarioModel->login($usuario,$contrasenia);
			$this->registry->template->show('index');
		}
	
	
	}

?>
