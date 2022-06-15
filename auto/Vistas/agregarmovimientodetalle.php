<?php
    include ("../conexion/conectar.php");
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
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar movimiento Detalle</title>
</head>
<body>
    <form action="" method="POST">
        <div class="formM">
            <div class="tabla">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_movdetalle" name="ID_movdetalle" placeholder="automatico">
                <br>
                <label for="" method="POST">Cantidad</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Cantidad" name="Cantidad" placeholder="Digite la Cantidad">
                <br>
                <label for="" method="POST">Descuento</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="descuento" name="descuento" placeholder="Digite el descuento">
                <br>
                <label for="" method="POST">Precio unitario</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Precio_unitario" name="Precio_unitario" placeholder="Digite Precio unitario">
                <br>
                <label for="" method="POST">Precio Total</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Precio_total" name="Precio_total" placeholder="Digite el precio total">
                <br>
                <label for="" method="POST">Movimiento cabecera</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="movimiento_cabecera_ID_movcabecera" name="movimiento_cabecera_ID_movcabecera" placeholder="Digite el precio total">
                <br>
                <label for="" method="POST">Producto</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="producto_ID_producto" name="producto_ID_producto" placeholder="Digite el precio total">
                <br>
            </div>
            <br>
            <button type="submit" name="guardar">Guardar</button>
            <a href="Movimiento detalle.php"><button type="button" name="salir">Salir</button></a>
        </div>
        </div>
    </form>
</div>
</body>
</html>