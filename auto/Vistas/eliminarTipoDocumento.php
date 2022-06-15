<?php
    include("../conexion/conectar.php");
    include("../modelo/tipodocumentomodelo.php");
?>
<?php
$obj = new tipo_de_documento();
if($_POST){
    $obj->ID_tipo_Documento = $_POST['ID_tipo_Documento'];
    $obj->Descripcion = $_POST['Descripcion'];
}?>
<?php
    $llave = $_GET['key'];
    //echo $llave;
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from tipo_de_documento where ID_tipo_Documento = '$llave'";
    $resultado = mysqli_query($cone,$sql);
    if($arreglo = mysqli_fetch_row($resultado)){;
        $obj->ID_tipo_Documento = $arreglo[0];
        $obj->Descripcion = $arreglo[1];
    }else{
        $obj->ID_tipo_Documento = null;
        $obj->Descripcion = null;
    }?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Tipo Documento</title>
</head>
<body>
    <form action="" method="POST" style="height: 100px">
        <div>
        <div class="formM">
            <div class="tabla1">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_tipo_Documento" name="ID_tipo_Documento" value="<?php echo $obj->ID_tipo_Documento?>" placeholder="automatico">
                <br>
                <label for="" method="POST">Descripcion</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Descripcion" name="Descripcion" value="<?php echo $obj->Descripcion?>" placeholder="Digite la descripcion">
            </div>
            <br>
            <button type="submit" name="elimina">eliminar</button>
            <a href="Tipo de documento.php"><button type="button" name="salir">Salir</button></a>
        </div>
        </div>
</body>
</html>