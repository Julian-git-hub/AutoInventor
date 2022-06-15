<?php
    include ("../conexion/conectar.php");
    include("../modelo/modulomodelo.php");
?>
<?php
$obj = new modulos();
if($_POST){
    $obj->ID_modulos = $_POST['ID_modulos'];
    $obj->Descripcion = $_POST['Descripcion'];
    $obj->ID_permisos = $_POST['ID_permisos'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Modulo</title>
</head>
<body>
    <form action="" method="POST">
        <div class="formM">
            <div class="tabla">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_modulos" name="ID_modulos" placeholder="automatico">
                <br>
                <label for="" method="POST">Descripcion</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Descripcion" name="Descripcion" placeholder="Digite la descripcion">
                <br>
                <label for="" method="POST">ID permisos</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_permisos" name="ID_permisos" placeholder="Digite el tipo de permiso">
                <br>
            </div>
            <br>
            <button type="submit" name="guardar">Guardar</button>
            <a href="Modulo.php"><button type="button" name="salir">Salir</button></a>
        </div>
        </div>
    </form>
</div>
</body>
</html>