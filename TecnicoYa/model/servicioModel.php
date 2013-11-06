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

        $json_response = json_encode($respuesta);
        return $json_response;
    }

    public function obtenerTodosServicios(){
        
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  
        $servicios = $db->servicios_getTodos();
        return $servicios;
    }

}
?>
