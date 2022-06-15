<?php
    include ("../conexion/conectar.php");
?>
<?php
session_start();

$sesion = $_SESSION['Username'];
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from terceros where Username = '$sesion'";
$resultado = mysqli_query($cone,$sql);
$arreglo = mysqli_fetch_row($resultado);

if( $arreglo[0] > 0){
    //header("location: Home.php");
} if($sesion == ""){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body class="imagen">
    <Div class="MENU">
        <Div class="logo">
            <img src="IMG/WhatsApp Image 2021-09-12 at 12.53.25 PM.jpeg" style="width: 100%;">
        </Div>
        <div class="menu">
            <ul class="header">
                <li> <a href="Home.php">Inicio</a></li>
                <li><a href=""> Ingresar Productos</a>
                    <ul>
                        <li><a href="Producto.php" target="marco">Producto</a></li>
                        <li><a href="marca.php" target="marco">Marca</a></li> 
                    </ul>
                </li>
                <li><a href="">Salida producto</a>
                    <ul>
                        <li><a href="Movimiento cabecera.php" target="marco">Movimiento Cabecera</a></li>
                        <li><a href="Movimiento detalle.php" target="marco">Movimiento Detalle</a></li>
                    </ul>
                </li>
                <li><a href="">Informes</a>
                    <ul>
                        <li><a href="Resumen inventario.php" target="marco">Resumen Inventario</a></li>
                    </ul>
                </li>
                <li><a href=""> Registrar usuario</a>
                    <ul>
                        <li><a href="Terceros.php" target="marco">Terceros</a></li>
                        <li><a href="Tipotercero.php" target="marco">Tipo Tercero</a></li>
                    </ul>
                </li>
                <li><a href="logout.php"> Salida</a>
                    <ul>
                        <li><a target="marco"> Opciones</a>
                        <ul>
                            <li><a href="unidadmedida.php" target="marco">unidad medida</a></li>
                            <li><a href="Tipo de documento.php" target="marco">Tipo de documento</a></li>
                            <li><a href="Permisos.php" target="marco">Permisos</a></li>
                            <li><a href="Tipo de documento2.php" target="marco">Tipo de documento contable</a></li>
                            <li><a href="Forma de pago.php" target="marco">Forma de pago</a></li>
                            <li><a href="Tipo De Movimiento.php" target="marco">Tipo de Movimiento</a></li>
                            <li><a href="Modulo.php" target="marco">Modulo</a></li>
                        </ul>
                        </li>
                        <li><a target="marco"> Herramientas</a>
                            <ul>
                                <li><a href="Backups.php" target="marco">Backup</a></li> 
                            </ul>
                         </li>
                    </ul>
                </li>
            </ul>
        </div>
    </Div>
    <br><br><br>
    <div>
        <iframe class="caja"frameborder="0"  name="marco"></iframe>
    </div>
</body>
</html>