<?php
    include ("../conexion/conectar.php");
    include("../modelo/movimientocabeceramodelo.php");
?>
<?php
$obj = new movimiento_cabecera();
if($_POST){
    $obj->ID_movcabecera = $_POST['ID_movcabecera'];
    $obj->Fecha = $_POST['Fecha'];
    $obj->Num_documento = $_POST['Num_documento'];
    $obj->ID_terceros = $_POST['ID_terceros'];
    $obj->ID_formapago = $_POST['ID_formapago'];
    $obj->ID_tipodocumento = $_POST['ID_tipodocumento'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar movimiento Cabecera</title>
</head>
<body>
    <form action="" method="POST">
        <div class="formM">
            <div class="tabla">
                <label for="" method="POST"">ID</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_movcabecera" name="ID_movcabecera" placeholder="automatico">
                <br>
                <label for="" method="POST">Fecha</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Fecha" name="Fecha" placeholder="Digite la fecha">
                <br>
                <label for="" method="POST">Numero documento</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="Num_documento" name="Num_documento" placeholder="automatico">
                <br>
                <label for="" method="POST">terceros</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_terceros" name="ID_terceros" placeholder="Digite el tipo de terceros">
                <br>
                <label for="" method="POST">Formapago</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_formapago" name="ID_formapago" placeholder="Digite la forma de pago">
                <br>
                <label for="" method="POST">Tipo de documento</label>
                <input type="text" style="width: 99%; height: 30px; border-radius: 5px;" id="ID_tipodocumento" name="ID_tipodocumento" placeholder="Digite el tipo de documento">
            </div>
            <br>
            <button type="submit" name="guardar">Guardar</button>
            <a href="Movimiento cabecera.php"><button type="button" name="salir">Salir</button></a>
        </div>
        </div>
    </form>
</div>
</body>
</html>