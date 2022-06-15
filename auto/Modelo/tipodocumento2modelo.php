<?php
    include("../controlador/tipodocumento2controlador.php");

    $obj = new tipo_documento_con();
    if($_POST){
        $obj->ID_tipodocumento = $_POST['ID_tipodocumento'];
        $obj->Descripcion = $_POST['Descripcion'];
        $obj->ID_tipomovimiento = $_POST['ID_tipomovimiento'];
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