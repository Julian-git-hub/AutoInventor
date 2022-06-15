<?php
    include("../conexion/conectar.php");
    include("../modelo/movimientocabeceramodelo.php");
?>
<?php
    $obj = new movimiento_cabecera();
    if($_POST){
        $obj->ID_movcabecera = $_POST['ID_movcabecera'];
        $obj->Fecha = $_POST['Fecha'];
        $obj->Num_documento = $_POST['Num_documento'];
        $obj->ID_terceros = $_POST['ID_terceros'];
        $obj->ID_formapago = $_POST['ID_formapago'];
        $obj->ID_tipodocumento = $_POST['ID_tipodocumento'];
}?>
<?php
    $llave = $_GET['key'];
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from movimiento_cabecera where ID_movcabecera = '$llave'";
    $resultado = mysqli_query($cone,$sql);
    $arreglo = mysqli_fetch_row($resultado);
        $obj->ID_movcabecera = $arreglo[0];
        $obj->Fecha = $arreglo[1];
        $obj->Num_documento = $arreglo[2];
        $obj->ID_terceros = $arreglo[3];
        $obj->ID_formapago = $arreglo[4];
        $obj->ID_tipodocumento = $arreglo[5];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Movimiento Cabecera</title>
</head>
<body>
    <form action="" method="POST" >
        
        <div class="formM">
            <div class="tabla1">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_movcabecera" name="ID_movcabecera" value="<?php echo $obj->ID_movcabecera?>" placeholder="automatico">
                <br>
                <label for="" method="POST">Fecha</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Fecha" name="Fecha" value="<?php echo  $obj->Fecha?>" placeholder="Digite la fecha">
                <br>
                <label for="" method="POST">Numero de documento</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Num_documento" name="Num_documento" value="<?php echo $obj->Num_documento?>" placeholder="Digite en numero de documento">
                <br>
                <label for="" method="POST">ID terceros</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_terceros" name="ID_terceros" value="<?php echo $obj->ID_terceros?>" placeholder="Digite el tipo tercero">
                <br>
                <label for="" method="POST">ID formadepago</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_formapago" name="ID_formapago" value="<?php echo $obj->ID_formapago?>" placeholder="Digite la forma de pago">
                <br>
                <label for="" method="POST">ID tipodocumento</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_tipodocumento" name="ID_tipodocumento" value="<?php echo $obj->ID_tipodocumento?>" placeholder="Digite el tipo de documento">
            </div>
            <br>
            <button type="submit" name="modifica">Modificar</button>
            <a href="Movimiento cabecera.php"><button type="button" name="salir">Salir</button></a>
        </div>
        </div>
    </form>
</body>
</html>