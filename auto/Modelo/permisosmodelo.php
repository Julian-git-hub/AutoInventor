<?php
    include("../controlador/permisoscontrolador.php");

    $obj = new permisos();
    if($_POST){
        $obj->ID_permisos = $_POST['ID_permisos'];
        $obj->Descripcion = $_POST['Descripcion'];
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