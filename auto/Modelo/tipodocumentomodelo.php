<?php
    include("../controlador/tipodocumentocontrolador.php");

    $obj = new tipo_de_documento();
    if($_POST){
        $obj->ID_tipo_Documento = $_POST['ID_tipo_Documento'];
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