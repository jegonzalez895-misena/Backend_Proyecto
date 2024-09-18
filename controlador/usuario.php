<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once("../conexion.php");
require_once("../modelos/usuario.php");

$control = $_GET['control'];

$usuario = new Usuario($conexion);

switch ($control) {
    case 'consulta':
        $vec = $usuario->consulta();
    break;
    case 'insertar':
        $json = file_get_contents('php://input');
        //$json = '{"codigo":"00005","identificacion":"1023987640","nombre":"prueba", "direccion":"pruebas", "celular":"123456789", "email":"prueba@prueba.com", "rol":"administrador", "clave":"Las Pecas"}';        
        $params =json_decode($json);
        $vec = $usuario->insertar($params);
    break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $usuario->eliminar($id);
    break;
    case 'editar':
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        $id = $_GET['id'];
        $vec = $usuario->editar($id, $params);
    break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $usuario->filtro($dato);
    break;
    }

$datosj = json_encode($vec);
echo $datosj;
header('Content-Type: application/json');

?>