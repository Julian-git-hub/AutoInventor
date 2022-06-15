<?php
    include ("../conexion/conectar.php");
    include("../modelo/marcamodelo.php");
?>
<?php
$obj = new marca();
if($_POST){
    $obj->ID_marca = $_POST['ID_marca'];
    $obj->Modelo = $_POST['Modelo'];
    $obj->Descripcion = $_POST['Descripcion'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Marca</title>
</head>
<body>
    <form action="" method="POST">
        <div class="formM">
            <div class="tabla">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_marca" name="ID_marca" placeholder="automatico">
                <br>
                <label for="" method="POST">Modelo</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Modelo" name="Modelo" placeholder="Digite su modelo">
                <br>
                <label for="" method="POST">Descripcion</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Descripcion" name="Descripcion" placeholder="Digite la descripcion">
            </div>
            <br>
            <button type="submit" name="guardar">Guardar</button>
            <a href="marca.php"><button type="button" name="salir">Salir</button></a>
        </div>
        </div>
    </form>
</div>
</body>
</html>