<?php
    include("../controlador/tipotercerocontrolador.php");

    $obj = new tipo_terceros();
    if($_POST){
        $obj->ID_tipo_terceros = $_POST['ID_tipo_terceros'];
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