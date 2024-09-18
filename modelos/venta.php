<?php
class Venta{
    //atributo
    public $conexion;

    //metodo constructor
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    //metodos
    public function consulta(){
        $con = "SELECT p.*, cl.nombre AS clientes, us.nombre AS usuarios FROM ventas p
                INNER JOIN clientes cl ON p.fo_cliente = cl.id_cliente
                INNER JOIN usuarios us ON p.fo_usuario = us.id_usuario                    
                ORDER BY cl.nombre";
        $res = mysqli_query($this->conexion,$con);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;                
        }

        return $vec;
    } 

    public function eliminar($id){
        $del = "DELETE FROM ventas WHERE id_ventas = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La venta ha sido eliminada";
        return $vec;
    }

    public function insertar($params){
        $ins = "INSERT INTO ventas(fecha,productos, fo_cliente, subtotal, total, fo_usuario)
        VALUES('$params->fecha','$params->productos', $params->fo_cliente, $params->subtotal, $params->total, $params->fo_usuario)";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La venta ha sido guardada";
        return $vec;
    }

    public function editar($id, $params){
        $editar = "UPDATE compras SET fecha = '$params->fecha,producto ='$params->producto', cantidad ='$params->cantidad', fo_cliente = $params->fo_cliente,
        subtotal = $params->subtotal, iva = $params-> iva, total = $params->total, fo_usuario = $params-> fo_usuario
        WHERE id_compras = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La venta ha sido editada";
        return $vec;
    }

    public function filtro($dato){
        $filtro = "SELECT p.*, cl.nombre AS clientes, us.usuario AS usuarios FROM ventas p       
        INNER JOIN clientes cl ON p.fo_cliente = cl.id_cliente
        INNER JOIN usuarios us ON p.fo_usuario = us.id_usuario 
        WHERE cl.nombre LIKE '%$dato%' OR us.usuario  LIKE '%$dato%' OR
        clientes LIKE '%$dato%' OR usuarios LIKE '%$dato%'
        ORDER BY c.nombre";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }
        return $vec;    
    }
    public function consultap($id){
        $con = "SELECT productos FROM ventas WHERE id_ventas = $id";
        $res = mysqli_query($this->conexion, $con);
        $row = mysqli_fetch_array($res);
        $vec = unserialize($row[0]);
        return $vec;
    }

    
}



?>