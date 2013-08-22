<?php

/**
 * SQLUtils
 * Descripcion: Clase auxiliar con funcionalidad relativas
 * a conexion a base de datos. 
 */

class SQLUtils {
    
    public function getConnection(){
        try {
            return $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=pg_admin");
        } catch (Exception $e) {
            return null;
        }
    }
    
    
}

?>
