<?php
    include("../conexion/conectar.php");
    include("../modelo/tercerosmodelo.php");
?>
<?php
$obj = new terceros();
if($_POST){
        $obj->ID_terceros = $_POST['ID_terceros'];
        $obj->Nombre = $_POST['Nombre'];
        $obj->Apellidos = $_POST['Apellidos'];
        $obj->Direccion = $_POST['Direccion'];
        $obj->Correo = $_POST['Correo'];
        $obj->Telefono = $_POST['Telefono'];
        $obj->Identificacion = $_POST['Identificacion'];
        $obj->Razon_Social = $_POST['Razon_Social'];
        $obj->Username = $_POST['Username'];
        $obj->Password = $_POST['Password'];
        $obj->ID_tipo_Documento = $_POST['ID_tipo_Documento'];
        $obj->ID_tipo_terceros = $_POST['ID_tipo_terceros'];
}?>
<?php
    $llave = $_GET['key'];
    //echo $llave;
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from terceros where ID_terceros = '$llave'";
    $resultado = mysqli_query($cone,$sql);
    if($arreglo = mysqli_fetch_row($resultado)){;
        $obj->ID_terceros = $arreglo[0];
        $obj->Nombre = $arreglo[1];
        $obj->Apellidos = $arreglo[2];
        $obj->Direccion = $arreglo[3];
        $obj->Correo = $arreglo[4];
        $obj->Telefono = $arreglo[5];
        $obj->Identificacion = $arreglo[6];
        $obj->Razon_Social = $arreglo[7];
        $obj->Username = $arreglo[8];
        $obj->Password = $arreglo[9];
        $obj->ID_tipo_Documento = $arreglo[10];
        $obj->ID_tipo_terceros = $arreglo[11];
    }else{
        $obj->ID_terceros = null;
        $obj->Nombre = null;
        $obj->Apellidos = null;
        $obj->Direccion = null;
        $obj->Correo = null;
        $obj->Telefono = null;
        $obj->Identificacion = null;
        $obj->Razon_Social = null;
        $obj->Username = null;
        $obj->Password = null;
        $obj->ID_tipo_Documento = null;
        $obj->ID_tipo_terceros = null;
    }?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elimar Terceros</title>
</head>
<body>
    <form action="" method="POST" style="height: 100px">
        <div>
        <div class="formM">
            <div class="tabla1">
                <label for="" method="POST"">ID</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_terceros" name="ID_terceros" value="<?php echo $obj->ID_terceros?>" placeholder="automatico">
                <br>
                <label for="" method="POST">Nombre</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Nombre" name="Nombre" value="<?php echo $obj->Nombre?>" placeholder="Digite el Nombre">
                <br>
                <label for="" method="POST">Apellidos</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Apellidos" name="Apellidos" value="<?php echo $obj->Apellidos?>" placeholder="Digite el Apellidos">
                <br>
                <label for="" method="POST">Direccion</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Direccion" name="Direccion" value="<?php echo $obj->Direccion?>" placeholder="Digite el Direccion">
                <br>
                <label for="" method="POST">Correo</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Correo" name="Correo" value="<?php echo $obj->Correo?>" placeholder="Digite el Correo">
                <br>
                <label for="" method="POST">Telefono</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Telefono" name="Telefono" value="<?php echo $obj->Telefono?>" placeholder="Digite el Telefono">
                <br>
                <label for="" method="POST">Identificacion</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Identificacion" name="Identificacion" value="<?php echo $obj->Identificacion?>" placeholder="Digite el Identificacion">
                <br>
                <label for="" method="POST">Razon Social</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Razon_Social" name="Razon_Social" value="<?php echo $obj->Razon_Social?>" placeholder="Digite la Razon Social">
                <br>
                <label for="" method="POST">Username</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Username" name="Username" value="<?php echo $obj->Username?>" placeholder="Digite Username">
                <br>
                <label for="" method="POST">Password</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Password" name="Password" value="<?php echo $obj->Password?>" placeholder="Digite el Password">
                <br>
                <label for="" method="POST">ID tipo de documento</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_tipo_Documento" name="ID_tipo_Documento" value="<?php echo $obj->ID_tipo_Documento?>" placeholder="automatico">
                <br>
                <label for="" method="POST">ID tipo de tercero</label>
                <input readonly type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_tipo_terceros" name="ID_tipo_terceros" value="<?php echo $obj->ID_tipo_terceros?>" placeholder="automatico">
            </div>
            <br>
            <button type="submit" name="elimina">eliminar</button>
            <a href="Terceros.php"><button type="button" name="salir">Salir</button></a>
        </div>
        </div>
</body>
</html>