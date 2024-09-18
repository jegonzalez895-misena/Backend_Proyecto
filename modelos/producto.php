<?php
class Producto{
    //atributo
    public $conexion;

    //metodo constructor
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    //metodos
    public function consulta(){
        $con = "SELECT p.*, ca.nombre AS categoria, pr.nombre AS proveedores FROM productos p
                INNER JOIN categoria ca ON p.fo_categoria = ca.id_categoria
                INNER JOIN proveedores pr ON p.fo_proveedor = pr.id_proveedor              
                ORDER BY ca.nombre";
        $res = mysqli_query($this->conexion,$con);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;                
        }

        return $vec;
    } 

    public function eliminar($id){
        $del = "DELETE FROM productos WHERE id_producto = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El producto ha sido eliminado";
        return $vec;
    }

    public function insertar($params){
        $ins = "INSERT INTO productos(codigo, nombre, fo_categoria, inventario, valor_compra, valor_venta, fo_proveedor, marca, presentacion) 
        VALUES('$params->codigo', '$params->nombre', $params->fo_categoria, '$params->inventario', '$params->valor_compra', '$params->valor_venta', $params->fo_proveedor, '$params->marca', '$params->presentacion')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El producto ha sido guardado";
        return $vec;
    }

    public function editar($id, $params){
        $editar = "UPDATE productos SET codigo ='$params->codigo', nombre ='$params->nombre', fo_categoria = $params->fo_categoria, inventario = $params->inventario,
        valor_compra = $params->valor_compra, valor_venta = $params->valor_venta, fo_proveedor = $params->fo_proveedor, marca = '$params->marca', presentacion = '$params->presentacion'
        WHERE id_producto = $id";
        mysqli_query($this-> conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El producto ha sido editado";
        return $vec;
    }

    public function filtro($dato){
        $filtro = "SELECT p.*, c.nombre AS categoria, pr.nombre AS proveedores FROM productos p
        INNER JOIN categoria c ON p.fo_categoria = c.id_categoria
        INNER JOIN proveedores pr ON p.fo_proveedor = pr.id_proveedor        
        WHERE c.nombre LIKE '%$dato%' OR .pr.nombre  LIKE '%$dato%' OR .ma.nombre LIKE '%$dato%'  OR categoria LIKE '%$dato%' OR proveedores LIKE '%$dato%' 
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