<?php

class servicioModel {

    public function altaServicio($nombre, $descripcion) {

        $respuesta = array();
        if (empty($nombre))
            array_push($respuesta, 'nombre_requerido');
        if (empty($descripcion))
            array_push($respuesta, 'nombre_requerido');

        require_once('database/MysqliDb.php');
        $db = new MysqliDb('localhost', 'root', 'ms_admin', 'tecnico_ya_database');

        $serv = $db->servicio_findByName($nombre);
        if ($serv !== false) {
            array_push($respuesta, 'nombre_ya_existente');
        }

        if (empty($respuesta)) {
            $insertData = array(
                'nombre' => $nombre,
                'descripcion' => $descripcion
            );
            $id_insertado = $db->insert('tbl_servicos', $insertData);
            if ($id_insertado !== false)
                array_push($respuesta, 'OK');
            else
                array_push($respuesta, 'FALLA');
        }
        $json_response = json_encode($respuesta);
        return $json_response;
    }

}
?>
