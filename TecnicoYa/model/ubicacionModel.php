<?php

class ubicacionModel {

    /*#################################### PAISES ####################################*/

    public function altaPais($nombre) {

        $respuesta = array();
        $errs = array();
        if (empty($nombre))
            array_push($errs, 'nombre_requerido');

        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  

        $serv = $db->paises_findByName($nombre);
        if ($serv !== false) {
            array_push($errs, 'Nombre ya utilizado');
        }

        if (empty($respuesta)) {
            $insertData = array(
                'nombre_pais' => $nombre,
            );
            $id_insertado = $db->insert('tbl_paises', $insertData);
            if ($id_insertado !== false)
                $respuesta['resultado'] = 'OK';
            else
                $respuesta['resultado'] = 'FALLA';
        }
        if (strcmp($respuesta['resultado'], 'FALLA'))
            $respuesta['errores'] = $errs;

        return $respuesta;
    }

    public function modificarPais($id,$nombre){
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  
        $ok = $db->paises_updatePais($id,$nombre);
        return $ok;
    }

    public function obtenerTodosPaises(){        
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  
        $resp = $db->paises_getTodos();
        return $resp;
    }

    /*#################################### DEPARTAMENTOS ####################################*/

    public function altaDepartamento($nombre,$idPais) {

        $respuesta = array();
        $errs = array();
        if (empty($nombre))
            array_push($errs, 'Nombre obligatorio');

        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  

        if (empty($errs)) {
            $insertData = array(
                'nombre_departamento' => $nombre,
                'fk_pais' => $idPais,
            );
            $id_insertado = $db->insert('tbl_departamentos', $insertData);
            if ($id_insertado !== false)
                $respuesta['resultado'] = 'OK';
            else
                $respuesta['resultado'] = 'FALLA';
        }
        if (strcmp($respuesta['resultado'], 'FALLA'))
            $respuesta['errores'] = $errs;

        return $respuesta;
    }

    public function modificarDepartamento($id,$nombre, $idPais){
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  
        $ok = $db->deptos_updateDepartamento($id,$nombre, $idPais);
        return $ok;
    }

    public function obtenerTodosDepartamentos(){
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  
        $resp = $db->deptos_getTodos();
        return $resp;
    }

    public function obtenerDeptosPorPais($idPais){
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  
        $resp = $db->deptos_getDeptosByPais($idPais);
        return $resp;
    }

    /*#################################### LOCALIDADES ####################################*/

    public function altaLocalidad($nombre,$idDepto) {

        $respuesta = array();
        $errs = array();
        if (empty($nombre))
            array_push($errs, 'Nombre obligatorio');

        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  

        if (empty($errs)) {
            $insertData = array(
                'nombre_localidad' => $nombre,
                'fk_departamento' => $idDepto,
            );
            $id_insertado = $db->insert('tbl_localidades', $insertData);
            if ($id_insertado !== false)
                $respuesta['resultado'] = 'OK';
            else
                $respuesta['resultado'] = 'FALLA';
        }
        if (strcmp($respuesta['resultado'], 'FALLA'))
            $respuesta['errores'] = $errs;

        return $respuesta;
    }

    function modificarLocalidad($id,$nombre,$idDepto){
        $errs = array();
        if (!isset($nombre))
            array_push($errs, "Nombre obligatorio");

        if (empty($errs)){
            require_once('database/MysqliDb.php');
            $db = MysqliDb::getInstance();  
            $resp = $db->localidades_updateLocalidad($id,$nombre,$idDepto);
        } else {
            $resp["resultado"] = "FALLA";
            $resp["errores"] = $errs;
        }
        return $resp;
    }

    public function obtenerLocalidadesPorDepto($idDepto){
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  
        $resp = $db->localidades_getLocalidadesByDepto($idDepto);
        return $resp;
    }    

    public function obtenerTodosLocalidades(){
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  
        $resp = $db->localidades_getTodos();
        return $resp;
    }

}
?>
