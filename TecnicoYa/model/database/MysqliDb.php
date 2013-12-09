<?php

/**
 * MysqliDb Class
 *
 * @category  Database Access
 * @package   MysqliDb
 * @author    Jeffery Way <jeffrey@jeffrey-way.com>
 * @author    Josh Campbell <jcampbell@ajillion.com>
 * @copyright Copyright (c) 2010
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @version   1.1
 * */
class MysqliDb {

    /**
     * Static instance of self
     *
     * @var MysqliDb
     */
    protected static $_instance;

    /**
     * MySQLi instance
     *
     * @var mysqli
     */
    protected $_mysqli;

    /**
     * The SQL query to be prepared and executed
     *
     * @var string
     */
    protected $_query;

    /**
     * An array that holds where conditions 'fieldname' => 'value'
     *
     * @var array
     */
    protected $_where = array();

    /**
     * Dynamic type list for where condition values
     *
     * @var array
     */
    protected $_whereTypeList;

    /**
     * Dynamic type list for table data values
     *
     * @var array
     */
    protected $_paramTypeList;

    /**
     * Dynamic array that holds a combination of where condition/table data value types and parameter referances
     *
     * @var array
     */
    protected $_bindParams = array(''); // Create the empty 0 index

    /**
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $db
     * @param int $port
     */

    private function __construct($host, $username, $password, $db, $port = NULL) {
        if ($port == NULL)
            $port = ini_get('mysqli.default_port');

        $this->_mysqli = new mysqli($host, $username, $password, $db, $port) or die('There was a problem connecting to the database');
        if($this->_mysqli->connect_errno > 0){ 
            die('Unable to connect to database [' . $_mysqli->connect_error . ']');
        }   
        $this->_mysqli->set_charset('utf8');

        self::$_instance = $this;
        
        $this->_paramTypeList = "";
    }

    /**
     * A method of returning the static instance to allow access to the
     * instantiated object from within another class.
     * Inheriting this class would require reloading connection info.
     *
     * @uses $db = MySqliDb::getInstance();
     *
     * @return object Returns the current instance.
     */
    public static function getInstance() {
        if (self::$_instance == null){
            //self::$_instance = new MysqliDb('127.0.0.1', 'root', 'alfalfa', 'tecnico_ya_database');
            self::$_instance = new MysqliDb('localhost', 'root', 'ms_admin', 'tecnico_ya_database');
        }
        return self::$_instance;
    }

    /**
     * Reset states after an execution
     *
     * @return object Returns the current instance.
     */
    protected function reset() {
        $this->_where = array();
        $this->_bindParams = array(''); // Create the empty 0 index
        unset($this->_query);
        unset($this->_whereTypeList);
        unset($this->_paramTypeList);
    }

    /**
     * Pass in a raw query and an array containing the parameters to bind to the prepaird statement.
     *
     * @param string $query      Contains a user-provided query.
     * @param array  $bindParams All variables to bind to the SQL statment.
     *
     * @return array Contains the returned rows from the query.
     */
    public function rawQuery($query, $bindParams = null) {
        $this->_query = filter_var($query, FILTER_SANITIZE_STRING);
        $stmt = $this->_prepareQuery();

        if (is_array($bindParams) === true) {
            $params = array(''); // Create the empty 0 index
            foreach ($bindParams as $prop => $val) {
                $params[0] .= $this->_determineType($val);
                array_push($params, $bindParams[$prop]);
            }

            call_user_func_array(array($stmt, 'bind_param'), $this->refValues($params));
        }

        $stmt->execute();
        $this->reset();

        return $this->_dynamicBindResults($stmt);
    }

    /**
     *
     * @param string $query   Contains a user-provided select query.
     * @param int    $numRows The number of rows total to return.
     *
     * @return array Contains the returned rows from the query.
     */
    public function query($query, $numRows = null) {
        $this->_query = filter_var($query, FILTER_SANITIZE_STRING);
        $stmt = $this->_buildQuery($numRows);
        $stmt->execute();
        $this->reset();

        return $this->_dynamicBindResults($stmt);
    }

