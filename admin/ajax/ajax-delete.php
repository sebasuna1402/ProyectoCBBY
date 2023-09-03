<?php

require_once "../controllers/curl.controller.php";

class DeleteController{



	public $idItem;
	public $table;
	public $suffix;
    public $token;

	public function dataDelete(){

		$url = $this->table."?id=".$this->idItem."&nameId=id_".$this->suffix."&token=".$this->token."&table=users&suffix=user";
		$method = "DELETE";
		$fields = array();

		$response = CurlController::request($url, $method, $fields);
		
		echo $response->status;

	}

}

if(isset($_POST["idItem"])){

	$validate = new DeleteController();
	$validate -> idItem = $_POST["idItem"];
	$validate -> table = $_POST["table"];
	$validate -> suffix = $_POST["suffix"];
    $validate -> token = $_POST["token"];
	$validate -> dataDelete();

}