<?php

date_default_timezone_set("utc");
    require_once "config/define.php";
	require_once "config/config.php";
	require_once "routes/routes.php";
	require_once "config/database.php";
	require_once "controllers/encuesta.php";
	require_once "controllers/installl.php";
	require_once "controllers/resultado.php";
	require_once "controllers/excel.php";

	if(isset($_GET['c'])){

		$controlador = cargarControlador($_GET['c']);

		if(isset($_GET['a'])){
			if(isset($_GET['id'])){
				cargarAccion($controlador, $_GET['a'], $_GET['id']);
				} else {
				cargarAccion($controlador, $_GET['a']);
			}
			} else {
			cargarAccion($controlador, ACCION_PRINCIPAL);
		}

		} else {

		$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
		$accionTmp = ACCION_PRINCIPAL;
		$controlador->$accionTmp();
	}
?>