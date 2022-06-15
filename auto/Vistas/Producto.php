<?php
    include ("../conexion/conectar.php")
?>
<?php
if($_POST)
{
    $obj->Nombre = $_POST["Nombre"];
}
?>
<?php
$correrPagina = $_SERVER["PHP_SELF"]; 
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
    $sql = "select producto.ID_producto,producto.nombre,producto.Descripcion,
            producto.Costo_producto,marca.modelo,marca.Descripcion,
            unidad_medida.tipo_UND,unidad_medida.descripcion from producto inner join marca on producto.ID_marca = marca.ID_marca 
            inner join unidad_medida on producto.Id_unidadmedida = unidad_medida.ID_unidadmedida where Nombre like '%$obj->Nombre%'";
    
    $limite =sprintf("%s limit %d, %d",$sql, $inicia, $maximoDatos);
    $resultado = mysqli_query($cone,$limite);
    $arreglo = mysqli_fetch_row($resultado);
}else{
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select producto.ID_producto,producto.nombre,producto.Descripcion,
            producto.Costo_producto,marca.modelo,marca.Descripcion,
            unidad_medida.tipo_UND,unidad_medida.descripcion from producto inner join marca on producto.ID_marca = marca.ID_marca 
            inner join unidad_medida on producto.Id_unidadmedida = unidad_medida.ID_unidadmedida";
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
if(!empty($_SERVER['QUERY_STRING'])){ 
	$parametro1 = explode("&", $_SERVER['QUERY_STRING']); 
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
    <title>Producto</title>
</head>
<body>
    <h1 style="text-align: center;">Producto</h1>
    <form action="" method="POST">
        <div class="consultas">
            <label for="" style="margin-right: 5px;">Consultar</label>
            <input type="text" id="Nombre" name="Nombre" style="width: 99%;" placeholder="Digite su consulta">
            <br><br>
            <button type="submit" name="consulta">Buscar</button>
            <a href="agregarproducto.php"><button type="button">Agregar Producto</button></a>
            <a href="../Reportes/Reporteproductos.php"><button type="button" onclick="imprimir()">Generar Excel</button></a>
            <script>
                function imprimir(){
                    windows.print();
                }
            </script>
            <br>
        </div>
        <br>
            <div class="formM">
                <table class="tabla">    
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Costo producto</th>
                        <th>Marca</th>
                        <th>Descripcion</th>
                        <th>Unidad Medida</th>
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
                        <td><?php echo $arreglo[2] ?></td>
                        <td style="text-align: right;">$<?php echo number_format ($arreglo[3])?></td>
                        <td><?php echo $arreglo[4] ?></td>
                        <td><?php echo $arreglo[5] ?></td>
                        <td><?php echo $arreglo[6] ?></td>
                        <td><?php echo $arreglo[7] ?></td>
                        <td class="letra">
                            <a href="<?php if($arreglo[0] <> ""){
                                echo "modificarproducto.php?key=".urlencode($arreglo[0]);
                            }else{
                                echo "<script> alert('Debe de consultar primero')</sccript>";
                            }?>">
                                <button name="modi" type="button" >Modificar</button>
                            </a> 
                        </td>
                        <td class="letra">
                            <a href="<?php if($arreglo[0]<>""){
                                        echo "eliminarproducto.php?key=".urlencode($arreglo[0]);
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