<?php
	
	/*** error reporting on ***/
	//error_reporting(E_ALL);
        error_reporting(E_ALL ^ E_NOTICE);

	/*** define the site path constant ***/
	$site_path = realpath(dirname(__FILE__));
	define ('__SITE_PATH', $site_path);
	
        // inicio la sesion
        session_start();
        
	/*** include the init.php file ***/
	include 'includes/init.php';
	
	 /*** load the router ***/
	$registry->router = new router($registry);
	
	/*** set the path to the controllers directory ***/
	$registry->router->setPath (__SITE_PATH . '/controller');
	
	 /*** load up the template ***/
	$registry->template = new template($registry);
	
	/*** load the controller ***/
	$registry->router->loader();

?>
