<?php
    include("../controlador/moduloscontrolador.php");

    $obj = new modulos();
    if($_POST){
        $obj->ID_modulos = $_POST['ID_modulos'];
        $obj->Descripcion = $_POST['Descripcion'];
        $obj->ID_permisos = $_POST['ID_permisos'];
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