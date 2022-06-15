<?php
    include("../controlador/terceroscontrolador.php");

    $obj = new terceros();
    if($_POST){
        $obj->ID_terceros = $_POST['ID_terceros'];
        $obj->Nombre = $_POST['Nombre'];
        $obj->Apellidos = $_POST['Apellidos'];
        $obj->Direccion = $_POST['Direccion'];
        $obj->Correo = $_POST['Correo'];
        $obj->Telefono = $_POST['Telefono'];
        $obj->Identificacion = $_POST['Identificacion'];
        $obj->Razon_Social = $_POST['Razon_Social'];
        $obj->Username = $_POST['Username'];
        $obj->Password = $_POST['Password'];
        $obj->ID_tipo_Documento = $_POST['ID_tipo_Documento'];
        $obj->ID_tipo_terceros = $_POST['ID_tipo_terceros'];
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