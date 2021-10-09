<?php

class installController {

    public function __construct(){

        require_once "models/installModel.php";
    }

    public function index(){

        require_once "views/encuesta/install.php";

    }
    public function crear($data=null){
        $data = [
            "host" =>  $_POST["host"],
            "dbname" =>  $_POST["dbname"],
            "dbuser" =>  $_POST["dbuser"],
            "pass"=>$_POST["pass"],
        ];
        $install = new installmodel();
        $dato = $install->createConection($data);

        if($dato){

            echo json_encode(array('success' => 1));
        }else{
            echo json_encode(array('success' => 0));
        }

    }


}
?>