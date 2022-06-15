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
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from terceros where ID_terceros = '$llave'";
    $resultado = mysqli_query($cone,$sql);
    $arreglo = mysqli_fetch_row($resultado);
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
?>
<?php
    $c = new Conexion();
    $cone = $c->conectando();
    $consulta = "select * from tipo_de_documento";
    $result = mysqli_query($cone,$consulta);
    $arreglo = mysqli_fetch_assoc($result);
?>
<?php
    $c = new Conexion();
    $cone = $c->conectando();
    $consulta1 = "select * from tipo_terceros";
    $result1 = mysqli_query($cone,$consulta1);
    $arreglo1 = mysqli_fetch_assoc($result1);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Terceros</title>
</head>
<body>
    <form action="" method="POST" >
        
        <div class="formM">
            <div class="tabla1">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="ID_terceros" name="ID_terceros" value="<?php echo $obj->ID_terceros?>" placeholder="automatico">
                <br>
                <label for="" method="POST">Nombre</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Nombre" name="Nombre" value="<?php echo  $obj->Nombre?>" placeholder="Digite el Nombre">
                <br>
                <label for="" method="POST">Apellido</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Apellidos" name="Apellidos" value="<?php echo $obj->Apellidos?>" placeholder="Digite el Apellido">
                <br>
                <label for="" method="POST">Direccion</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Direccion" name="Direccion" value="<?php echo $obj->Direccion?>" placeholder="Digite la Direccion">
                <br>
                <label for="" method="POST">Correo</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Correo" name="Correo" value="<?php echo $obj->Correo?>" placeholder="Digite el Correo">
                <br>
                <label for="" method="POST">Telefono</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Telefono" name="Telefono" value="<?php echo $obj->Telefono?>" placeholder="Digite el Telefono">
                <br>
                <label for="" method="POST">Identificacion</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Identificacion" name="Identificacion" value="<?php echo $obj->Identificacion?>" placeholder="Digite la Identificacion">
                <br>
                <label for="" method="POST">Razon social</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Razon_Social" name="Razon_Social" value="<?php echo $obj->Razon_Social?>" placeholder="Digite la Razon social">
                <br>
                <label for="" method="POST">Username</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Username" name="Username" value="<?php echo $obj->Username?>" placeholder="Digite Username">
                <br>
                <label for="" method="POST">Password</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Password" name="Password" value="<?php echo $obj->Password?>" placeholder="Digite Password">
                <br>
                <label for="" method="POST">ID tipo documento</label>
                <br>
                <select style="width: 99%; height: 30px; border-radius: 5px;" name="ID_tipo_Documento" id="ID_tipo_Documento">
                <?php
                    $c = new Conexion();
                    $cone = $c->conectando();
                    $consulta3 = "select Descripcion from tipo_de_documento where ID_tipo_Documento = '$obj->ID_tipo_Documento'";
                    $result3 = mysqli_query($cone,$consulta3);
                    $arreglo3 = mysqli_fetch_row($result3);
                    echo $arreglo3[0];
                ?>
                                   <?php
                                       do{
                                           $codigo = $arreglo['ID_tipo_Documento'];
                                           $nombre = $arreglo['Descripcion'];
                                           if($codigo == $obj->ID_tipo_Documento){
                                            echo "<option value=$codigo=>$nombre";
                                           }else{
                                            echo "<option value=$codigo>$nombre";
                                           }
                                        }while($arreglo = mysqli_fetch_assoc($result));
                                        $row4 = mysqli_num_rows($result);
                                        $rows4=0;
                                        if($rows4>0)
                                                {
                                                mysqli_data_seek($arreglo ,0);
                                                $arreglo = mysqli_fetch_assoc($result);
                                                }
                                    ?>
                </select>
                <br>
                <label for="" method="POST">ID tipo de terceros</label>
                <br>
                <select style="width: 99%; height: 30px; border-radius: 5px;" name="ID_tipo_terceros" id="ID_tipo_terceros">
                <?php
                    $c = new Conexion();
                    $cone = $c->conectando();
                    $consulta2 = "select Descripcion from tipo_terceros where ID_tipo_terceros = '$obj->ID_tipo_terceros'";
                    $result2 = mysqli_query($cone,$consulta2);
                    $arreglo2 = mysqli_fetch_assoc($result2);
                ?>
                                   <?php
                                       do{
                                           $codigo = $arreglo1['ID_tipo_terceros'];
                                           $nombre = $arreglo1['Descripcion'];
                                           if($codigo == $obj->ID_tipo_terceros){
                                            echo "<option value=$codigo=>$nombre";
                                           }else{
                                            echo "<option value=$codigo>$nombre";
                                           }
                                        }while($arreglo1 = mysqli_fetch_assoc($result1));
                                        $row4 = mysqli_num_rows($result1);
                                        $rows4=0;
                                        if($rows4>0)
                                                {
                                                mysqli_data_seek($arreglo1 ,0);
                                                $arreglo1 = mysqli_fetch_assoc($result1);
                                                }
                                    ?>
                </select>
            <br><br>
            </div>
            <br>
            <button type="submit" name="modifica">Modificar</button>
            <a href="Terceros.php"><button type="button" name="salir">Salir</button></a>
            <br><br>
        </div>
        </div>
    </form>
</body>
</html>