<?php

class RestService {

    private $supportedMethods;

    public function __construct($supportedMethods) {
        $this->supportedMethods = $supportedMethods;
    }

    public function handleRawRequest($server, $get, $post) {
        $url = $this->getFullUrl($server);
        $method = $server['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
            case 'HEAD':
                $arguments = $get;
                break;
            case 'POST':
                $json = file_get_contents('php://input');
                $arguments = json_decode($json, true);
                break;
            case 'PUT':
            case 'DELETE':
                parse_str(file_get_contents('php://input'), $arguments);
                break;
        }
        $accept = $server['HTTP_ACCEPT'];
        $this->handleRequest($url, $method, $arguments, $accept);
    }

    protected function getFullUrl($server) {
        //$protocol = $server['HTTPS'] == 'on' ? 'https' : 'http';
        $protocol = 'http';
        $location = $server['REQUEST_URI'];
        if ($server['QUERY_STRING']) {
            $location = substr($location, 0, strrpos($location, $server['QUERY_STRING']) - 1);
        }
        return $protocol . '://' . $server['HTTP_HOST'] . $location;
    }

    public function handleRequest($url, $method, $arguments, $accept) {
        switch ($method) {
            case 'GET':
                $this->performGet($url, $arguments, $accept);
                break;
            case 'HEAD':
                $this->performHead($url, $arguments, $accept);
                break;
            case 'POST':
                $this->performPost($url, $arguments, $accept);
                break;
            case 'PUT':
                $this->performPut($url, $arguments, $accept);
                break;
            case 'DELETE':
                $this->performDelete($url, $arguments, $accept);
                break;
            default:
                /* 501 (Not Implemented) for any unknown methods */
                header('Allow: ' . $this->supportedMethods, true, 501);
        }
    }

    protected function methodNotAllowedResponse() {
        /* 405 (Method Not Allowed) */
        header('Allow: ' . $this->supportedMethods, true, 405);
    }

    public function performGet($url, $arguments, $accept) {
        $operacion = $arguments['operation'];
        switch ($operacion) {
            case 'getAllUsuarios':
                include __SITE_PATH . '/model/' . 'usuarioModel.php';
                $usuarioModel = new usuarioModel;
                $usuarioModel->obtenerTodosLosUsuarios();
                break;
            case 'getAllPaises':
                include __SITE_PATH . '/model/' . 'ubicacionModel.php';
                $ubicacionModel = new ubicacionModel;
                $resp = $ubicacionModel->obtenerTodosPaises();
                echo json_encode($resp);
                break;
            case 'getDeptosPosPais':
                include __SITE_PATH . '/model/' . 'ubicacionModel.php';
                $ubicacionModel = new ubicacionModel;
                $resp = $ubicacionModel->obtenerDeptosPorPais($arguments["idPais"]);
                echo json_encode($resp);
                break;
            case 'getLocalidadesPosDepto':
                include __SITE_PATH . '/model/' . 'ubicacionModel.php';
                $ubicacionModel = new ubicacionModel;
                $resp = $ubicacionModel->obtenerLocalidadesPorDepto($arguments["idDepto"]);
                echo json_encode($resp);
                break;
            case 'getInfoUsuario':
                include __SITE_PATH . '/model/' . 'usuarioModel.php';
                $usuarioModel = new usuarioModel;
                $resp = $usuarioModel->obtenerInfoDeUsuario($arguments["email"]);
                echo json_encode($resp);
            case 'esServicioYaOfrecido':
                include __SITE_PATH . '/model/' . 'servicioModel.php';
                $servicioModel = new servicioModel;
                $resp = $servicioModel->esServicioYaOfrecido($_SESSION["usuario"][1],$arguments["idServicio"]);
                echo json_encode($resp);
            case 'getTodosServicios':
                include __SITE_PATH . '/model/' . 'servicioModel.php';
                $servicioModel = new servicioModel;
                $resp = $servicioModel->obtenerTodosServicios();
                echo json_encode($resp);                
        }
    }

    public function performHead($url, $arguments, $accept) {
        $this->methodNotAllowedResponse();
    }

    public function performPost($url, $arguments, $accept) {
        $operacion = $arguments['operation'];
        $result = false;
        switch ($operacion) {
            case 'registrarUsuario':
                include __SITE_PATH . '/model/' . 'usuarioModel.php';
                $usuarioModel = new usuarioModel;
                $result = $usuarioModel->registrarUsuario($arguments["usuario"], $arguments["contrasenia"], $arguments["nombres"], $arguments["apellidos"],$arguments["sexo"], $arguments["fechaNacimiento"], $arguments["telefonoMovil"], $arguments["correoElectronico"],$arguments["ci"], $arguments["direccion"]);
                break;
            case 'altaServicio':
                include __SITE_PATH . '/model/' . 'servicioModel.php';
                $servicioModel = new servicioModel;
                $result = $servicioModel->altaServicio($arguments["nombres"],$arguments["descripcion"]);
                break;
            case 'contratarServicio':
                include __SITE_PATH . '/model/' . 'servicioModel.php';
                $servicioModel = new servicioModel;
                $result = $servicioModel->contratarServicio($arguments["mail"],$arguments["idServicio"],$arguments["tecnico"]);                
                break;
        }
        echo $result;
    }

    public function performPut($url, $arguments, $accept) {
        $this->methodNotAllowedResponse();
    }

    public function performDelete($url, $arguments, $accept) {
        $this->methodNotAllowedResponse();
    }

}

class servicesController extends baseController {

    private $operacionesAdmitidas;

    public function __construct() {
        $this->operacionesAdmitidas = array("getAllUsuarios", "registrarUsuario");
    }

    public function index() {
        /*         * * set a template variable ** */
        $this->registry->template->welcome = 'Welcome to PHPRO MVC';

        /*         * * load the index template ** */
        $this->registry->template->show('index');
    }

    public function processRequest() {
        $service = new RestService($this->operacionesAdmitidas);
        $service->handleRawRequest($_SERVER, $_GET, $_POST);
    }
}

?>
