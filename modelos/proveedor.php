<?php
class Proveedor{
    //atributo
    public $conexion;

    //metodo constructor
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    //metodos
    public function consulta(){
        $con = "SELECT p.*, ci.nombre AS ciudad, d.nombre AS dpto FROM proveedores p
                INNER JOIN ciudad ci ON p.fo_ciudad = ci.id_ciudad
                INNER JOIN dpto d ON p.fo_dpto = d.id_dpto                    
                ORDER BY ci.nombre";
        $res = mysqli_query($this->conexion,$con);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;                
        }

        return $vec;
    } 

    public function eliminar($id){
        $del = "DELETE FROM proveedores WHERE id_proveedor = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El proveedor ha sido eliminado";
        return $vec;
    }

    public function insertar($params){
        $ins = "INSERT INTO proveedores(codigo, nit, nombre, direccion, celular, fo_ciudad, fo_dpto, email, contacto) 
        VALUES('$params->codigo', '$params->nit', '$params->nombre', '$params->direccion', '$params->celular', $params->fo_ciudad, $params->fo_dpto, '$params->email', '$params->contacto')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El proveedor ha sido guardado";
        return $vec;
    }

    public function editar($id, $params){
        $editar = "UPDATE proveedores SET codigo = '$params->codigo', nit = '$params->nit', nombre = '$params->nombre', direccion = '$params->direccion', celular = '$params->celular', fo_ciudad = '$params->fo_ciudad', fo_dpto = '$params->fo_dpto', email = '$params->email', contacto = '$params->contacto'
        WHERE id_proveedor = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El proveedor ha sido editado";
        return $vec;
    }

    public function filtro($dato){
        $filtro = "SELECT p.*, ci.nombre AS ciudad, d.nombre AS dpto FROM proveedores p
        INNER JOIN ciudad ci ON p.fo_ciudad = ci.id_ciudad
        INNER JOIN ciudad d ON p.fo_dpto = ci.id_dpto
        WHERE ci.ciudad LIKE '%$dato%' OR c.dpto LIKE '%$dato%' OR ciudad LIKE '%$dato%' OR dpto LIKE '%$dato%'
        ORDER BY CI.nombre";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }

        return $vec;
    
    }

}



?>