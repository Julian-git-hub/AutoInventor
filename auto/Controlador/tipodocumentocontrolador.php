<?php
    class tipo_de_documento{
        public $ID_tipo_Documento;
        public $Descripcion;

        function agregar(){
            $c = new Conexion();
            $cone = $c->conectando();
            $sql = "select * from tipo_de_documento where Descripcion = '$this->Descripcion'";
            $resultado = mysqli_query($cone,$sql);
            if($arreglo = mysqli_fetch_row($resultado)){

                echo"<script> alert('el tipo de documento ya existe en el sistema');</script>";

            }else{
                $insertar ="insert into tipo_de_documento values('$this->ID_tipo_Documento','$this->Descripcion')";
                mysqli_query($cone,$insertar);
                echo"<script> alert('El tipo de documento fue creado en el Sistema');</script>";

            }


}
function modificar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from tipo_de_documento where ID_tipo_Documento = '$this->ID_tipo_Documento'";
    $resultado = mysqli_query($cone,$sql);  
    if(!mysqli_fetch_row($resultado)){

        echo"<script> alert('El tipo de documento ya Existe en el Sistema');</script>";

    }else{
        $update ="update tipo_de_documento set ID_tipo_Documento ='$this->ID_tipo_Documento',
                                    Descripcion = '$this->Descripcion'
                                    where ID_tipo_Documento ='$this->ID_tipo_Documento'";
        echo $update;
        mysqli_query($cone,$update);
        echo"<script> alert('El modelo fue Modificado en el Sistema');</script>";

    }
}
function eliminar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $delete = "delete from tipo_de_documento where ID_tipo_Documento ='$this->ID_tipo_Documento'; ";
    if(mysqli_query($cone,$delete)){
        echo"<script> alert('El modelo fue eliminada  en el Sistema');</script>";
    }else{
        echo"<script> alert('El modelo no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
    }       
}
}
?>