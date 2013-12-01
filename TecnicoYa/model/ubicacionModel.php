<?php

class ubicacionModel {

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

    public function obtenerTodosPaises(){        
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  
        $paises = $db->paises_getTodos();
        return $paises;
    }

    public function obtenerTodosDepartamentos(){
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  
        $paises = $db->deptos_getTodos();
        return $paises;
    }

    public function modificarPais($id,$nombre){
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  
        $ok = $db->deptos_getTodos();
        return $ok;
    }

}
?>