    /**
     * A convenient SELECT * function.
     *
     * @param string  $tableName The name of the database table to work with.
     * @param integer $numRows   The number of rows total to return.
     *
     * @return array Contains the returned rows from the select query.
     */
    public function get($tableName, $numRows = null) {
        $this->_query = "SELECT * FROM $tableName";
        $stmt = $this->_buildQuery($numRows);
        $stmt->execute();
        $this->reset();

        return $this->_dynamicBindResults($stmt);
    }

    /**
     *
     * @param <string $tableName The name of the table.
     * @param array $insertData Data containing information for inserting into the DB.
     *
     * @return boolean Boolean indicating whether the insert query was completed succesfully.
     */
    public function insert($tableName, $insertData) {
        $this->_query = "INSERT into $tableName";
        $stmt = $this->_buildQuery(null, $insertData);
        $stmt->execute();
        $this->reset();

        return ($stmt->affected_rows > 0 ? $stmt->insert_id : false);
    }

    /**
     * Update query. Be sure to first call the "where" method.
     *
     * @param string $tableName The name of the database table to work with.
     * @param array  $tableData Array of data to update the desired row.
     *
     * @return boolean
     */
    public function update($tableName, $tableData) {
        $this->_query = "UPDATE $tableName SET ";

        $stmt = $this->_buildQuery(null, $tableData);
        $stmt->execute();
        $this->reset();

        return ($stmt->affected_rows > 0);
    }

    /**
     * Delete query. Call the "where" method first.
     *
     * @param string  $tableName The name of the database table to work with.
     * @param integer $numRows   The number of rows to delete.
     *
     * @return boolean Indicates success. 0 or 1.
     */
    public function delete($tableName, $numRows = null) {
        $this->_query = "DELETE FROM $tableName";

        $stmt = $this->_buildQuery($numRows);
        $stmt->execute();
        $this->reset();

        return ($stmt->affected_rows > 0);
    }

    /**
     * This method allows you to specify multipl (method chaining optional) WHERE statements for SQL queries.
     *
     * @uses $MySqliDb->where('id', 7)->where('title', 'MyTitle');
     *
     * @param string $whereProp  The name of the database field.
     * @param mixed  $whereValue The value of the database field.
     *
     * @return MysqliDb
     */
    public function where($whereProp, $whereValue) {
        $this->_where[$whereProp] = $whereValue;
        return $this;
    }

    /**
     * This methods returns the ID of the last inserted item
     *
     * @return integer The last inserted item ID.
     */
    public function getInsertId() {
        return $this->_mysqli->insert_id;
    }

    /**
     * Escape harmful characters which might affect a query.
     *
     * @param string $str The string to escape.
     *
     * @return string The escaped string.
     */
    public function escape($str) {
        return $this->_mysqli->real_escape_string($str);
    }

    /**
     * This method is needed for prepared statements. They require
     * the data type of the field to be bound with "i" s", etc.
     * This function takes the input, determines what type it is,
     * and then updates the param_type.
     *
     * @param mixed $item Input to determine the type.
     *
     * @return string The joined parameter types.
     */
    protected function _determineType($item) {
        switch (gettype($item)) {
            case 'NULL':
            case 'string':
                return 's';
                break;

            case 'integer':
                return 'i';
                break;

            case 'blob':
                return 'b';
                break;

            case 'double':
                return 'd';
                break;
        }
        return '';
    }

