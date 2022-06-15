<?php
    include ("../conexion/conectar.php");
?>
<?php
    session_start();
    if(isset($_POST["ingresar"]))
    {
        $obj->Username = $_POST["Username"];
        $obj->Password = $_POST["Password"];
        $_SESSION["Username"] = $obj->Username;
        //echo "$obj->Username";
        $c = new Conexion();
        $cone = $c->conectando();
        $sql = "select * from terceros where Username = '$obj->Username' and Password = '$obj->Password'";
        $resultado = mysqli_query($cone,$sql);
        $arreglo = mysqli_num_rows($resultado);
    
        if($arreglo == 1){
            header("location: Home.php");
        }if($arreglo ==""){
            header("location:login.php");
        }else{
        echo "<script> alert('contraseña o usuario incorrecto.');
        </script>";}

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilologin.css">
    <title>Login</title>
</head>
<body>
    <div>
        <div class="logo"></div>
        <div class="login">
            <h1>Bienvenido</h1>
            <form action="" method="POST">
                <label for="">Usuario</label>
                <br>
                <input type="text" name="Username" id="Username" style="width: 80%; height: 30px; border-radius: 10px;" placeholder="Digite su usuario" required>
                <br>
                <label for="">Contraseña</label>
                <br>
                <input type="password" name="Password" id="Password" style="width: 80%; height: 30px; border-radius: 10px;" placeholder="Digite su contraseña" required>
                <br><br>
                <a href="Home.php"><button type="submit" name="ingresar" id="ingresar" style="width: 50%; height: 30px; border-radius: 10px;">Ingresar</button></a>
                <br><br>    
                <a href="alert.php" style="text-decoration: none;" name="Contrase" id="Contrase"><h2>¿Olvidaste tu contraseña?</h2></a>
                
            </form>
        </div>
    </div>
</body>
</html> 
