<?php


	class encuestaController {
		
		public function __construct(){
			require_once "models/encuestaModel.php";

		}
		
		public function index(){

		    require_once "views/encuesta/index.php";

		}

		public function guarda(){
            $encuesta = new Encuestamodel();


            $data = [
                "nombre" =>  $_POST["nombre"],
                "sexo" =>  $_POST["sexo"],
                "hobby"=>$_POST["hobby"],///mirar
                "caja"=> isset($_POST["caja"]) ?$_POST["caja"]: "0",

            ];

            $data = $encuesta->insertar($data);
            if($data){
                echo json_encode($data);
            } else {


            }
		}

	}
?>