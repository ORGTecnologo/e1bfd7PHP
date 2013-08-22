<?php

class SQLUtils {
    
    const DB_PORT = "db_port";
    const DB_HOST = "db_host";
    const DB_NAME = "db_name";
    const DB_USER = "db_user";
    const DB_PASSWORD = "db_password";    
    
    public static function getProperty($key) {
        $init = parse_ini_file('Configuracion.properties');
        return $init["db_password"];
    }

}

?>
