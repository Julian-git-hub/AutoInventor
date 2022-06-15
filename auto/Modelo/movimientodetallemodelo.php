<?php
    include("../controlador/Movimientodetallecontrolador.php");

    $obj = new movimiento_detalle();
    if($_POST){
        $obj->ID_movdetalle = $_POST['ID_movdetalle'];
        $obj->Cantidad = $_POST['Cantidad'];
        $obj->descuento = $_POST['descuento'];
        $obj->Precio_unitario = $_POST['Precio_unitario'];
        $obj->Precio_total = $_POST['Precio_total'];
        $obj->movimiento_cabecera_ID_movcabecera = $_POST['movimiento_cabecera_ID_movcabecera'];
        $obj->producto_ID_producto = $_POST['producto_ID_producto'];
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