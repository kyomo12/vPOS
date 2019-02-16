<?php
require_once("api/controller/PosRestHandler.php");

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

switch($request){

	case "pos":
		$posRestHandler = new PosRestHandler();
		$posRestHandler->getRequestMethod($data);
		break;

	case "" :
		//404 - not found;
		header("HTTP/1.1 404 Not Found");
		break;
}

?>
