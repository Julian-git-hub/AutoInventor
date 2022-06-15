<?php
    include("../conexion/conectar.php");
    include("../modelo/tipomovimientomodelo.php");
?>
<?php
$obj = new tipo_movimiento();
if($_POST){
    $obj->ID_tipomovimiento = $_POST['ID_tipomovimiento'];
    $obj->Descripcion = $_POST['Descripcion'];
}?>
<?php
    $llave = $_GET['key'];
    //echo $llave;
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from tipo_movimiento where ID_tipomovimiento = '$llave'";
    $resultado = mysqli_query($cone,$sql);
    if($arreglo = mysqli_fetch_row($resultado)){;
        $obj->ID_tipomovimiento = $arreglo[0];
        $obj->Descripcion = $arreglo[1];
    }else{
        $obj->ID_tipomovimiento = null;
        $obj->Descripcion = null;
    }?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Tipo de Movimiento</title>
</head>
<body>
    <form action="" method="POST" style="height: 100px">
        <div>
        <div class="formM">
            <div class="tabla1">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_tipomovimiento" name="ID_tipomovimiento" value="<?php echo $obj->ID_tipomovimiento?>" placeholder="automatico">
                <br>
                <label for="" method="POST">Descripcion</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Descripcion" name="Descripcion" value="<?php echo $obj->Descripcion?>" placeholder="Digite la descripcion">
            </div>
            <br>
            <button type="submit" name="elimina">eliminar</button>
            <a href="Tipo De Movimiento.php"><button type="button" name="salir">Salir</button></a>
        </div>
        </div>
</body>
</html>