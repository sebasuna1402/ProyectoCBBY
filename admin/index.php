<?php

ini_set('display_errors', 1);
ini_set("log_errors",1);
ini_set("log_errors","C:/xampp/htdocs/ProyectoCBPC/admin/php_error_log");




header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: POST');









require_once "controllers/template.controller.php";

require_once "controllers/curl.controller.php";

//ESTE APARTADO DE ACA SE VA A UTILIZAR PARA MOSTRAR ERRORES





$index = new TemplateController();
$index -> index();



