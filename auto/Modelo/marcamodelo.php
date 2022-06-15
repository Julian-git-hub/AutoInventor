<?php
    include("../controlador/Marcacontrolador.php");

    $obj = new marca();
    if($_POST){
        $obj->ID_marca = $_POST['ID_marca'];
        $obj->Modelo = $_POST['Modelo'];
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