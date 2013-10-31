<?php

	class usuarioModel {
		
		public function obtenerTodosLosUsuarios(){
			$usuarios = array("fulano","mengano","sultano");
			$json_response = json_encode($usuarios);	 
			echo $json_response;
		}
		
		public function registrarUsuario($usr,$ci,$nombre,$apellido,$pass1,$pass2,$celular,$direccion,$id_barrio,$ubicacion_latitud,$ubicacion_longitud){
			
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
						
			require_once('database/MysqliDb.php');
			$db = new MysqliDb('localhost', 'root', 'ms_admin', 'tecnico_ya_database');
			$checkUser = $db->findByUser($usr);
			if ($checkUser !== false){
				array_push($respuesta, 'usr_already_exists');
			}
                        
                        $id_ubicacion = null;
                        if (empty($ubicacion_latitud) || empty($ubicacion_longitud)){
                            $insertData = array( 
                                'latitud' => $ubicacion_latitud, 
                                'longitud' => $ubicacion_longitud
                            );
                            $id_ubicacion = $db->insert('tbl_ubicacion', $insertData);
                        }
			if (empty($respuesta)) {				
				
				$pass1 = md5($pass1);
				$insertData = array(                                    
                                    'email'    => $usr,
                                    'ci' => $ci,
                                    'nombres'  => $nombre,
                                    'apellidos'  => $apellido,
                                    'contrasenia' => $pass1,
                                    'celular' => $celular,
                                    'direccion' => $direccion,
                                    'habilitado' => true,
                                    'fk_barrio' => $id_barrio,
                                    'fk_ubicacion' => $id_ubicacion
                                );
				$id_insertado = $db->insert('tbl_usuarios', $insertData);
                                
                                $insertData1 = array( 
                                    'email' => $usr
                                );                                
                                $tabla = "";
                                if ( strcmp($tipo,"tecnico") == 0 ){
                                    $tabla = "tbl_tecnicos";                                    
                                } else {
                                    $tabla = "tbl_clientes";                                    
                                }
                                $id_insertado1 = $db->insert($tabla, $insertData1);			
				
				if ($id_insertado !== false && $id_insertado1 !== false)
					array_push($respuesta, 'OK');
				else 
					array_push($respuesta, 'FALLA');
			} else {
				array_push($respuesta, 'FALLA');
			}
			$json_response = json_encode($respuesta);
			return $json_response;
		}
		
	}

?>
