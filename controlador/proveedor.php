<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once("../conexion.php");
require_once("../modelos/proveedor.php");

$control = $_GET['control'];

$proveedor = new Proveedor($conexion);

switch ($control) {
    case 'consulta':
        $vec = $proveedor->consulta();
    break;
    case 'insertar':
        $json = file_get_contents('php://input');
        //$json = '{"codigo":"0004","nit":"0-021254252", "nombre":"Las Pecas", "direccion":"Carrera 5 # 10-50", "celular":"3143361520", "fo_ciudad":10,"fo_dpto":10, "email":"pecashotmalcom", "contacto":"PecasVargas"}';
        $params =json_decode($json);
        $vec = $proveedor->insertar($params);
    break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $proveedor->eliminar($id);
    break;
    case 'editar':
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        $id = $_GET['id'];
        $vec = $proveedor->editar($id, $params);
    break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $proveedor->filtro($dato);
    break;
}

$datosj = json_encode($vec);
echo $datosj;
header('Content-Type: application/json');

?>