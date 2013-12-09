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
        if (strcmp($respuesta['resultado'], 'FALLA') == 0)
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

    public function obtenerServiciosDeTecnico($tecnico){
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();
        $servicios = $db->servicios_obtenerTodosPorTecnico($tecnico);
        return $servicios;
    }

    public function obtenerServiciosOfrecidos(){
        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();
        $servicios = $db->servicios_obtenerTodosOfrecidos();
        return $servicios;
    }

    public function ofrecerNuevoServicio($idServicio, $precio, $urlFoto, $tecnico){
        $respuesta = array();
        $errs = array();
        if (empty($precio))
            array_push($errs, "Precio obligatorio");

        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();
        $servicios = $db->servicios_ofrecidoPorUsuarioYServicio($tecnico,$idServicio);

        if ($servicios !== false)
            array_push($errs, "Servicio ya ofrecido");
        
        if (empty($errs)){
            $insertData = array(
                'fk_tecnico' => $tecnico,
                'fk_servicio' => $idServicio,
                'precio_servicio' => $precio,
                'ruta_imagen' => $urlFoto,
            );
            $id_insertado = $db->insert('tbl_tecnico_ofrece_servicio', $insertData);
            if ($id_insertado !== false)
                $respuesta['resultado'] = 'OK';
            else
                $respuesta['resultado'] = 'FALLA';
        } else {
            $respuesta['resultado'] = 'FALLA';
        }

        if (strcmp($respuesta['resultado'], 'FALLA') == 0){
            $respuesta['errores'] = $errs;
            $respuesta['resultado'] = "FALLA";
        }

        return $respuesta;
    }

    public function contratarServicio($usr, $idServicio, $tecnico) {

        $respuesta = array();
        $errs = array();

        if (empty($usr))
            array_push($errs, 'usr_requerido');
        if (empty($idServicio))
            array_push($errs, 'idServicio_requerido');

        require_once('database/MysqliDb.php');
        $db = MysqliDb::getInstance();  

        $serv = $db->serviciosdeTecnico_getById($idServicio);
        if ($serv == false) {
            array_push($errs, 'servicio_no_existente');
        }

        if (empty($respuesta)) {
            $insertData = array(
                'fk_cliente' => $_SESSION["usuario"][1],
                'fk_servicio' => $idServicio,
                'fk_tecnico' => $serv['fk_tecnico'],
                'precio_final_servicio' => $serv['precio_servicio'],
            );
            $id_insertado = $db->insert('tbl_cliente_contrata_servicio', $insertData);

        }
        if (strcmp($respuesta['resultado'], 'FALLA'))
            $respuesta['errores'] = $errs;

        return $respuesta['resultado'];
    }
       
    function esServicioYaOfrecido($tecnico,$idServicio){
        require_once('database/MysqliDb.php');
        $resp = array();
        $db = MysqliDb::getInstance();
        $servicios = $db->servicios_ofrecidoPorUsuarioYServicio($tecnico,$idServicio);
        if ($servicios !== false)
            $resp["ofrecido"] = "TRUE";
        else 
            $resp["ofrecido"] = "FALSE";
        return $resp;        
    }

    function eliminarServicioOfrecido($tecnico,$idServicio) {
        require_once('database/MysqliDb.php');
        $resp = array();
        $db = MysqliDb::getInstance();
        $resp = $db->servicios_eliminarServicioOfrecido($tecnico,$idServicio);
        return $resp;
    }

}
?>
