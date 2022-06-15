<?php
    include("../conexion/conectar.php");
    include("../modelo/tipodocumento2modelo.php");
?>
<?php
    $obj = new tipo_documento_con();
    if($_POST){
        $obj->ID_tipodocumento = $_POST['ID_tipodocumento'];
        $obj->Descripcion = $_POST['Descripcion'];
        $obj->ID_tipomovimiento = $_POST['ID_tipomovimiento'];
}?>
<?php
    $llave = $_GET['key'];
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from tipo_documento_con where ID_tipodocumento = '$llave'";
    $resultado = mysqli_query($cone,$sql);
    $arreglo = mysqli_fetch_row($resultado);
        $obj->ID_tipodocumento = $arreglo[0];
        $obj->Descripcion = $arreglo[1];
        $obj->ID_tipomovimiento = $arreglo[2];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo Documento contable</title>
</head>
<body>
    <form action="" method="POST" >
        
        <div class="formM">
            <div class="tabla1">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_tipodocumento" name="ID_tipodocumento" value="<?php echo $obj->ID_tipodocumento?>" placeholder="automatico">
                <br>
                <label for="" method="POST">Descripcion</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Descripcion" name="Descripcion" value="<?php echo $obj->Descripcion?>" placeholder="Digite la descripcion">
                <br>
                <label for="" method="POST">ID tipo movimiento</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_tipomovimiento" name="ID_tipomovimiento" value="<?php echo $obj->ID_tipomovimiento?>" placeholder="Digite el tipo de movimiento">
            </div>
            <br>
            <button type="submit" name="modifica">Modificar</button>
            <a href="Tipo de documento2.php"><button type="button" name="salir">Salir</button></a>
        </div>
        </div>
    </form>
</body>
</html>