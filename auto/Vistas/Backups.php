<?PHP session_start();
/*if(@$HTTP_SESSION_VARS["secretarias_status"] != "login")
	{
    header("Location: login.php");
    } */
include('../conexion/conectar.php'); 

  $paso=0;
  $ir=0;
    if(isset($_POST['backup'])){
                        //echo "hola";
                        $paso=1;
                        $fecha1=date("Y-m-d");
                        $hora = date("H.i");
                        $file = "AUTO_IVENTORY$fecha1---$hora.sql";
	                    $x = "c:/copias/mysqldump.exe --opt --password= --user=root projecto > c://copias/$file";
                        $y = exec( $x );
	                    //echo $y;
                        if( $y != "" )
	                        $ir=1;
                        else 
	                        $ir=2;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backups</title>
</head>
<body>
    <form name="form1" method="post" action="Backups.php">
    <BR>
        <div align="center">
    <BR>
    <table width="64%" border="5" cellpadding="5"  cellspacing="2">
        <tr>
            <td height="107"><table width="100%" border="0">
        <tr>
            <td width="74%"><table width="100%" border="1">
        <tr>
            <td><div align="center"><span><strong><font>BACKUP DE AUTO INVENTORY</font></strong></span></div></td>
        </tr>
        <tr>
            <td><div align="center"><strong><font>Auto Inventory</font></strong></div></td>
        </tr>
        <tr>
            <td><div align="center"><strong>Fecha de Backup <?php echo date("Y/m/d"); ?> .</strong></div></td>
        </tr>
    </table></td>
        </tr>
    </table></td>
        </tr>
        <tr>
            <td><table width="100%" border="0">
              
        <tr>
            <td width="100%"><p align="center">
			    <?php
                    if($paso==0){
			  	?>
			    <input type="submit" name="backup" value="Realizar Backup">
			    
				<?php
				}
				else
				{
				    if($ir==2){
				?>
				<br>
				<span>Backup Generado </span>
                <p align="center"><span><a href="Backups.php">Volver</a>
				<br>
				</span>
                <?php
				  
				echo "La informacion esta en el archivo ";
				}
				if($ir==1){
				
				?>
                <br>
                <span>El Backup NO Generado</span><br> 
				              
		        </span>
            <?php
							
			}
				
			}
			?>
				    
              </p></td>
              </tr>
          </table></td>
        </tr>
      </table>
    </div>
    </form>
</body>
</html>