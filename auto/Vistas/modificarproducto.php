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
        $obj->Costo_producto= $_POST['Costo_producto'];
        $obj->ID_marca= $_POST['ID_marca'];
        $obj->ID_unidadmedida= $_POST['ID_unidadmedida'];
}?>
<?php
    $llave = $_GET['key'];
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from producto where ID_producto = '$llave'";
    $resultado = mysqli_query($cone,$sql);
    $arreglo = mysqli_fetch_row($resultado);
        $obj->ID_producto = $arreglo[0];
        $obj->Nombre = $arreglo[1];
        $obj->Descripcion = $arreglo[2];
        $obj->Costo_producto = $arreglo[3];
        $obj->ID_marca = $arreglo[4];
        $obj->ID_unidadmedida = $arreglo[5];
?>
<?php
$c = new Conexion();
$cone = $c->conectando();
$consulta = "select * from marca";
$result = mysqli_query($cone,$consulta);
$arreglo = mysqli_fetch_assoc($result);
?>
<?php
    $c = new Conexion();
    $cone = $c->conectando();
    $consulta1 = "select * from unidad_medida";
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
    <title>Modificar Producto</title>
</head>
<body>
    <form action="" method="POST" >
        
        <div class="formM">
            <div class="tabla1">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="ID_producto" name="ID_producto" value="<?php echo $obj->ID_producto?>" placeholder="automatico">
                <br>
                <label for="" method="POST">Nombre</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Nombre" name="Nombre" value="<?php echo  $obj->Nombre?>" placeholder="Digite el Nombre">
                <br>
                <label for="" method="POST">Descripcion</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Descripcion" name="Descripcion" value="<?php echo $obj->Descripcion?>" placeholder="Digite la descripcion">
                <br>
                <label for="" method="POST">Costo Producto</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Costo_producto" name="Costo_producto" <?php echo number_format ($obj->Costo_producto)?>" placeholder="Digite el Costo Producto">
                <br>
                <label for="" method="POST">Marca</label>
                <br>
                <select style="width: 99%; height: 30px; border-radius: 5px;" name="ID_marca" id="ID_marca">
                <?php
                    $c = new Conexion();
                    $cone = $c->conectando();
                    $consulta2 = "select Modelo from marca where ID_marca = '$obj->ID_marca'";
                    $result2 = mysqli_query($cone,$consulta2);
                    $arreglo2 = mysqli_fetch_row($result2);
                    echo $arreglo2[0];
                ?>
                                   
                                   <?php
                                       do{
                                           $codigo = $arreglo['ID_marca'];
                                           $nombre = $arreglo['Modelo'];
                                           if($codigo == $obj->ID_marca){
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
                <label for="" method="POST">Unidad Medida</label>
                <br>
                <select style="width: 99%; height: 30px; border-radius: 5px;" name="ID_unidadmedida" id="ID_unidadmedida">
                <?php
                    $c = new Conexion();
                    $cone = $c->conectando();
                    $consulta3 = "select tipo_UND from unidad_medida where ID_unidadmedida = '$obj->ID_unidadmedida'";
                    $result3 = mysqli_query($cone,$consulta3);
                    $arreglo3 = mysqli_fetch_row($result3);
                    echo $arreglo3[0];
                ?>
                                   <?php
                                       do{
                                           $codigo1 = $arreglo1['ID_unidadmedida'];
                                           $nombre1 = $arreglo1['tipo_UND'];
                                           if($codigo1 == $obj->ID_unidadmedida){
                                            echo "<option value=$codigo1=>$nombre1";
                                           }else{
                                            echo "<option value=$codigo1>$nombre1";
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
            <a href="Producto.php"><button type="button" name="salir">Salir</button></a>
            <br><br>
        </div>
        </div>
    </form>
</body>
</html>