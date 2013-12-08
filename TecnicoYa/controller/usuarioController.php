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
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$usuario = $_POST["usuario"];			
				$contrasenia = $_POST["contrasenia"];
				include __SITE_PATH . '/model/' . 'usuarioModel.php';
		        $usuarioModel = new usuarioModel;
		        if ($usuarioModel->login($usuario,$contrasenia)){
					$this->registry->template->show('index');
		        } else {
					$this->registry->template->error = "Usuario o contraseña inválidos";
					$this->registry->template->show('login_usuario');
		        }				
			} else {
				$this->registry->template->show('login_usuario');
			}
		}

		public function registroUsuario(){
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				include __SITE_PATH . '/model/' . 'usuarioModel.php';
	        	$usuarioModel = new usuarioModel;
        		$result = $usuarioModel->registrarUsuario($_POST["usuario"], $_POST["contrasenia"], $_POST["nombres"], $_POST["apellidos"],$_POST["sexo"], $_POST["fechaNacimiento"], $_POST["telefonoMovil"], $_POST["correoElectronico"],$_POST["ci"], $_POST["direccion"],$_POST["tipoUsuario"]);
        		if (strcmp($result["resultado"], "FALLA") == 0 ){
        			$this->registry->template->usuario = $_POST["usuario"];
        			$this->registry->template->nombres = $_POST["nombres"];
        			$this->registry->template->apellidos = $_POST["apellidos"];
        			$this->registry->template->sexo = $_POST["sexo"]; 
        			$this->registry->template->fechaNacimiento = $_POST["fechaNacimiento"];
        			$this->registry->template->telefonoMovil = $_POST["telefonoMovil"]; 
        			$this->registry->template->correoElectronico = $_POST["correoElectronico"];
        			$this->registry->template->ci = $_POST["ci"];
        			$this->registry->template->direccion = $_POST["direccion"];
        			$this->registry->template->tipoUsuario = $_POST["tipoUsuario"];

					$this->registry->template->error = $result['errores'][0];
					$this->registry->template->show('registro_usuario');

        		} else {
        			$this->registry->template->nextAccion = "mensaje_operacion";
					$this->registry->template->mensaje = "Registro de usuario exitoso";
					$this->registry->template->operacion = "listadoServiciosPublicados()";
					$this->registry->template->show('index');
        		}

			} else {
        			$this->registry->template->usuario = "";
        			$this->registry->template->nombres = "";
        			$this->registry->template->apellidos = "";
        			$this->registry->template->sexo = "";
        			$this->registry->template->fechaNacimiento = "";
        			$this->registry->template->telefonoMovil = "";
        			$this->registry->template->correoElectronico = "";
        			$this->registry->template->ci = "";
        			$this->registry->template->direccion = "";
        			$this->registry->template->tipoUsuario = "";
        			$this->registry->template->contrasenia = "";
				$this->registry->template->show('registro_usuario');						
			}
		}
		

		public function verMisServicios(){
			
			
		}
	
	}

?>
