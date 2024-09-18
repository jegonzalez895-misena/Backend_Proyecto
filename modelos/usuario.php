<?php
class Usuario{
    //atributo
    public $conexion;

    //metodo constructor
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    //metodos
    public function consulta(){
        $con = "SELECT * FROM usuarios ORDER BY nombre OR clave OR rol";
        $res = mysqli_query($this->conexion,$con);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;                
        }

        return $vec;
    } 

    public function eliminar($id){
        $del = "DELETE FROM usuarios WHERE id_usuario = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El usuario ha sido eliminado";
        return $vec;
    }

    public function insertar($params){
        $ins = "INSERT INTO usuarios(codigo, identificacion, nombre, direccion, celular, email, rol, clave) 
        VALUES('$params->codigo','$params->identificacion', '$params->nombre', '$params->direccion', '$params->celular', '$params->email', '$params->rol', '$params->clave')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El usuario ha sido guardado";
        return $vec;
    }

    public function editar($id, $params){
        $editar = "UPDATE usuarios SET codigo='$params->codigo', identificacion='$params->identificacion', nombre='$params->nombre', direccion='$params->direccion', celular='$params->celular', email='$params->email', rol='$params->rol', clave='$params->clave' 
        WHERE id_usuario = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El usuario ha sido editado";
        return $vec;
    }

    public function filtro($dato){
        $filtro = "SELECT * FROM usuarios WHERE identificacion LIKE '%$dato%' OR nombre LIKE '%$dato%' OR direccion LIKE '%$dato%' OR celular LIKE '%$dato%' OR email LIKE '%$dato%'  OR rol LIKE '%$dato%' OR clave LIKE '%$dato%' ORDER BY c.nombre";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }

        return $vec;
    
    }

}



?>