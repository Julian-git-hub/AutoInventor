<?php
    include("../conexion/conectar.php");
    include("../modelo/productomodelo.php");
?>
<?php
$obj = new producto();
if($_POST){
        $obj->ID_producto = $_POST['ID_producto'];
        $obj->Nombre = $_POST['Nombre'];
        $obj->Descripcion = $_POST['Descripcion'];
        $obj->Costo_producto = $_POST['Costo_producto'];
        $obj->ID_marca = $_POST['ID_marca'];
        $obj->ID_unidadmedida = $_POST['ID_unidadmedida'];
}?>
<?php
    $llave = $_GET['key'];
    //echo $llave;
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from producto where ID_producto = '$llave'";
    $resultado = mysqli_query($cone,$sql);
    if($arreglo = mysqli_fetch_row($resultado)){;
        $obj->ID_producto = $arreglo[0];
        $obj->Nombre = $arreglo[1];
        $obj->Descripcion = $arreglo[2];
        $obj->Costo_producto = $arreglo[3];
        $obj->ID_marca = $arreglo[4];
        $obj->ID_unidadmedida = $arreglo[5];
    }else{
        $obj->ID_marca = null;
        $obj->Modelo = null;
        $obj->Descripcion = null;
        $obj->Costo_producto = null;
        $obj->ID_marca = null;
        $obj->ID_unidadmedida = null;
    }?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elimina producto</title>
</head>
<body>
    <form action="" method="POST" style="height: 100px">
        <div>
        <div class="formM">
            <div class="tabla1">
                <label for="" method="POST"">ID</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_producto" name="ID_producto" value="<?php echo $obj->ID_producto?>" placeholder="automatico">
                <br>
                <label for="" method="POST">Nombre</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Nombre" name="Nombre" value="<?php echo  $obj->Nombre?>" placeholder="Digite el Nombre">
                <br>
                <label for="" method="POST">Descripcion</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Descripcion" name="Descripcion" value="<?php echo $obj->Descripcion?>" placeholder="Digite la descripcion">
                <br>
                <label for="" method="POST">Costo Producto</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Costo_producto" name="Costo_producto" value="$<?php echo number_format ($obj->Costo_producto)?>" placeholder="Digite El Costo Producto">
                <br>
                <label for="" method="POST">Marca</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_marca" name="ID_marca" value="<?php echo $obj->ID_marca?>" placeholder="Digite El Costo Producto">
                <br>
                <label for="" method="POST">Unidad medida</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_unidadmedida" name="ID_unidadmedida" value="<?php echo $obj->ID_unidadmedida?>" placeholder="Digite El Costo Producto">
            </div>
            <br>
            <button type="submit" name="elimina">eliminar</button>
            <a href="Producto.php"><button type="button" name="salir">Salir</button></a>
        </div>
        </div>
</body>
</html>