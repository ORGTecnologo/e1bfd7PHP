<?php
	Class adminController Extends baseController {
		
		public function index() {
			if ($_SESSION["autenticado"]){
				$usuario = $_SESSION["usuario"];
				if (strcmp($usuario[2],'usuario_administrador') == 0 ){
							$this->registry->template->show('Home_Admin');
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

		public function get_agregarServicio() {
			$this->registry->template->show('AgregarServicio');
		}

		public function login(){
			$usuario = $_POST["usuario"];
			$contrasenia = $_POST["contrasenia"];
			include __SITE_PATH . '/model/' . 'usuarioModel.php';
			$usuarioModel = new usuarioModel;
			$authOk = $usuarioModel->loginAdmin($usuario,$contrasenia);
			if ($authOk)
				$this->registry->template->show('Home_Admin');
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
		public function get_editarServicio(){
			$this->registry->template->id = $_GET["id"];
			$_SESSION["tmp_id_servicio"] = $_GET["id"];
			$this->registry->template->nombre = $_GET["nombre"];
			$this->registry->template->descripcion = $_GET["descripcion"];
			$this->registry->template->show('editar_servicio');
		}

		public function editarServicio(){
			if (isset($_SESSION["tmp_id_servicio"])){
				$nombre = $_POST["nombre"];
				$descripcion = $_POST["descripcion"];
				include __SITE_PATH . '/model/' . 'servicioModel.php';
				$servicioModel = new servicioModel;
				if ( $servicioModel->modificarServicio($_SESSION["tmp_id_servicio"] , $nombre, $descripcion) ){
					unset($_SESSION["tmp_id_servicio"]);
					$this->registry->template->postAction = "viewServicios";
					$this->registry->template->show('Home_Admin');
				} else {
					$this->registry->template->id = $_SESSION["tmp_id_servicio"];
					$this->registry->template->nombre = $_POST["nombre"];
					$this->registry->template->descripcion = $_POST["descripcion"];
					$this->registry->template->error = "Error al actualizar servicio.";
					$this->registry->template->show('editar_servicio');
				}
			}
		}

		public function deshablitarServicio(){
			$idServicio = $_POST["idServicio"];
			include __SITE_PATH . '/model/' . 'servicioModel.php';
			$servicioModel = new servicioModel;
			$servicioModel->deshablitarServicio($idServicio);
			$this->registry->template->postAction = "viewServicios";
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