<?php

	class usuarioModel {
		
		public function obtenerTodosLosUsuarios(){
			$usuarios = array("fulano","mengano","sultano");
			$json_response = json_encode($usuarios);	 
			echo $json_response;
		}
		
		public function registrarUsuario($usr,$pass1,$pass2,$nombre,$apellido,$fechaNac,$tipo){
			
			$respuesta = array();
			if (empty($usr))
				array_push($respuesta, 'usuario_required');
			if (empty($pass1))
				array_push($respuesta, 'pass1_required');
			if (empty($pass2))
				array_push($respuesta, 'pass2_required');
			if (empty($tipo))
				array_push($respuesta, 'tipo_required');
			if (strcmp($pass2 , $pass2) != 0)
				array_push($respuesta, 'pass_confirm_fail');
				
			if (empty($respuesta)) {
				require_once('database/MysqliDb.php');

				$db = new MysqliDb('localhost', 'root', 'root', 'tecnico_ya_database');
				$insertData = array('usuario'    => $usr,'nombres' => $nombre,'apellidos'  => $apellido,'contrasenia'  => $pass1);
				$results = $db->insert('tbl_usuarios', $insertData);
				if (strcmp($tipo,'Cliente') == 0){
					$insertData = array('usuario'    => $usr,'direccion' => '','habilitado'  => true);
					$results = $db->insert('tbl_clientes', $insertData);
				} else {
					$insertData = array('usuario'    => $usr,'habilitado' => true);
					$results = $db->insert('tbl_tenicos', $insertData);
				}		
				
				$results = $db->get('tbl_usuarios');
				print_r($results);					
				
				if (results == false)
					array_push($respuesta, 'FALLA');
				else 
					array_push($respuesta, 'OK');
			} else {
				array_push($respuesta, 'FALLA');
			}
			$json_response = json_encode($respuesta);
			echo $json_response;
		}
		
	}

?>
