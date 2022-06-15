
<?php
include ("../conexion/conectar.php");
//header("Content-Type: application/vmd-ms-excel: charset=iso-8859-1");
//header("Content-Disposition: attachment; filename=Reportes de marcas.xls");
?>
header("");
header("");
<?php
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from marca";
    $resultado = mysqli_query($cone,$sql);
    $arreglo = mysqli_fetch_row($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Vistas/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../Vistas/CSS/font-awesome.min.css">
    <link rel="stylesheet" href="../librerias/jquery-3.6.0.min.js">
    <title>Reportes</title>
</head>
<body>
    <canvas id="bar-chart" width="800" height="450"></canvas>
    <table border: 1px;>
        <thead>
            <tr>
                <th>Listado de marcas</th>
            </tr>
            <tr>
                <th>codigo</th>
                <th>Marca</th>
                <th>Descripcion</th>
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
            </tr>
        </tbody>
        <?php
            }while($arreglo = mysqli_fetch_array($resultado));
        }
        ?>
    </table>
</body>
</html>
<script src="chart.min.js"></script>
<script>
    new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Chevrolet", "Toyota", "Nissan"],
      datasets: [
        {
          label: "Marcas",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [35,15,10,]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Marcas'
      }
    }
});
</script>