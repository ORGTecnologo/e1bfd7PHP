<?php
	Class adminController Extends baseController {
		
		public function index() {
			if ($_SESSION["autenticado"]){
				$usuario = $_SESSION["usuario"];
				if (strcmp($usuario[2],'usuario_administrador') == 0 ){
							$this->registry->template->show('admin');
				} else {
					$this->registry->template->show('loginAdmin');
				}
			} else {
				$this->registry->template->show('loginAdmin');
			}
		}
		public function logout(){
			include __SITE_PATH . '/model/' . 'usuarioModel.php';
			$usuarioModel = new usuarioModel;
			$usuarioModel->logout();
			$this->registry->template->show('loginAdmin');		
		}

		public function agregarServicio() {
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				include __SITE_PATH . '/model/' . 'servicioModel.php';
                $servicioModel = new servicioModel;
                $result = $servicioModel->altaServicio($arguments["nombres"],$arguments["descripcion"]);
			} else {
				$this->registry->template->show('AgregarServicio');				
			}
			
		}

		public function login(){
			$usuario = $_POST["usuario"];
			$contrasenia = $_POST["contrasenia"];
			include __SITE_PATH . '/model/' . 'usuarioModel.php';
			$usuarioModel = new usuarioModel;
			$authOk = $usuarioModel->loginAdmin($usuario,$contrasenia);
			if ($authOk)
				$this->registry->template->show('admin');
			else
				$this->registry->template->show('loginAdmin');
		}

		public function obtenerTodosServicios(){
			include __SITE_PATH . '/model/' . 'servicioModel.php';
			$servicioModel = new servicioModel;
			$servicios = $servicioModel->obtenerTodosServicios();
			$this->registry->template->lista_servicios = $servicios;
			$this->registry->template->show('listado_servicios');
		}
	
		public function editarServicio(){
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$nombre = $_POST["nombre"];
				$descripcion = $_POST["descripcion"];
				$id = $_POST["id"];
				include __SITE_PATH . '/model/' . 'servicioModel.php';
				$servicioModel = new servicioModel;
				if ( $servicioModel->modificarServicio($id , $nombre, $descripcion) ){
					$this->registry->template->nextAccion = "listado_servicios";					
					$this->registry->template->show('admin');
				} else {
					$this->registry->template->id = $_POST["id"];
					$this->registry->template->nombre = $_POST["nombre"];
					$this->registry->template->descripcion = $_POST["descripcion"];
					$this->registry->template->error = "Error al actualizar servicio.";
					$this->registry->template->show('editar_servicio');
				}
			} else {
				$this->registry->template->nombre = $_GET["nombre"];
				$this->registry->template->id = $_GET["id"];
				$this->registry->template->descripcion = $_GET["descripcion"];
				$this->registry->template->show('editar_servicio');
			}

		}

		public function cambiarEstadoServicio(){
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$id = $_POST["id"];
				include __SITE_PATH . '/model/' . 'servicioModel.php';
				$servicioModel = new servicioModel;
				if ($servicioModel->cambiarEstadoServicio($id)){
					$this->registry->template->nextAccion = "mensaje_operacion";
					$this->registry->template->mensaje = "Estado del servicio modificado con éxito";
					$this->registry->template->operacion = "gestionServicios()";
					$this->registry->template->show('admin');
				} else {

				}
			} else {
				$this->registry->template->nombre = $_GET["nombre"];
				$this->registry->template->id = $_GET["id"];
				$this->registry->template->descripcion = $_GET["descripcion"];
				$this->registry->template->show('habdeshab_servicio');
			}
		}

		public function hablitarServicio(){
			$idServicio = $_POST["idServicio"];
			include __SITE_PATH . '/model/' . 'servicioModel.php';
			$servicioModel = new servicioModel;
			$servicioModel->hablitarServicio($idServicio);
			$this->registry->template->postAction = "viewServicios";
		}

	}
	
?>