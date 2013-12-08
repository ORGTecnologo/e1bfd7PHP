<?php

	class usuarioModel {
		
		public function obtenerTodosLosUsuarios(){
			$usuarios = array("fulano","mengano","sultano");
			$json_response = json_encode($usuarios);	 
			echo $json_response;
		}

		public function logout(){
			if ($_SESSION["autenticado"])
				session_destroy();
			return true;
		}

		public function login($usuario,$contrasenia) {
			require_once('database/MysqliDb.php');
			$db = MysqliDb::getInstance();
			$usr = $db->usuario_findByUserAndPAssword($usuario,md5($contrasenia) );
			if ($usr !== false){
				$_SESSION["autenticado"] = true;
				$_SESSION["usuario"] = $usr;
			}
			return ($usr !== false);
		}

		public function loginAdmin($usuario,$contrasenia) {
			require_once('database/MysqliDb.php');
			$db = MysqliDb::getInstance();
			$usr = $db->usuario_findAdminByUserAndPAssword($usuario,md5($contrasenia) );
			if ($usr !== false){
				$_SESSION["autenticado"] = true;
				$_SESSION["usuario"] = $usr;
				return true;
			} else {
				return false;
			}
		}
		
		public function registrarUsuario($usr, $pass1, $nombre, $apellido,$sexo, $nacimiento, $celular, $mail, $ci,  $direccion,$tipoUsuario){
			
			$respuesta = array();
            $errs = array();
			if (empty($usr))
				array_push($errs, 'Usuario obligatorio');
			if (empty($pass1))
				array_push($errs, 'Contraseña requerida');	
						
			require_once('database/MysqliDb.php');
			$db = MysqliDb::getInstance();
			$checkUser1 = $db->usuario_findByNick($usr);
			if ($checkUser1 !== false){
				array_push($errs, 'Usuario ya existente');
			}
			//var_dump('check nick');   
			//var_dump($checkUser1);
            $checkUser2 = $db->usuario_findByEmail($mail);
			if ($checkUser2 !== false){
				array_push($errs, 'Email ya utilizado');
			}
			//var_dump('check mail');   
			//var_dump($checkUser2);
            $checkUser3 = $db->usuario_findByCi($ci);
			if ($checkUser3 !== false){
				array_push($errs, 'Cedula ya registrada');
			}    
			//var_dump('check ci');   
			//var_dump($checkUser3);

			if (empty($errs)) {				
				
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

            	$id_insertado1 = 0;
                if (strcmp($tipoUsuario, "usr_cliente") == 0)                             
                	$id_insertado1 = $db->insert("tbl_clientes", $insertData1);			
				else 
					$id_insertado1 = $db->insert("tbl_proveedores", $insertData1);			
				if ($id_insertado !== false && $id_insertado1 !== false)
					$respuesta["resultado"] =  'OK';
				else 
					$respuesta["resultado"] = 'FALLA';
			} else {
				$respuesta["resultado"] = 'FALLA';
			}
                        
            if (strcmp($respuesta["resultado"] , 'FALLA') == 0 )
            	$respuesta["errores"] = $errs;
            else {
            	$usuario = $db->usuario_findByEmail($mail);
            	$_SESSION["usuario"] = $usuario;
            	$_SESSION["autenticado"] = true;
            }                        
			//$json_response = json_encode($respuesta);                        
			return $respuesta;
		}

		function obtenerInfoDeUsuario($email){
			require_once('database/MysqliDb.php');
			$db = MysqliDb::getInstance();
			$usr = $db->usuario_findByEmail($email);
			return $usr;
		}
		
	}

?>
