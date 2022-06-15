<?php
    include ("../conexion/conectar.php");
    header("Content-Type: application/vmd-ms-excel: charset=iso-8859-1");
    header("Content-Disposition: attachment; filename=Reportes de productos.xls");
?>
<?php
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from producto";
    $resultado = mysqli_query($cone,$sql);
    $arreglo = mysqli_fetch_row($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
</head>
<body>
    <table border: 1px;>
        <thead>
            <tr>
                <th>Listado de productos</th>
            </tr>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Costo producto</th>
                <th>Marca</th>
                <th>Unidad de medida</th>
            </tr>
        </thead>
        <?php
            if($arreglo>0){
                do{
        ?>
        <tbody>
            <tr>
                <td><?php echo $arreglo[0] ?></td>
                <td><?php echo $arreglo[1] ?></td>
                <td><?php echo $arreglo[2] ?></td>
                <td><?php echo $arreglo[3] ?></td>
                <td><?php echo $arreglo[4] ?></td>
                <td><?php echo $arreglo[5] ?></td>
            </tr>
        </tbody>
        <?php
            }while($arreglo = mysqli_fetch_array($resultado));
        }
        ?>
    </table>
</body>
</html>