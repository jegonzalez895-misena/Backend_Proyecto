<?php
    class Cliente{
        //atributo
        public $conexion;

        //metodo constructor
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        //metodos
        public function consulta(){
            $con = "SELECT p.*, c.nombre AS ciudad, d.nombre AS dpto FROM clientes p
                    INNER JOIN ciudad c ON p.fo_ciudad = c.id_ciudad
                    INNER JOIN dpto d ON p.fo_dpto = d.id_dpto                    
                    ORDER BY p.nombre";
            $res = mysqli_query($this->conexion,$con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;                
            }

            return $vec;
        } 

        public function eliminar($id){
            $del = "DELETE FROM clientes WHERE id_cliente = $id";
            mysqli_query($this->conexion, $del);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El cliente ha sido eliminado";
            return $vec;
        }

        public function insertar($params){
            $ins = "INSERT INTO clientes(codigo, identificacion, nombre, direccion, celular, email, fo_ciudad, fo_dpto)
            VALUES('$params->codigo','$params->identificacion', '$params->nombre', '$params->direccion', '$params->celular', '$params->email', $params->fo_ciudad, $params->fo_dpto)";
            mysqli_query($this->conexion, $ins);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El cliente ha sido guardado";
            return $vec;
        }

        public function editar($id, $params){
            $editar = "UPDATE clientes SET codigo='$params->codigo', identificacion='$params->identificacion', nombre='$params->nombre', direccion='$params->direccion', celular='$params->celular', email='$params->email', fo_ciudad='$params->fo_ciudad', fo_dpto='$params->fo_dpto'
            WHERE id_cliente = $id";
            mysqli_query($this->conexion, $editar);
            $vec = [];
            $vec['resultado'] = "OK";
            $vec['mensaje'] = "El cliente ha sido editado";
            return $vec;
        }

        public function filtro($dato){
            $con = "SELECT c.*, ci.nombre AS ciudad, d.nombre AS dpto FROM clientes c
            INNER JOIN ciudad ci ON c.fo_ciudad = ci.id_ciudad
            INNER JOIN dpto d ON ci.fo_dpto = d.id_dpto
            WHERE c.identificacion LIKE '%$dato%' OR c.nombre LIKE '%$dato%' OR c.email LIKE '%$dato%'
            ORDER BY c.nombre";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        
        }

        public function consulta_cliente($dato){
            $con = "SELECT c.*, ci.nombre AS ciudad, d.nombre AS dpto FROM clientes c
            INNER JOIN ciudad ci ON c.fo_ciudad = ci.id_ciudad
            INNER JOIN dpto d ON ci.fo_dpto = d.id_dpto
            WHERE c.identificacion = '$dato'
            ORDER BY c.nombre";
            $res = mysqli_query($this->conexion, $con);
            $vec = [];

            while($row = mysqli_fetch_array($res)){
                $vec[] = $row;
            }

            return $vec;
        
        }

       

    }



?>