<?php
    class Conexion{
                private $servidor="localhost";
                private $usuario="root";
                private $password="";
                private $db="prueba_projecto";

                function conectando(){
                    $con = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->db)or die ("Error al conectar con el servidor comuniquese con el administrador");
                    return $con;
                }
    }
    $obj = new conexion();
    if($obj->conectando()){
        //echo "conectado";
    }
?>