<?php
    include("../controlador/tipounidadcontrolador.php");

    $obj = new unidad_medida();
    if($_POST){
        $obj->ID_unidadmedida = $_POST['ID_unidadmedida'];
        $obj->tipo_UND = $_POST['tipo_UND'];
        $obj->descripcion = $_POST['descripcion'];
        if(isset($_POST['guardar'])){
            $obj->agregar();
        }
        if(isset($_POST['modifica'])){
            $obj->modificar();
        }
        if(isset($_POST['elimina'])){
            $obj->eliminar();
        }
    }
?>