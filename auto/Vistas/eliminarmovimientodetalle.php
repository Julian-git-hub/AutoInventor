<?php
    include("../conexion/conectar.php");
    include("../modelo/movimientodetallemodelo.php");
?>
<?php
$obj = new movimiento_detalle();
if($_POST){
        $obj->ID_movdetalle = $_POST['ID_movdetalle'];
        $obj->Cantidad = $_POST['Cantidad'];
        $obj->descuento = $_POST['descuento'];
        $obj->Precio_unitario = $_POST['Precio_unitario'];
        $obj->Precio_total = $_POST['Precio_total'];
        $obj->movimiento_cabecera_ID_movcabecera = $_POST['movimiento_cabecera_ID_movcabecera'];
        $obj->producto_ID_producto = $_POST['producto_ID_producto'];
}?>
<?php
    $llave = $_GET['key'];
    //echo $llave;
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from movimiento_detalle where ID_movdetalle = '$llave'";
    $resultado = mysqli_query($cone,$sql);
    if($arreglo = mysqli_fetch_row($resultado)){;
        $obj->ID_movdetalle = $arreglo[0];
        $obj->Cantidad = $arreglo[1];
        $obj->descuento = $arreglo[2];
        $obj->Precio_unitario = $arreglo[3];
        $obj->Precio_total = $arreglo[4];
        $obj->movimiento_cabecera_ID_movcabecera = $arreglo[5];
        $obj->producto_ID_producto = $arreglo[6];
    }else{
        $obj->ID_movdetalle = null;
        $obj->Cantidad = null;
        $obj->descuento = null;
        $obj->Precio_unitario = null;
        $obj->Precio_total = null;
        $obj->movimiento_cabecera_ID_movcabecera = null;
        $obj->producto_ID_producto = null;
    }?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Movimiento Cabecera</title>
</head>
<body>
    <form action="" method="POST" style="height: 100px">
        <div>
        <div class="formM">
            <div class="tabla1">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_movdetalle" name="ID_movdetalle" value="<?php echo $obj->ID_movdetalle?>" placeholder="automatico">
                <br>
                <label for="" method="POST">Cantidad</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Cantidad" name="Cantidad" value="<?php echo  $obj->Cantidad?>" placeholder="Digite la cantidad">
                <br>
                <label for="" method="POST">Descuento</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="descuento" name="descuento" value="<?php echo $obj->descuento?>" placeholder="Digite el descuento">
                <br>
                <label for="" method="POST">Precio unitario</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Precio_unitario" name="Precio_unitario" value="<?php echo $obj->Precio_unitario?>" placeholder="Digite precio unitario">
                <br>
                <label for="" method="POST">Precios total</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Precio_total" name="Precio_total" value="<?php echo $obj->Precio_total?>" placeholder="Digite el precio total">
                <br>
                <label for="" method="POST">Movimiento cabecera</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="movimiento_cabecera_ID_movcabecera" name="movimiento_cabecera_ID_movcabecera" value="<?php echo $obj->movimiento_cabecera_ID_movcabecera?>" placeholder="Digite el movimiento cabecera">
                <br>
                <label for="" method="POST">Producto</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="producto_ID_producto" name="producto_ID_producto" value="<?php echo $obj->producto_ID_producto?>" placeholder="digite el producto">
                <br>
            </div>
            <br>
            <button type="submit" name="elimina">eliminar</button>
            <a href="Movimiento detalle.php"><button type="button" name="salir">Salir</button></a>
        </div>
        </div>
</body>
</html>