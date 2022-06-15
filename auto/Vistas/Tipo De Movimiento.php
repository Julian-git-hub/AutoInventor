<?php
    include ("../conexion/conectar.php")
?>
<?php
if($_POST)
{
    $obj->Descripcion = $_POST["Descripcion"];
}
?>
<?php
$correrPagina = $_SERVER["PHP_SELF"]; /* es una variable súper global que retorna el nombre del archivo que actualmente está ejecutando el script. Así que, $_SERVER[“PHP_SELF”] envía los datos del formulario a la misma página, en vez de saltar a una página distinta*/
$maximoDatos = 6;
$paginaNumero = 0;

if(isset($_GET['paginaNumero'])){
   $paginaNumero = $_GET['paginaNumero'];
}
$inicia = $paginaNumero * $maximoDatos;

?>
<?php
if(isset($_POST["consulta"]))
{
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from tipo_movimiento where Descripcion like '%$obj->Descripcion%'";
    $limite =sprintf("%s limit %d, %d",$sql, $inicia, $maximoDatos);
    $resultado = mysqli_query($cone,$limite);
    $arreglo = mysqli_fetch_row($resultado);
}else{
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from tipo_movimiento";
    $limite =sprintf("%s limit %d, %d",$sql, $inicia, $maximoDatos);
    $resultado = mysqli_query($cone,$limite);
    $arreglo = mysqli_fetch_row($resultado);
}
?>
<?php
if(isset($_GET['totalArreglo'])){
	$totalArreglo = $_GET['totalArreglo'];
	
}
	else{
		$lista = mysqli_query($cone,$sql);
		$totalArreglo = mysqli_num_rows($lista);
	}
$totalPagina = ceil($totalArreglo/$maximoDatos)-1;

?>
<?php
$cargarPagina = "";
if(!empty($_SERVER['QUERY_STRING'])){ /* Consulta una cadena de la base de datos empty(vacio) */
	$parametro1 = explode("&", $_SERVER['QUERY_STRING']); /* Divide la consulta para meterla en un arreglo */
	$nuevoParametro = array();
	foreach($parametro1 as $parametro2){
			if(stristr($parametro2, "paginaNumero")==false && stristr($parametro2, "totalArreglo")==false){ //Compara una cadena dentro de otra cadena
				 array_push($nuevoParametro, $parametro2);
			}
	}
	if(count($nuevoParametro)!=0){
		$cargarPagina = "&". htmlentities(implode("&", $nuevoParametro));
	}
}
$cargarPagina = sprintf("&totalArreglo=%d%s", $totalArreglo, $cargarPagina);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo Movimiento</title>
</head>
<body>
    <h1 style="text-align: center;">Tipo Movimiento</h1>
    <form action="" method="POST">
        <div class="consultas">
            <label for="" style="margin-right: 5px;">Movimiento Cabecera</label>
            <input type="text" id="Descripcion" name="Descripcion" style="width: 99%;" placeholder="Digite su consulta">
            <br><br>
            <button type="submit" name="consulta">Buscar</button>
            <a href="agregartipodemovimiento.php"><button type="button">Agregar tipo de Movimiento</button></a>
            <br>
        </div>
        <br>
            <div class="formM">
                <table class="tabla">    
                    <thead>
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </thead>
                    <?php
                    do{
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $arreglo[0] ?></td>
                        <td><?php echo $arreglo[1] ?></td>
                        <td class="letra">
                            <a href="<?php if($arreglo[0] <> ""){
                                echo "modificarTipodemoviento.php?key=".urlencode($arreglo[0]);
                            }else{
                                echo "<script> alert('Debe de consultar primero')</sccript>";
                            }?>">
                                <button name="modi" type="button" >Modificar</button>
                            </a> 
                        </td>
                        <td class="letra">
                            <a href="<?php if($arreglo[0]<>""){
                                        echo "eliminarTipodemovimiento.php?key=".urlencode($arreglo[0]);
                            }else{
                                echo "<script> alert('debe de consultar primero')</sccript>";
                            }
                                ?>">
                                <button name="elim" type="button" >Eliminar</button>
                            </a> 
                        </td>
                    </tr>
                </tbody>
                <?php
                    }while($arreglo = mysqli_fetch_row($resultado));
                ?>    
                </table>
                <h6><?php printf("Total de Registros Encontrados %d", $totalArreglo) ?></h6>
            <table border=0>
  	           
                 <tr>
                 <td> 
                     <?php  
                         if($paginaNumero > 0){
                     ?> 
                      <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina,0,$cargarPagina) ?>" id="paginador"> < Inicio </a> <?php }?>
                 </td>
                 <td>
                     <?php  
                     if($paginaNumero > 0){
                 ?> 
                     <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, max(0,$paginaNumero-1),$cargarPagina) ?>" id="paginador" > << Anterior </a> <?php }?></td>
                 <td>
                     <?php 
                     if($paginaNumero < $totalPagina ){
                     ?>
                      <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, min($totalPagina,$paginaNumero+1),$cargarPagina) ?>" id="paginador"> Siguiente >>  </a> <?php }?></td>
                 <td>
                 <?php 
                     if($paginaNumero < $totalPagina ){
                 ?> 
                 <a href="<?php printf("%s?paginaNumero=%d%s",$correrPagina, $totalPagina,$cargarPagina) ?>" id="paginador"> Ultima ></a> <?php } ?></td>
             
                 </tr>
                 </table>
            </div>
        </div>  
    </form>
</body>
</html>