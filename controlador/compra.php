<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once("../conexion.php");
require_once("../modelos/compra.php");

$control = $_GET['control'];

$compra = new Compra($conexion);

switch ($control) {
    case 'consulta':
        $vec = $compra->consulta();
    break;
    case 'insertar':
        $json = file_get_contents('php://input');
        //$json = '{"fo_producto": 6, "cantidad": "50", "fo_proveedor": 1, "subtotal": "1000", "iva": "1000", "total": "1500", "fo_usuario": 4}';
        $params =json_decode($json);
        $vec = $compra->insertar($params);
    break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $compra->eliminar($id);
    break;
    case 'editar':
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        $id = $_GET['id'];
        $vec = $compra->editar($id, $params);
    break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $compra->filtro($dato);
    break;
}

$datosj = json_encode($vec);
echo $datosj;
header('Content-Type: application/json');

?>