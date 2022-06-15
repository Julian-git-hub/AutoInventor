<?php
    include("../conexion/conectar.php");
    include("../modelo/formapagomodelo.php");
?>
<?php
$obj = new forma_de_pago();
if($_POST){
    $obj->ID_formapago = $_POST['ID_formapago'];
    $obj->Descripcion = $_POST['Descripcion'];
}?>
<?php
    $llave = $_GET['key'];
    //echo $llave;
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from forma_de_pago where ID_formapago = '$llave'";
    $resultado = mysqli_query($cone,$sql);
    if($arreglo = mysqli_fetch_row($resultado)){;
        $obj->ID_formapago = $arreglo[0];
        $obj->Descripcion = $arreglo[1];
    }else{
        $obj->ID_formapago = null;
        $obj->Descripcion = null;
    }?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Forma de Pago</title>
</head>
<body>
    <form action="" method="POST" style="height: 100px">
        <div>
        <div class="formM">
            <div class="tabla1">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_formapago" name="ID_formapago" value="<?php echo $obj->ID_formapago?>" placeholder="automatico">
                <br>
                <label for="" method="POST">Descripcion</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Descripcion" name="Descripcion" value="<?php echo $obj->Descripcion?>" placeholder="Digite la descripcion">
            </div>
            <br>
            <button type="submit" name="elimina">eliminar</button>
            <a href="Forma de pago.php"><button type="button" name="salir">Salir</button></a>
        </div>
        </div>
</body>
</html>