<?php
	Class listadosController Extends baseController {
		
		public function index() {
			
		}

		public function obtenerTodosServicios(){
			include __SITE_PATH . '/model/' . 'servicioModel.php';
			$servicioModel = new servicioModel;
			$servicios = $servicioModel->obtenerTodosServicios();
			$this->registry->template->lista_servicios = $servicios;
			$this->registry->template->show('listado_servicios');
		}

		public function obtenerTodosPaises(){
			include __SITE_PATH . '/model/' . 'ubicacionModel.php';
			$ubicModel = new ubicacionModel;
			$paises = $ubicModel->obtenerTodosPaises();
			$this->registry->template->lista_paises = $paises;
			$this->registry->template->show('listado_paises');
		}

		public function obtenerTodosDepartamentos(){
			include __SITE_PATH . '/model/' . 'ubicacionModel.php';
			$ubicModel = new ubicacionModel;
			$deps = $ubicModel->obtenerTodosDepartamentos();
			$this->registry->template->lista_departamentos = $deps;
			$this->registry->template->show('listado_departamentos');
		}

		public function obtenerTodosLocalidades(){
			include __SITE_PATH . '/model/' . 'ubicacionModel.php';
			$ubicModel = new ubicacionModel;
			$locs = $ubicModel->obtenerTodosLocalidades();
			$this->registry->template->lista_localidades = $locs;
			$this->registry->template->show('listado_localidades');
		}

		public function otenerTodosServiciosPublicados(){

			$this->registry->template->show('listado_servicios_publicados');	
		}
	

	}
	
?>