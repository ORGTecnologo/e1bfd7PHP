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

		public function perfilUsuario(){
			include __SITE_PATH . '/model/' . 'usuarioModel.php';
        	$usuarioModel = new usuarioModel;
			$usr = $usuarioModel->obtenerInfoDeUsuario($_SESSION["usuario"][1]);
			$this->registry->template->usr = $usr;
			$this->registry->template->show('perfil');
		}
		

		public function verMisServicios(){
			include __SITE_PATH . '/model/' . 'servicioModel.php';
			$servicioModel = new servicioModel;
			$tecnico = $_SESSION["usuario"][1];
			$servicios = $servicioModel->obtenerServiciosDeTecnico($tecnico);		
			$this->registry->template->lista_servicios = $servicios;
			$this->registry->template->show('listado_mis_servicios');
		}

		function generateRandomString($length = 30) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, strlen($characters) - 1)];
		    }
		    return $randomString;
		}

		public function ofrecerNuevoServicio(){
			include __SITE_PATH . '/model/' . 'servicioModel.php';
			$servicioModel = new servicioModel;
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {				

				$urlFoto = "includes/img_data/";
				$nombreFoto = "sin_foto";
				if($_FILES['foto']['name'])
					$nombreFoto = $this->generateRandomString();										
				$urlFoto .= $nombreFoto . ".jpg";
				$tecnico = $_SESSION["usuario"][1];
				$result = $servicioModel->ofrecerNuevoServicio($_POST["idServicio"], $_POST["precio"], $urlFoto, $tecnico);
				if (strcmp($result["resultado"], "FALLA") == 0 ){
					$servicios = $servicioModel->obtenerTodosServicios();
					$this->registry->template->error = $servicios;			
					$this->registry->template->error = $result['errores'][0];
					$this->registry->template->show('ofrecer_nuevo_servicio');
				} else {
					if($_FILES['foto']['name']){
						move_uploaded_file($_FILES['foto']['tmp_name'], $urlFoto);
					}
					$this->registry->template->nextAccion = "mensaje_operacion";
					$this->registry->template->mensaje = "Servicio publicado con éxito";
					$this->registry->template->operacion = "misServicios()";
					$this->registry->template->show('index');
				}
			} else {
				$servicios = $servicioModel->obtenerTodosServicios();
				$this->registry->template->lista_servicios = $servicios;				
				$this->registry->template->show('ofrecer_nuevo_servicio');
			}
		}

		public function bajaDeServicio(){
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {	
				include __SITE_PATH . '/model/' . 'servicioModel.php';
				$servicioModel = new servicioModel;

				$servicioModel->eliminarServicioOfrecido($_SESSION["usuario"][1],$_POST["id"]);

				$this->registry->template->nextAccion = "mensaje_operacion";
				$this->registry->template->mensaje = "Servicio dado de baja con éxito";
				$this->registry->template->operacion = "misServicios()";
				$this->registry->template->show('index');

			} else {
				$this->registry->template->nombre = $_GET["nombre"];
				$this->registry->template->id = $_GET["id"];
				$this->registry->template->show('baja_de_servicio');
			}
		}

		public function listarServiciosPendientes(){
			if ($_SERVER['REQUEST_METHOD'] === 'GET') {	
				$usr = $_SESSION["usuario"];
				include __SITE_PATH . '/model/' . 'servicioModel.php';
				$servicioModel = new servicioModel;

				if (strcmp($usr[2] , "usuario_tecnico") == 0){
					$servicios = $servicioModel->obtenerServiciosPendientesTecnico($usr[1],$_GET["estado"]);
					$this->registry->template->lista_servicios = $servicios;	
					$this->registry->template->estado = $_GET["estado"];
					$this->registry->template->show('servicios_pendientes_tecnico');
				} else {
					$servicios = $servicioModel->obtenerServiciosPendientesCliente($usr[1],$_GET["estado"]);
					$this->registry->template->lista_servicios = $servicios;
					$this->registry->template->estado = $_GET["estado"];	
					$this->registry->template->show('servicios_pendientes_cliente');
				}

			}
		}

		public function verInfoServicioOfrecido(){
			include __SITE_PATH . '/model/' . 'servicioModel.php';
			$servicioModel = new servicioModel;
			$serv = $servicioModel->verInfoServicioOfrecido($_GET["tecnico"],$_GET["idServicio"]);
			$this->registry->template->serv = $serv;
			$this->registry->template->show('ver_info_servicio_ofrecido');
		}

		public function calificarATecnico(){
			if ($_SERVER['REQUEST_METHOD'] === 'GET') {	
				$this->registry->template->nombreTecnico = $_GET["tecNombre"];
				$this->registry->template->mailTecnico = $_GET["tecMail"];
				$this->registry->template->nombreSerivico = $_GET["servNombre"];
				$this->registry->template->idContrato = $_GET["idContrato"];
				$this->registry->template->show('calificar_tecnico');
			} else {
				include __SITE_PATH . '/model/' . 'servicioModel.php';
				$servicioModel = new servicioModel;
				$serv = $servicioModel->calificarTecnico($_POST["idContrato"],$_POST["calificacion"]);
				$this->registry->template->nextAccion = "mensaje_operacion";
				$this->registry->template->mensaje = "Calificación enviada con éxito, muchas gracias!";
				$this->registry->template->operacion = "listarServiciosPendientesCliente()";
				$this->registry->template->show('index');
			}
		}

		public function calificarACliente(){
			if ($_SERVER['REQUEST_METHOD'] === 'GET') {	
				$this->registry->template->nombreCliente = $_GET["cliNombre"];
				$this->registry->template->mailCliente = $_GET["cliMail"];
				$this->registry->template->nombreSerivico = $_GET["servNombre"];
				$this->registry->template->idContrato = $_GET["idContrato"];
				$this->registry->template->show('calificar_cliente');
			} else {
				include __SITE_PATH . '/model/' . 'servicioModel.php';
				$servicioModel = new servicioModel;
				$serv = $servicioModel->calificarCliente($_POST["idContrato"],$_POST["calificacion"]);
				$this->registry->template->nextAccion = "mensaje_operacion";
				$this->registry->template->mensaje = "Calificación enviada con éxito, muchas gracias!";
				$this->registry->template->operacion = "listarServiciosPendientesTecnico()";
				$this->registry->template->show('index');
			}
		}
	
	}

?>
