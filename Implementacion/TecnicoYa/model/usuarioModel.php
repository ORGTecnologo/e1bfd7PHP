<?php

	class usuarioModel {
		
		public function obtenerTodosLosUsuarios(){
			$usuarios = array("fulano","mengano","sultano");
			$json_response = json_encode($usuarios);	 
			echo $json_response;
		}
		
		public function registrarUsuario($usr, $pass1, $nombre, $apellido,$sexo, $nacimiento, $celular, $mail, $ci,  $direccion){
			
			$respuesta = array();
                        $errs = array();
			if (empty($usr))
				array_push($errs, 'usuario_requerido');
			if (empty($pass1))
				array_push($errs, 'pass1_requerida');	
						
			require_once('database/MysqliDb.php');
			$db = MysqliDb::getInstance();
			$checkUser1 = $db->usuario_findByNick($usr);
			if ($checkUser1 !== false){
				array_push($errs, 'usuario_ya_existente_nick');
			}
                        $checkUser2 = $db->usuario_findByEmail($mail);
			if ($checkUser2 !== false){
				array_push($errs, 'usuario_ya_existente_mail');
			}   
                        $checkUser3 = $db->usuario_findByCi($ci);
			if ($checkUser3 !== false){
				array_push($errs, 'usuario_ya_existente_ci');
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
					$respuesta["resultado"] =  'OK';
				else 
					$respuesta["resultado"] = 'FALLA';
			} else {
				$respuesta["resultado"] = 'FALLA';
			}
                        
                        if (strcmp($respuesta["resultado"] , 'FALLA') == 0 )
                                $respuesta["errores"] = $errs;
                        
			$json_response = json_encode($respuesta);                        
			return $json_response;
		}
		
	}

?>
