<?php
    class tipo_documento_con{
        public $ID_tipodocuemnto;
        public $Descripcion;
        public $ID_tipomovimiento;

        function agregar(){
            $c = new Conexion();
            $cone = $c->conectando();
            $sql = "select * from tipo_documento_con where Descripcion = '$this->Descripcion'";
            $resultado = mysqli_query($cone,$sql);
            if($arreglo = mysqli_fetch_row($resultado)){

                echo"<script> alert('el tipo de documento tontable ya existe en el sistema');</script>";

            }else{
                $insertar ="insert into tipo_documento_con values('$this->ID_tipodocumento','$this->Descripcion','$this->ID_tipomovimiento')";
                mysqli_query($cone,$insertar);
                echo"<script> alert('El tipo de documento contable fue creado en el Sistema');</script>";

            }


}
function modificar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from tipo_documento_con where ID_tipodocumento = '$this->ID_tipodocumento'";
    $resultado = mysqli_query($cone,$sql);  
    if(!mysqli_fetch_row($resultado)){

        echo"<script> alert('El tipo de documento contable ya Existe en el Sistema');</script>";

    }else{
        $update ="update tipo_documento_con set ID_tipodocumento = '$this->ID_tipodocumento',
                                    Descripcion = '$this->Descripcion',
                                    ID_tipomovimiento = '$this->ID_tipomovimiento'
                                    where ID_tipodocumento = '$this->ID_tipodocumento'";
        echo $update;
        mysqli_query($cone,$update);
        echo"<script> alert('El tipo de documento contable fue Modificado en el Sistema');</script>";

    }
}
function eliminar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $delete = "delete from tipo_documento_con where ID_tipodocumento ='$this->ID_tipodocumento'; ";
    if(mysqli_query($cone,$delete)){
        echo"<script> alert('El tipo de documento contable fue eliminada  en el Sistema');</script>";
    }else{
        echo"<script> alert('El tipo de documento contable no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
    }       
}
}
?>