    /**
     * Abstraction method that will compile the WHERE statement,
     * any passed update data, and the desired rows.
     * It then builds the SQL query.
     *
     * @param int   $numRows   The number of rows total to return.
     * @param array $tableData Should contain an array of data for updating the database.
     *
     * @return mysqli_stmt Returns the $stmt object.
     */
    protected function _buildQuery($numRows = null, $tableData = null) {
        $hasTableData = is_array($tableData);
        $hasConditional = !empty($this->_where);

        // Did the user call the "where" method?
        if (!empty($this->_where)) {

            // if update data was passed, filter through and create the SQL query, accordingly.
            if ($hasTableData) {
                $pos = strpos($this->_query, 'UPDATE');
                if ($pos !== false) {
                    foreach ($tableData as $prop => $value) {
                        // determines what data type the item is, for binding purposes.
                        $this->_paramTypeList .= $this->_determineType($value);

                        // prepares the reset of the SQL query.
                        $this->_query .= ($prop . ' = ?, ');
                    }
                    $this->_query = rtrim($this->_query, ', ');
                }
            }

            //Prepair the where portion of the query
            $this->_query .= ' WHERE ';
            foreach ($this->_where as $column => $value) {
                // Determines what data type the where column is, for binding purposes.
                $this->_whereTypeList .= $this->_determineType($value);

                // Prepares the reset of the SQL query.
                $this->_query .= ($column . ' = ? AND ');
            }
            $this->_query = rtrim($this->_query, ' AND ');
        }

        // Determine if is INSERT query
        if ($hasTableData) {
            $pos = strpos($this->_query, 'INSERT');

            if ($pos !== false) {
                //is insert statement
                $keys = array_keys($tableData);
                $values = array_values($tableData);
                $num = count($keys);

                // wrap values in quotes
                foreach ($values as $key => $val) {
                    $values[$key] = "'{$val}'";
                    $this->_paramTypeList .= $this->_determineType($val);
                }

                $this->_query .= '(' . implode($keys, ', ') . ')';
                $this->_query .= ' VALUES(';
                while ($num !== 0) {
                    $this->_query .= '?, ';
                    $num--;
                }
                $this->_query = rtrim($this->_query, ', ');
                $this->_query .= ')';
            }
        }

        // Did the user set a limit
        if (isset($numRows)) {
            $this->_query .= ' LIMIT ' . (int) $numRows;
        }

        // Prepare query
        $stmt = $this->_prepareQuery();

        // Prepare table data bind parameters
        if ($hasTableData) {
            $this->_bindParams[0] = $this->_paramTypeList;
            foreach ($tableData as $prop => $val) {
                array_push($this->_bindParams, $tableData[$prop]);
            }
        }
        // Prepare where condition bind parameters
        if ($hasConditional) {
            if ($this->_where) {
                $this->_bindParams[0] .= $this->_whereTypeList;
                foreach ($this->_where as $prop => $val) {
                    array_push($this->_bindParams, $this->_where[$prop]);
                }
            }
        }
        // Bind parameters to statment
        if ($hasTableData || $hasConditional) {
            call_user_func_array(array($stmt, 'bind_param'), $this->refValues($this->_bindParams));
        }

        return $stmt;
    }

    /**
     * This helper method takes care of prepared statements' "bind_result method
     * , when the number of variables to pass is unknown.
     *
     * @param mysqli_stmt $stmt Equal to the prepared statement object.
     *
     * @return array The results of the SQL fetch.
     */
    protected function _dynamicBindResults(mysqli_stmt $stmt) {
        $parameters = array();
        $results = array();

        $meta = $stmt->result_metadata();

        $row = array();
        while ($field = $meta->fetch_field()) {
            $row[$field->name] = null;
            $parameters[] = & $row[$field->name];
        }

        call_user_func_array(array($stmt, 'bind_result'), $parameters);

        while ($stmt->fetch()) {
            $x = array();
            foreach ($row as $key => $val) {
                $x[$key] = $val;
            }
            array_push($results, $x);
        }
        return $results;
    }

    /**
     * Method attempts to prepare the SQL query
     * and throws an error if there was a problem.
     *
     * @return mysqli_stmt
     */
    protected function _prepareQuery() {
        if (!$stmt = $this->_mysqli->prepare($this->_query)) {
            trigger_error("Problem preparing query ($this->_query) " . $this->_mysqli->error, E_USER_ERROR);
        }
        return $stmt;
    }

    /**
     * Close connection
     */
    public function __destruct() {
        $this->_mysqli->close();
    }

    /**
     * @param array $arr
     *
     * @return array
     */
    protected function refValues($arr) {
        //Reference is required for PHP 5.3+
        if (strnatcmp(phpversion(), '5.3') >= 0) {
            $refs = array();
            foreach ($arr as $key => $value) {
                $refs[$key] = & $arr[$key];
            }
            return $refs;
        }
        return $arr;
    }

    /*
     * 
     *  CUSTOM QUERIES
     * 
     * */

