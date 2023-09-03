<?php

class TemplateController{



//Ruta del sistema administrativo



static public function path(){

return "http://admin.cbpc.com/";


}




//traemos la vista principal de la plantilla



public function index(){

include "views/template.php";

}

//ruta para las imagenes

    static public function srcImg(){



    }


//Funcion para mayuscula Inicial


static public function capitalize($value){


$value = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");


return $value;
}




static public function htmlClean($code){

    $search = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s');

    $replace = array('>','<','\\1');

    $code = preg_replace($search, $replace, $code);

    $code = str_replace("> <", "><", $code);

    return $code;	
}




}