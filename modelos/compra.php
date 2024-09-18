<?php
class Compra{
    //atributo
    public $conexion;

    //metodo constructor
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    //metodos
    public function consulta(){
        $con = "SELECT p.*, c.nombre AS productos, pr.nombre AS proveedores, us.nombre AS usuarios FROM compras p
                INNER JOIN productos c ON p.fo_producto = c.id_producto
                INNER JOIN proveedores pr ON p.fo_proveedor = pr.id_proveedor
                INNER JOIN usuarios us ON p.fo_usuario = us.id_usuario                    
                ORDER BY c.nombre";
        $res = mysqli_query($this->conexion,$con);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;                
        }

        return $vec;
    } 

    public function eliminar($id){
        $del = "DELETE FROM compras WHERE id_compras = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La compra ha sido eliminada";
        return $vec;
    }

    public function insertar($params){
        $ins = "INSERT INTO compras(fo_producto, cantidad, fo_proveedor, subtotal, iva, total, fo_usuario)
        VALUES($params->fo_producto, '$params->cantidad', $params->fo_proveedor, '$params->subtotal', '$params->iva', '$params->total', $params->fo_usuario)";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La compra ha sido guardada";
        return $vec;
    }

    public function editar($id, $params){
        $editar = "UPDATE compras SET fo_producto ='$params->fo_producto', cantidad ='$params->cantidad', fo_proveedor = $params->fo_proveedor,
        subtotal = $params->subtotal, iva = $params-> iva, total = $params->total, fo_usuario = $params-> fo_usuario
        WHERE id_compras = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La compra ha sido editada";
        return $vec;
    }

    public function filtro($dato){
        $filtro = "SELECT p.*, c.nombre AS productos, pr.razon_social AS proveedores, us.usuario AS usuarios FROM compras p
        INNER JOIN productos c ON p.fo_producto = c.id_producto
        INNER JOIN proveedores pr ON p.fo_proveedor = pr.id_proveedor
        INNER JOIN usuarios us ON p.fo_usuario = us.id_usuario 
        WHERE c.nombre LIKE '%$dato%' OR .pr.razon_social LIKE '%$dato%' OR us.usuario LIKE '%$dato%' OR productos LIKE '%$dato%' OR
        proveedores LIKE '%$dato%' OR usuarios LIKE '%$dato%'
        ORDER BY c.nombre";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }

        return $vec;
    
    }

}



?>