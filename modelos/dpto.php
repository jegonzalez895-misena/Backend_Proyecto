<?php
class Dpto{
    //atributo
    public $conexion;

    //metodo constructor
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    //metodos
    public function consulta(){
        $con = "SELECT * FROM dpto ORDER BY nombre";
        $res = mysqli_query($this->conexion,$con);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;                
        }

        return $vec;
    } 

    public function eliminar($id){
        $del = "DELETE FROM dpto WHERE id_dpto = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El departamento ha sido eliminado";
        return $vec;
    }

    public function insertar($params){
        $ins = "INSERT INTO dpto(nombre) VALUES('$params->nombre')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El departamento ha sido guardado";
        return $vec;
    }

    public function editar($id, $params){
        $editar = "UPDATE dpto SET nombre ='$params->nombre'
        WHERE id_dpto = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El departamento ha sido editado";
        return $vec;
    }

    public function filtro($dato){
        $filtro = "SELECT * FROM dpto WHERE nombre LIKE '%$dato%'
        ORDER BY nombre";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while($row = mysqli_fetch_array($res)){
            $vec[] = $row;
        }

        return $vec;
    
    }

}



?>