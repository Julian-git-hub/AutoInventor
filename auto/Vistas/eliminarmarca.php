<?php
    include("../conexion/conectar.php");
    include("../modelo/marcamodelo.php");
?>
<?php
$obj = new marca();
if($_POST){
    $obj->ID_marca = $_POST['ID_marca'];
    $obj->Modelo = $_POST['Modelo'];
    $obj->Descripcion = $_POST['Descripcion'];
}?>
<?php
    $llave = $_GET['key'];
    //echo $llave;
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from marca where ID_marca = '$llave'";
    $resultado = mysqli_query($cone,$sql);
    if($arreglo = mysqli_fetch_row($resultado)){;
        $obj->ID_marca = $arreglo[0];
        $obj->Modelo = $arreglo[1];
        $obj->Descripcion = $arreglo[2];
    }else{
        $obj->ID_marca = null;
        $obj->Modelo = null;
        $obj->Descripcion = null;
    }?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
    <form action="" method="POST" style="height: 100px">
        <div>
        <div class="formM">
            <div class="tabla1">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_marca" name="ID_marca" value="<?php echo $obj->ID_marca?>" placeholder="automatico">
                <br>
                <label for="" method="POST">Modelo</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Modelo" name="Modelo" value="<?php echo  $obj->Modelo?>" placeholder="Digite su modelo">
                <br>
                <label for="" method="POST">Descripcion</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Descripcion" name="Descripcion" value="<?php echo $obj->Descripcion?>" placeholder="Digite la descripcion">
            </div>
            <br>
            <button type="submit" name="elimina">eliminar</button>
            <a href="marca.php"><button type="button" name="salir">Salir</button></a>
        </div>
        </div>
</body>
</html>