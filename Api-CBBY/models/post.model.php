<?php
require_once "connection.php";

class PostModel{

    static public function postData($table, $data){
  
       $columns ="";
       $params= "";
        foreach ($data as $key => $value) {
           //dos puntos por que los parametros van con dos puntos al inicio
            $columns.= $key.",";
           
            $params .= ":".$key.",";
           
        }
           $columns = substr($columns, 0, -1);
           $params = substr($params, 0, -1);

    
        $sql = "INSERT INTO $table ($columns) VALUES ($params)";
        $link = Connection::connect();
		$stmt = $link->prepare($sql);

        foreach ($data as $key => $value) {

			$stmt->bindParam(":".$key, $data[$key], PDO::PARAM_STR);
		
		}


        if($stmt->execute()){

            $response = array(

                "lastId" => $link -> lastInsertId(),
                "comment" => "The process was successfull"

            );
            return $response;


        }else{

            return  $link -> errorInfo();
        }


   

    }
}