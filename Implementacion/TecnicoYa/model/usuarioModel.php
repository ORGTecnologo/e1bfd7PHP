<?php

	class usuarioModel {
		
		public function obtenerTodosLosUsuarios(){
			$usuarios = array("fulano","mengano","sultano");
			$json_response = json_encode($usuarios);	 
			echo $json_response;
		}
		
		public function registrarUsuario($usr, $pass1, $nombre, $apellido,$sexo, $nacimiento, $celular, $mail, $ci,  $direccion){
			
			$respuesta = array();
			if (empty($usr))
				array_push($respuesta, 'usuario_requerido');
			if (empty($pass1))
				array_push($respuesta, 'pass1_requerida');	
						
			require_once('database/MysqliDb.php');
			$db = new MysqliDb('localhost', 'root', 'ms_admin', 'tecnico_ya_database');
			$checkUser1 = $db->usuario_findByNick($usr);
			if ($checkUser1 !== false){
				array_push($respuesta, 'usuario_ya_existente');
			}
                        $checkUser2 = $db->usuario_findByEmail($mail);
			if ($checkUser2 !== false){
				array_push($respuesta, 'usuario_ya_existente');
			}                        

			if (empty($respuesta)) {				
				
                                $true = 1;
				$pass1 = md5($pass1);
				$insertData = array(                                    
                                    'email'    => $mail,
                                    'nick'    => $usr,
                                    'ci' => $ci,
                                    'nombres'  => $nombre,
                                    'apellidos'  => $apellido,
                                    'contrasenia' => $pass1,
                                    'celular' => $celular,
                                    'sexo' => $sexo,
                                    'direccion' => $direccion,
                                    'habilitado' => $true,
                                    'fecha_nacimiento' => $nacimiento
                                );
				$id_insertado = $db->insert('tbl_usuarios', $insertData);
                                
                                $insertData1 = array( 
                                    'email' => $mail
                                );                             
                                $id_insertado1 = $db->insert("tbl_clientes", $insertData1);			
				
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
