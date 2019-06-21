<?php
include_once (dirname(__FILE__) . '/vendor/autoload.php');


use prodigyview\network\Router;
use prodigyview\network\Request;
use prodigyview\network\Response;
use prodigyview\network\Socket;
use prodigyview\system\Security;

/**
 * Get the position into fibonacci sequence
 *
 * @param integer $position Is the position that you wanna get in the sequence
 * 
 * @author Diego Hernández <dhernandez@altiuz.com>
 * @return integer
 */ 
function getFib($position)
{
    return round(pow((sqrt(5)+1)/2, $position) / sqrt(5));
}

Router::init();

Router::get('/', array('callback'=>function(Request $request){
	$response = array('status' => 'OK', 'message' => 'Si ves esto es porque funcionó la conexion al microservicio');
	echo Response::createResponse(200, json_encode($response));
}));

Router::get('/hello', array('callback'=>function(Request $request){
	$response = array('status' => 'success', 'message' => 'Hola Mundo');
	echo Response::createResponse(200, json_encode($response));
}));

Router::post('/fibonacci', array('callback'=>function(Request $request){
	$httpCode = 400;
	$httpResponse = "BAD REQUEST";
	$fib = -1;
	$data = $request->getRequestData('array');
	if(isset($data['position'])) {
		if(is_int($data['position'])) {
			if($data['position']<=1000) {
				$fib = getFib($data['position']);
				$httpCode = 200;
				$httpResponse = "OK";
			}
			else {
				$httpCode = 406;
				$httpResponse = "NOT_ACCEPTABLE";
			}
		}
	}
	
	$response = array('status' => $httpResponse, 'fibonacci' => $fib);
	echo Response::createResponse($httpCode, json_encode($response));
}));

Router::setRoute();