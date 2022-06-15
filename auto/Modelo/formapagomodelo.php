<?php
    include("../controlador/formapagocontrolador.php");

    $obj = new forma_de_pago();
    if($_POST){
        $obj->ID_formapago = $_POST['ID_formapago'];
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