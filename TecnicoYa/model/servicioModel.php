<?php

class servicioModel {

    public function altaServicio($nombre, $descripcion) {

        $respuesta = array();
        $errs = array();
        if (empty($nombre))
            array_push($errs, 'nombre_requerido');
        if (empty($descripcion))
            array_push($errs, 'nombre_requerido');

        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  

        $serv = $db->servicio_findByName($nombre);
        if ($serv !== false) {
            array_push($errs, 'nombre_ya_existente');
        }

        if (empty($respuesta)) {
            $insertData = array(
                'nombre' => $nombre,
                'descripcion' => $descripcion
            );
            $id_insertado = $db->insert('tbl_servicios', $insertData);
            if ($id_insertado !== false)
                $respuesta['resultado'] = 'OK';
            else
                $respuesta['resultado'] = 'FALLA';
        }
        if (strcmp($respuesta['resultado'], 'FALLA'))
            $respuesta['errores'] = $errs;

        //$json_response = json_encode($respuesta);
        return $respuesta;
    }

    public function obtenerTodosServicios(){        
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  
        $servicios = $db->servicios_getTodos();
        return $servicios;
    }

    public function modificarServicio($id,$nombre,$descripcion){
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  
        $ok = $db->servicios_updateServicio($id,$nombre,$descripcion);
        return $ok;
    }

    public function cambiarEstadoServicio($id){
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  
        $ser = $db->servicios_getById($id);
        //var_dump($ser["habilitado"]);
        $habilitado = ($ser["habilitado"] == 0 ? 1 : 0);     
        $ok = $db->servicios_updateEstadoServicio($id,$habilitado);
        return $ok;
    }

    public function deshablitarServicio($id){
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  

        $habilitado = 0;
        $ok = $db->servicios_updateEstadoServicio($id,$habilitado);
        return $ok;
    }

}
?>
