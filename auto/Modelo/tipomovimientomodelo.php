<?php
    include("../controlador/tipomovimientocontrolador.php");

    $obj = new tipo_movimiento();
    if($_POST){
        $obj->ID_tipomovimiento = $_POST['ID_tipomovimiento'];
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