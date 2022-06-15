<?php
    include ("../conexion/conectar.php");
    include("../modelo/productomodelo.php");
?>
<?php
$obj = new producto();
if($_POST){
    $obj->ID_producto = $_POST['ID_producto'];
    $obj->Nombre = $_POST['Nombre'];
    $obj->Descripcion = $_POST['Descripcion'];
    $obj->Costo_producto = $_POST['Costo_producto'];
    $obj->ID_marca = $_POST['ID_marca'];
    $obj->ID_unidadmedida= $_POST['ID_unidadmedida'];
}
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
    <title>Agregar Producto</title>
</head>
<body>
    <form action="" method="POST">
        <div class="formM">
            <div class="tabla">
                <label for="" method="POST">ID</label>
                <input readonly type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="ID_producto" name="ID_producto" placeholder="automatico">
                <br>
                <label for="" method="POST">Nombre</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Nombre" name="Nombre" placeholder="Digite el Nombre">
                <br>
                <label for="" method="POST">Descripcion</label>
                <input type="text" style="width: 98%; height: 30px; border-radius: 5px;" id="Descripcion" name="Descripcion" placeholder="Digite la descripcion">
                <br>
                <label for="" method="POST">Costo Producto</label>
                <input value="$" type="number" style="width: 98%; height: 30px; border-radius: 5px;" id="Costo_producto" name="Costo_producto" placeholder="Digite el Costo Producto">
                <br>
                <label for="" method="POST">Marca</label>
                <br>
                <select style="width: 99%; height: 30px; border-radius: 5px;" name="ID_marca" id="ID_marca">
                <option>Seleccione la marca</option>
                                   
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
                <option>Seleccione la unidad de medida</option>
                                   
                                   <?php
                                       do{
                                           $codigo = $arreglo1['ID_unidadmedida'];
                                           $nombre = $arreglo1['tipo_UND'];
                                           if($codigo == $obj->ID_unidadmedida){
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
            <a href="Producto.php"><button type="button" name="salir">Salir</button></a>
            <br><br>
        </div>
        </div>
    </form>
</div>
</body>
</html>