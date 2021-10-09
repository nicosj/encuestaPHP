<?php

class resultadoController
{

    public function __construct()
    {
        require_once "models/resultadoModel.php";
    }

    public function index()
    {

        require_once "views/encuesta/resultado.php";
    }

    public function mostrar(){

        $resultado = new ResultadoModel();
        $data["persona"]=$resultado->get_persona();
        $data["hobby"]=$resultado->get_hobby();
        $data["sexo"]=$resultado->get_sexo();
        $data["nombre"]=$resultado->get_nombre();
        $data["actividad"]=$resultado->get_actividad();
        $data["horas"]=$resultado->get_horas();

        require_once "views/encuesta/resultado.php";
    }
}
?>