<?php
    include("../controlador/movimientocabeceracontrolador.php");

    $obj = new movimiento_cabecera();
    if($_POST){
        $obj->ID_movcabecera = $_POST['ID_movcabecera'];
        $obj->Fecha = $_POST['Fecha'];
        $obj->Num_documento = $_POST['Num_documento'];
        $obj->ID_terceros = $_POST['ID_terceros'];
        $obj->ID_formapago = $_POST['ID_formapago'];
        $obj->ID_tipodocumento = $_POST['ID_tipodocumento'];
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