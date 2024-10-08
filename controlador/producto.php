<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once("../conexion.php");
require_once("../modelos/producto.php");

$control = $_GET['control'];

$producto = new Producto($conexion);

switch ($control) {
    case 'consulta':
        $vec = $producto->consulta();
    break;
    case 'insertar':
        $json = file_get_contents('php://input');
        //$json = '{"codigo": "0021254252", "nombre": "Prueba 5", "fo_categoria": 10, "inventario": "150", "valor_compra": "10000", "valor_venta": "15000", "fo_proveedor": 2, "marca": "Pruebas", "presentacion": "Botella 1000 ml"}';
        $params =json_decode($json);
        $vec = $producto->insertar($params);
    break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $producto->eliminar($id);
    break;
    case 'editar':
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        $id = $_GET['id'];
        $vec = $producto-> editar($id, $params);
    break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $producto->filtro($dato);
    break;
}

$datosj = json_encode($vec);
echo $datosj;
header('Content-Type: application/json');

?>