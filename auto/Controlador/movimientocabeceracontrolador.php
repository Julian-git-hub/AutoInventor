<?php
    class movimiento_cabecera{
        public $ID_movcabecera;
        public $Fecha;
        public $Num_documento;
        public $ID_terceros;
        public $ID_formapago;
        public $ID_tipodocumento;

        function agregar(){
            $c = new Conexion();
            $cone = $c->conectando();
            $sql = "select * from movimiento_cabecera where Fecha = '$this->Fecha'";
            $resultado = mysqli_query($cone,$sql);
            if($arreglo = mysqli_fetch_row($resultado)){

                echo"<script> alert('el movimiento cabecera ya existe en el sistema');</script>";

            }else{
                $insertar ="insert into movimiento_cabecera values('$this->ID_movcabecera','$this->Fecha','$this->Num_documento','$this->ID_terceros','$this->ID_formapago','$this->ID_tipodocumento')";
                mysqli_query($cone,$insertar);
                echo"<script> alert('El movimiento cabecera fue creado en el Sistema');</script>";

            }


}
function modificar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from movimiento_cabecera where ID_movcabecera = '$this->ID_movcabecera'";
    $resultado = mysqli_query($cone,$sql);  
    if(!mysqli_fetch_row($resultado)){

        echo"<script> alert('El movimiento cabecera ya Existe en el Sistema');</script>";

    }else{
        $update ="update movimiento_cabecera set ID_movcabecera ='$this->ID_movcabecera',
                                    Fecha = '$this->Fecha',
                                    Num_documento = '$this->Num_documento',
                                    ID_terceros= '$this->ID_terceros',
                                    ID_formapago = '$this->ID_formapago',
                                    ID_tipodocumento = '$this->ID_tipodocumento'
                                    where ID_movcabecera ='$this->ID_movcabecera'";
        echo $update;
        mysqli_query($cone,$update);
        echo"<script> alert('El movimiento cabecera fue Modificado en el Sistema');</script>";

    }
}
function eliminar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $delete = "delete from movimiento_cabecera where ID_movcabecera ='$this->ID_movcabecera'; ";
    if(mysqli_query($cone,$delete)){
        echo"<script> alert('El modelo fue eliminada  en el Sistema');</script>";
    }else{
        echo"<script> alert('El modelo no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
    }       
}
}
?>