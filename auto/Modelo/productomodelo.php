<?php
    include("../controlador/productocontrolador.php");

    $obj = new producto();
    if($_POST){
        $obj->ID_producto = $_POST['ID_producto'];
        $obj->Nombre = $_POST['Nombre'];
        $obj->Descripcion = $_POST['Descripcion'];
        $obj->Costo_producto = $_POST['Costo_producto'];
        $obj->ID_marca = $_POST['ID_marca'];
        $obj->ID_unidadmedida = $_POST['ID_unidadmedida'];
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