<?php
    include ("../conexion/conectar.php");
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
}
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
    <title>Agregar Terceros</title>
</head>
<body>
    <form action="" method="POST">
        <div class="formM">
            <div class="tabla">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="ID_terceros" name="ID_terceros" placeholder="automatico">
                <br>
                <label for="" method="POST">Nombre</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Nombre" name="Nombre" placeholder="Digite el Nombre">
                <br>
                <label for="" method="POST">Apellidos</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Apellidos" name="Apellidos" placeholder="Digite el Apellidos">
                <br>
                <label for="" method="POST">Direccion</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Direccion" name="Direccion" placeholder="Digite la Direccion">
                <br>
                <label for="" method="POST">Correo</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Correo" name="Correo" placeholder="Digite el correo">
                <br>
                <label for="" method="POST">Telefono</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Telefono" name="Telefono" placeholder="Digite el Telefono">
                <br>
                <label for="" method="POST">Identificacion</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Identificacion" name="Identificacion" placeholder="Digite la Identificacion">
                <br>
                <label for="" method="POST">Razon Social</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Razon_Social" name="Razon_Social" placeholder="Digite la Razon Social">
                <br>
                <label for="" method="POST">Nombre de usuario</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Username" name="Username" placeholder="Digite su nombre de usuario">
                <br>
                <label for="" method="POST">Contraseña</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Password" name="Password" placeholder="Digite su contraseña">
                <br>
                <label for="" method="POST">tipo de documento</label>
                <br>
                <select style="width: 99%; height: 30px; border-radius: 5px;" name="ID_tipo_Documento" id="ID_tipo_Documento">
                <option>Seleccione el tipo de documento</option>
                                   
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
                <label for="" method="POST">tipo terceros</label>
                <br>
                <select style="width: 99%; height: 30px; border-radius: 5px;" name="ID_tipo_terceros" id="ID_tipo_terceros">
                <option>Seleccione el tipo de tercero</option>
                                   
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
            <button type="submit" name="guardar">Guardar</button>
            <a href="Terceros.php"><button type="button" name="salir">Salir</button></a>
            <br><br>
        </div>
        </div>
    </form>
</div>
</body>
</html>