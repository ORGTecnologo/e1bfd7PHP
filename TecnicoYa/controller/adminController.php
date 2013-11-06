<?php

	Class adminController Extends baseController {

            public function index() {

            	if ($_SESSION["autenticado"]){
            		$usuario = $_SESSION["usuario"];
            		if (strcmp($usuario[2],'usuario_administrador') ){
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
				$usuario = $_GET["usuario"];			
				$contrasenia = $_GET["contrasenia"];
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



	}
        
        
	
?>
