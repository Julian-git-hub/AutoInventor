<?php
    include ("../conexion/conectar.php");
    include("../Modelo/tipounidadmodelo.php");
?>
<?php
$obj = new unidad_medida();
if($_POST){
    $obj->ID_unidadmedida = $_POST['ID_unidadmedida'];
    $obj->tipo_UND = $_POST['tipo_UND'];
    $obj->descripcion = $_POST['descripcion'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar unidad de medida</title>
</head>
<body>
    <form action="" method="POST">
        <div class="formM">
            <div class="tabla">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_unidadmedida" name="ID_unidadmedida" placeholder="automatico">
                <br>
                <label for="" method="POST">Tipo de unidad</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="tipo_UND" name="tipo_UND" placeholder="Digite su tipo de unidad">
                <br>
                <label for="" method="POST">Descripcion</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="descripcion" name="descripcion" placeholder="Digite la descripcion">
            </div>
            <br>
            <button type="submit" name="guardar">Guardar</button>
            <a href="unidadmedida.php"><button type="button" name="salir">Salir</button></a>
        </div>
</body>
</html>