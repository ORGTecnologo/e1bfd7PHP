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

		/*#################################### SERVICIOS ####################################*/

		public function agregarServicio() {
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				include __SITE_PATH . '/model/' . 'servicioModel.php';
                $servicioModel = new servicioModel;
                $result = $servicioModel->altaServicio($_POST["nombre"],$_POST["descripcion"]);
                if (strcmp($result['resultado'], 'FALLA') == 0){
					$this->registry->template->nombre = $_POST["nombre"];
					$this->registry->template->descripcion = $_POST["descripcion"];
					$this->registry->template->error = $result['errores'][0];
					$this->registry->template->show('alta_servicio');
                } else {
            	  	$this->registry->template->nextAccion = "mensaje_operacion";
					$this->registry->template->mensaje = "Servicio ingresado con éxito";
					$this->registry->template->operacion = "gestionServicios()";
					$this->registry->template->show('admin');              	
                }
			} else {
				$this->registry->template->show('alta_servicio');
			}			
		}

		public function editarServicio(){
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$nombre = $_POST["nombre"];
				$descripcion = $_POST["descripcion"];
				$id = $_POST["id"];
				include __SITE_PATH . '/model/' . 'servicioModel.php';
				$servicioModel = new servicioModel;
				if ( $servicioModel->modificarServicio($id , $nombre, $descripcion) ){
					$this->registry->template->nextAccion = "mensaje_operacion";
					$this->registry->template->mensaje = "Servicio modificado con éxito";
					$this->registry->template->operacion = "gestionServicios()";
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

		/*#################################### DEPARTAMENTOS ####################################*/

		public function agregarDepartamento() {
			include __SITE_PATH . '/model/' . 'ubicacionModel.php';
            $ubicacionModel = new ubicacionModel;
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {				
                $result = $ubicacionModel->altaDepartamento($_POST["nombre"],$_POST["idPais"]);
                if (strcmp($result['resultado'], 'FALLA') == 0){
					$this->registry->template->nombre = $_POST["nombre"];
					$this->registry->template->idPais = $_POST["idPais"];
					$this->registry->template->error = $result['errores'][0];
					$this->registry->template->show('alta_departamento');
                } else {
            	  	$this->registry->template->nextAccion = "mensaje_operacion";
					$this->registry->template->mensaje = "Departamento ingresado con éxito";
					$this->registry->template->operacion = "gestionDepartamentos()";
					$this->registry->template->show('admin');              	
                }
			} else {
				$paises = $ubicacionModel->obtenerTodosPaises();
				$this->registry->template->lista_paises = $paises;
				$this->registry->template->show('alta_departamento');
			}
			
		}

		public function editarDepartamento() {
			include __SITE_PATH . '/model/' . 'ubicacionModel.php';
            $ubicacionModel = new ubicacionModel;
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {				
                $result = $ubicacionModel->modificarDepartamento($_POST["id"],$_POST["nombre"],$_POST["idPais"]);
                if (strcmp($result['resultado'], 'FALLA') == 0){
					$this->registry->template->nombre = $_POST["nombre"];
					$this->registry->template->idPais = $_POST["idPais"];
					$this->registry->template->id = $_POST["id"];
					$this->registry->template->error = $result['errores'][0];
					$this->registry->template->show('editar_departamento');
                } else {
            	  	$this->registry->template->nextAccion = "mensaje_operacion";
					$this->registry->template->mensaje = "Departamento modificado con éxito";
					$this->registry->template->operacion = "gestionDepartamentos()";
					$this->registry->template->show('admin');              	
                }
			} else {
				$paises = $ubicacionModel->obtenerTodosPaises();
				$this->registry->template->lista_paises = $paises;
				$this->registry->template->nombre = $_GET["nombre"];
				$this->registry->template->idPais = $_GET["idPais"];
				$this->registry->template->id = $_GET["id"];
				$this->registry->template->show('editar_departamento');
			}
			
		}

		/*#################################### LOCALIDADES ####################################*/

		public function agregarLocalidad() {
			include __SITE_PATH . '/model/' . 'ubicacionModel.php';
            $ubicacionModel = new ubicacionModel;
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {				
                $result = $ubicacionModel->altaLocalidad($_POST["nombre"],$_POST["idDepto"]);
                if (strcmp($result['resultado'], 'FALLA') == 0){
					$this->registry->template->nombre = $_POST["nombre"];
					$this->registry->template->idPais = $_POST["idDepto"];
					$this->registry->template->error = $result['errores'][0];
					$this->registry->template->show('alta_localidad');
                } else {
            	  	$this->registry->template->nextAccion = "mensaje_operacion";
					$this->registry->template->mensaje = "Localidad ingresada con éxito";
					$this->registry->template->operacion = "gestionLocalidades()";
					$this->registry->template->show('admin');              	
                }
			} else {
				$paises = $ubicacionModel->obtenerTodosPaises();
				$this->registry->template->lista_paises = $paises;
				$this->registry->template->show('alta_localidad');
			}
			
		}

		public function editarLocalidad() {
			include __SITE_PATH . '/model/' . 'ubicacionModel.php';
            $ubicacionModel = new ubicacionModel;
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {				
                $result = $ubicacionModel->modificarLocalidad($_POST["id"],$_POST["nombre"],$_POST["idDepto"]);
                if (strcmp($result['resultado'], 'FALLA') == 0){
					$this->registry->template->nombre = $_POST["nombre"];
					$this->registry->template->idDepto = $_POST["idDepto"];
					$this->registry->template->id = $_POST["id"];
					$this->registry->template->error = $result['errores'][0];
					$this->registry->template->show('editar_localidad');
                } else {
            	  	$this->registry->template->nextAccion = "mensaje_operacion";
					$this->registry->template->mensaje = "Localidad modificada con éxito";
					$this->registry->template->operacion = "gestionLocalidades()";
					$this->registry->template->show('admin');
                }
			} else {
				$paises = $ubicacionModel->obtenerTodosPaises();
				$this->registry->template->lista_paises = $paises;
				$this->registry->template->id = $_GET["id"];
				$this->registry->template->nombre = $_GET["nombre"];
				$this->registry->template->show('editar_localidad');
			}
			
		}


		/*#################################### PAISES ####################################*/

		public function agregarPais() {
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				include __SITE_PATH . '/model/' . 'ubicacionModel.php';
                $ubicacionModel = new ubicacionModel;
                $result = $ubicacionModel->altaPais($_POST["nombre"]);
                if (strcmp($result['resultado'], 'FALLA') == 0){
					$this->registry->template->nombre = $_POST["nombre"];
					$this->registry->template->error = $result['resultado'][0];
					$this->registry->template->show('alta_pais');
                } else {
            	  	$this->registry->template->nextAccion = "mensaje_operacion";
					$this->registry->template->mensaje = "País ingresado con éxito";
					$this->registry->template->operacion = "gestionPaises()";
					$this->registry->template->show('admin');              	
                }
			} else {
				$this->registry->template->show('alta_pais');
			}
			
		}

		public function editarPais(){
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$nombre = $_POST["nombre"];
				$id = $_POST["id"];
				include __SITE_PATH . '/model/' . 'ubicacionModel.php';
				$ubicacionModel = new ubicacionModel;
				if ( $ubicacionModel->modificarPais($id , $nombre) ){
					$this->registry->template->nextAccion = "mensaje_operacion";
					$this->registry->template->mensaje = "Pais modificado con éxito";
					$this->registry->template->operacion = "gestionPaises()";
					$this->registry->template->show('admin');
				} else {
					$this->registry->template->id = $_POST["id"];
					$this->registry->template->nombre = $_POST["nombre"];
					$this->registry->template->error = "Error al actualizar país.";
					$this->registry->template->show('editar_pais');
				}
			} else {
				$this->registry->template->nombre = $_GET["nombre"];
				$this->registry->template->id = $_GET["id"];
				$this->registry->template->show('editar_pais');
			}

		}

		/*#################################### USUARIOS ####################################*/





		/*#################################### USUARIOS ####################################*/

		public function login(){
			$usuario = $_POST["usuario"];
			$contrasenia = $_POST["contrasenia"];
			include __SITE_PATH . '/model/' . 'usuarioModel.php';
			$usuarioModel = new usuarioModel;
			$authOk = $usuarioModel->loginAdmin($usuario,$contrasenia);
			if ($authOk)
				$this->registry->template->show('admin');
			else{
				$this->registry->template->error = "Usuario o contraseña incorrectos";
				$this->registry->template->show('loginAdmin');
			}
		}
	

	}
	
?>