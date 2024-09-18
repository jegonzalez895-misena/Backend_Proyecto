<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once ("../conexion.php");
require_once ("../modelos/venta.php");

$control = $_GET['control'];

$venta = new Venta($conexion);

switch ($control) {
    case 'consulta':
        $vec = $venta->consulta();
        $datosj = json_encode($vec);
        echo $datosj;
        break;
    case 'productos':
        $id = $_GET['id'];
        $vec= $venta->consultap($id);
        $datosj = json_encode($vec);
        echo $datosj;
        header('Content-Type: application/json');
        break;
    case 'insertar':
        $json = file_get_contents('php://input');
        //$json = '{"fecha":"2024-01-16", "fo_producto":5, "cantidad":"5", "fo_cliente":2, "subtotal":"10000", "total":"11400", "fo_usuario":4}';
        /*$json = '{
        "fecha": "2024-9-11",
         "fo_cliente":2,
         "productos":[
         [
         "00008",
         "ChocoCono",
         1500,
         2,
         3000
         ],
         [
         "00003",
         "Piña Postpbon",
         4500,
         10,
         45000
         ]
         ],
         "subtotal": 145000,
         "total": 145000,
         "fo_usuario": 1
        }';*/           
        $params = json_decode($json);
        $texto_arreglo=serialize($params->productos);
        $params->productos=$texto_arreglo;
        $vec = $venta->insertar($params);
        $datosj = json_encode($vec);
        echo $datosj;
        header('Content-Type: application/json');
        break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $venta->eliminar($id);
        $datosj = json_encode($vec);
        echo $datosj;
        header('Content-Type: application/json');
        break;
    case 'editar':
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        $id = $_GET['id'];
        $vec = $venta->editar($id, $params);
        $datosj = json_encode($vec);
        echo $datosj;
        header('Content-Type: application/json');
        break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $venta->filtro($dato);
        $datosj = json_encode($vec);
        echo $datosj;
        header('Content-Type: application/json');
        break;
   
}

?>