    /* USUARIOS */
    public function usuario_findByNick($nick) {
        $mysqli = $this->getConnection();
        $statement = $mysqli->prepare("
            select nick, email ,
            case 
                when exists( select * from tbl_usuarios u join tbl_clientes c on u.email = c.email) then 'usuario_cliente'
                when exists( select * from tbl_usuarios u join tbl_administradores a on u.email = a.email) then 'usuario_administrador'
                when exists( select * from tbl_usuarios u join tbl_tecnicos t on u.email = t.email) then 'usuario_tecnico'
                else 'otro'
            end as tipo_usuario
            from tbl_usuarios
            where nick = ?
        ");
        if ($statement === false) {
            trigger_error("[usuario_findByNick] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('s', $nick);
        $statement->execute();
        $result = $statement->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            return $row;
        }
        return false;
    }

    public function usuario_findByEmail($mail) {
        $mysqli = $this->getConnection();
        $statement = $mysqli->prepare("            
            select nick, email ,
            case 
                when exists( select * from tbl_usuarios u join tbl_clientes c on u.email = c.email) then 'usuario_cliente'
                when exists( select * from tbl_usuarios u join tbl_administradores a on u.email = a.email) then 'usuario_administrador'
                when exists( select * from tbl_usuarios u join tbl_tecnicos t on u.email = t.email) then 'usuario_tecnico'
                else 'otro'
            end as tipo_usuario,
            ci,nombres,apellidos,celular,direccion,habilitado 
            from tbl_usuarios
            where email = ?
        ");
        if ($statement === false) {
            trigger_error("[usuario_findByUser] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('s', $mail);
        $statement->execute();
        $result = $statement->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            return $row;
        }
        return false;
    }


    public function usuario_findByCi($ci) {
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            select nick, email ,
            case 
                when exists( select * from tbl_usuarios u join tbl_clientes c on u.email = c.email) then 'usuario_cliente'
                when exists( select * from tbl_usuarios u join tbl_administradores a on u.email = a.email) then 'usuario_administrador'
                when exists( select * from tbl_usuarios u join tbl_tecnicos t on u.email = t.email) then 'usuario_tecnico'
                else 'otro'
            end as tipo_usuario
            from tbl_usuarios
            where ci = ?
        ");
        //SELECT email,nick,contrasenia FROM tbl_usuarios WHERE ci = ?
        if ($statement === false) {
            trigger_error("[servicio_findByName] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('s', $ci);
        $statement->execute();
        $result = $statement->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {            
            return $row;
        }
        return false;
    }

    public function usuario_findByUserAndPAssword($usr,$pwd) {
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            select nick, email ,
            case 
                when exists( select * from tbl_usuarios u join tbl_clientes c on u.email = c.email) then 'usuario_cliente'
                when exists( select * from tbl_usuarios u join tbl_administradores a on u.email = a.email) then 'usuario_administrador'
                when exists( select * from tbl_usuarios u join tbl_tecnicos t on u.email = t.email) then 'usuario_tecnico'
                else 'otro'
            end as tipo_usuario
            from tbl_usuarios
            where email = ? and contrasenia = ?
        ");
        //SELECT email,nick,contrasenia FROM tbl_usuarios WHERE ci = ?
        if ($statement === false) {
            trigger_error("[servicio_findByName] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('ss', $usr,$pwd);
        $statement->execute();
        $result = $statement->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {            
            return $row;
        }
        return false;
    }

    public function usuario_findAdminByUserAndPAssword($usr,$pwd) {
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            select nick, email , 'usuario_administrador' as tipo_usuario            
            from tbl_usuarios u
            where email = ? and contrasenia = ? and
                exists(select * from tbl_administradores where email = ?)
        ");
        //SELECT email,nick,contrasenia FROM tbl_usuarios WHERE ci = ?
        if ($statement === false) {
            trigger_error("[servicio_findByName] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('sss', $usr,$pwd,$usr);
        $statement->execute();
        $result = $statement->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {            
            return $row;
        }
        return false;
    }


    /* SERVICIOS */
    public function servicio_findByName($name) {
        $mysqli = $this->getConnection();
        $statement = $mysqli->prepare("SELECT id_servicio,nombre,descripcion,habilitado FROM tbl_servicios WHERE nombre = ?");
        if ($statement === false) {
            trigger_error("[servicio_findByName] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('s', $name);
        $statement->execute();
        $result = $statement->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            return $row;
        }
        return false;
    }

    public function servicios_getTodos() {
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            select id_servicio,nombre,descripcion,habilitado from tbl_servicios
        ");
        if ($statement === false) {
            trigger_error("[servicio_findByName] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->execute();
        $result = $statement->get_result();
        $servicios = array();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {            
            array_push($servicios , $row);
        }
        return $servicios;
    }

    public function servicios_getById($id){
        $mysqli = $this->getConnection();                
        $statement = $mysqli->prepare("
            select id_servicio,nombre,descripcion,habilitado from tbl_servicios where id_servicio=?
        ");
        if ($statement === false) {
            trigger_error("[servicio_findByName] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('i',$id);
        $statement->execute();
        $result = $statement->get_result();        
        return $result->fetch_assoc();
    }

    public function serviciosdeTecnico_getById($id){
        $mysqli = $this->getConnection();                
        $statement = $mysqli->prepare("
            select fk_tecnico,precio_servicio from tbl_tecnico_ofrece_servicio where fk_servicio=? 
        ");
        if ($statement === false) {
            trigger_error("[servicio_findByName] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('i',$id);
        $statement->execute();
        $result = $statement->get_result();        
        return $result->fetch_assoc();
    }


    public function servicios_updateServicio($id,$nombre,$descripcion) {
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            update tbl_servicios set nombre = ?, descripcion = ? where id_servicio = ?
        ");
        if ($statement === false) {
            trigger_error("[servicios_updateServicio] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('ssi', $nombre,$descripcion,$id);
        return ($statement->execute());        
    }

    public function servicios_updateEstadoServicio($id,$habilitado) {
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            update tbl_servicios set habilitado = ? where id_servicio = ?
        ");
        if ($statement === false) {
            trigger_error("[servicios_updateServicio] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('ii',$habilitado,$id);
        return ($statement->execute());        
    }

    public function servicios_obtenerTodosPorTecnico($tecnico){
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            select * 
            from (tbl_tecnicos t join tbl_tecnico_ofrece_servicio ts on t.email = ts.fk_tecnico) 
            join tbl_servicios s on (s.id_servicio = ts.fk_servicio)
            where t.email= ?
        ");
        if ($statement === false) {
            trigger_error("[servicios_obtenerTodosPorTecnico] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('s', $tecnico);
        $statement->execute();
        $result = $statement->get_result();
        $servs = array();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {            
            array_push($servs , $row);
        }
        return $servs;
    }

    public function servicios_obtenerTodosOfrecidos(){
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            select * 
            from (tbl_usuarios t join tbl_tecnico_ofrece_servicio ts on t.email = ts.fk_tecnico) 
            join tbl_servicios s on (s.id_servicio = ts.fk_servicio)
        ");
        if ($statement === false) {
            trigger_error("[servicios_obtenerTodosOfrecidos] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->execute();
        $result = $statement->get_result();
        $servs = array();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {            
            array_push($servs , $row);
        }
        return $servs;
    }

    public function servicios_ofrecidoPorUsuarioYServicio($tecnico,$idServicio){
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            select * from tbl_tecnico_ofrece_servicio where fk_tecnico = ? and fk_servicio = ?;
        ");
        if ($statement === false) {
            trigger_error("[servicios_obtenerTodosOfrecidos] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('si', $tecnico,$idServicio);
        $statement->execute();
        $result = $statement->get_result();
        $servs = array();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {            
            array_push($servs , $row);
        }
        return (empty($servs) ? false : $servs);
    }

    public function servicios_eliminarServicioOfrecido($tecnico,$idServicio) {
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            delete from tbl_tecnico_ofrece_servicio where fk_servicio = ? and fk_tecnico = ?
        ");
        if ($statement === false) {
            trigger_error("[servicios_updateServicio] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('is',$idServicio,$tecnico);
        return ($statement->execute());        
    }

    public function paises_getTodos() {
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            select id_pais as 'id_pais',nombre_pais as 'nombre_pais' from tbl_paises
        ");
        if ($statement === false) {
            trigger_error("[paises_getAll] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->execute();
        $result = $statement->get_result();
        $paises = array();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {            
            array_push($paises , $row);
        }
        return $paises;
    }

    /* FUNCIONES AUXILIARES */
    private function getConnection(){
        return $this->_mysqli;
    }

    public function paises_updatePais($id,$nombre) {
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            update tbl_paises set nombre_pais = ? where id_pais = ?
        ");
        if ($statement === false) {
            trigger_error("[paises_updatePais] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('si', $nombre,$id);
        return ($statement->execute());        
    }

    public function paises_findByName($name) {
        $mysqli = $this->getConnection();
        $statement = $mysqli->prepare("SELECT id_pais,nombre_pais FROM tbl_paises WHERE nombre_pais = ?");
        if ($statement === false) {
            trigger_error("[paises_findByName] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('s', $name);
        $statement->execute();
        $result = $statement->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            return $row;
        }
        return false;
    }

    public function deptos_getTodos() {
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            select d.id_departamento,d.nombre_departamento, p.id_pais, p.nombre_pais from tbl_departamentos d join tbl_paises p on (p.id_pais = d.fk_pais)
        ");
        if ($statement === false) {
            trigger_error("[deptos_getAll] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->execute();
        $result = $statement->get_result();
        $deptos = array();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {            
            array_push($deptos , $row);
        }
        return $deptos;
    }

    public function deptos_getDeptosByPais($idPais) {
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            select d.id_departamento,d.nombre_departamento, p.id_pais, p.nombre_pais from tbl_departamentos d join tbl_paises p on (p.id_pais = d.fk_pais)
            where p.id_pais = ?
        ");
        if ($statement === false) {
            trigger_error("[deptos_getPorPais] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('i', $idPais);
        $statement->execute();
        $result = $statement->get_result();
        $deptos = array();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {            
            array_push($deptos , $row);
        }
        return $deptos;
    }

    

    public function deptos_updateDepartamento($id,$nombre,$idPais) {
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            update tbl_departamentos set nombre_departamento = ?, fk_pais = ? where id_departamento = ?
        ");
        if ($statement === false) {
            trigger_error("[deptos_updatePais] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('sii', $nombre,$idPais,$id);
        return ($statement->execute());        
    }

    public function localidades_getTodos() {
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            select l.id_localidad, l.nombre_localidad, d.id_departamento, d.nombre_departamento,
            p.id_pais, p.nombre_pais
            from (tbl_paises p join tbl_departamentos d on (d.fk_pais = p.id_pais)) join
            tbl_localidades l on (l.fk_departamento = d.id_departamento)
        ");
        if ($statement === false) {
            trigger_error("[localidades_getAll] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->execute();
        $result = $statement->get_result();
        $localidades = array();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {            
            array_push($localidades , $row);
        }
        return $localidades;
    }

    public function localidades_getLocalidadesByDepto($idDepto) {
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            select l.id_localidad, l.nombre_localidad, d.id_departamento, d.nombre_departamento,
            p.id_pais, p.nombre_pais
            from (tbl_paises p join tbl_departamentos d on (d.fk_pais = p.id_pais)) join
            tbl_localidades l on (l.fk_departamento = d.id_departamento)
            where d.id_departamento = ?
        ");
        if ($statement === false) {
            trigger_error("[localidades_getAllByDepto] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('i', $idDepto);
        $statement->execute();
        $result = $statement->get_result();
        $localidades = array();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {            
            array_push($localidades , $row);
        }
        return $localidades;
    }

    function localidades_updateLocalidad($id,$nombre,$idDepto){
        $mysqli = $this->getConnection();
                
        $statement = $mysqli->prepare("
            update tbl_localidades set nombre_localidad = ?, fk_departamento = ? where id_localidad = ?
        ");
        if ($statement === false) {
            trigger_error("[deptos_updatePais] - Error en sentencia sql", E_USER_ERROR);
        }
        $statement->bind_param('sii', $nombre,$idDepto,$id);
        return ($statement->execute());   
    }



}

// END class
