<?php
    include ("../conexion/conectar.php");
    include("../modelo/tipoterceromodelo.php");
?>
<?php
$obj = new tipo_terceros();
if($_POST){
    $obj->ID_tipo_terceros = $_POST['ID_tipo_terceros'];
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
    <title>Agregar Tipo tercero</title>
</head>
<body>
    <form action="" method="POST">
        <div class="formM">
            <div class="tabla">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_tipo_terceros" name="ID_tipo_terceros" placeholder="automatico">
                <br>
                <label for="" method="POST">Descripcion</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Descripcion" name="Descripcion" placeholder="Digite la descripcion">
                <br>
            </div>
            <br>
            <button type="submit" name="guardar">Guardar</button>
            <a href="Tipotercero.php"><button type="button" name="salir">Salir</button></a>
        </div>
        </div>
    </form>
</div>
</body>
</html>