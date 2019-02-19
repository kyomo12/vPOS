<?php
require_once("api/controller/PosRestHandler.php");
require_once("api/controller/UserRestHandler.php");
require_once("api/controller/AuthHandler.php");
require_once("api/controller/MaterialRestHandler.php");
require_once("api/controller/ActivityRestHandler.php");

$request = "";
$data = "";
if(isset($_GET["request"])) {
	$requestParts = explode('/',$_GET['request']);
	$action = "";
	if (sizeof($requestParts) == 1){
		$action = $requestParts[0];
		$request = $action;
	} elseif (sizeof($requestParts) == 2 && !empty($requestParts[1])) {
		$action = $requestParts[0];
		$data = $requestParts[1];
		$request = $action;
	} else {
		$request = $action;
	}
}

$token = new AuthHandler();
$header = "";

if($request != 'login') {
	$status = $token->verifyToken();
	if($status == false){
		$request = "unverified";
	}
}

switch($request){

	case "pos":
		$posRestHandler = new PosRestHandler();
		$posRestHandler->getRequestMethod($data);
		break;

	case "login":
		$authHandler = new AuthHandler();
		$authHandler->login();
		break;

	// case "logout":
	// 	$authenticationHandler = new AuthenticationHandler();
	// 	$authenticationHandler->logout($data);
	// 	break;

	case "users":
		$userRestHandler = new UserRestHandler();
		$userRestHandler->getRequestMethod($data);
		break;

	case "materials":
		$materialRestHandler = new MaterialRestHandler();
		$materialRestHandler->getRequestMethod($data);
		break;

	case "activities":
		$activityRestHandler = new ActivityRestHandler();
		$activityRestHandler->getRequestMethod($data);
		break;

	case "" :
		//404 - not found;
		header("HTTP/1.1 404 Not Found");
		break;
	case "unverified" :
		break;
}

?>
