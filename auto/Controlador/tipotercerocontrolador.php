<?php
    class tipo_terceros{
        public $ID_tipo_terceros;
        public $Descripcion;

        function agregar(){
            $c = new Conexion();
            $cone = $c->conectando();
            $sql = "select * from tipo_terceros where Descripcion = '$this->Descripcion'";
            $resultado = mysqli_query($cone,$sql);
            if($arreglo = mysqli_fetch_row($resultado)){

                echo"<script> alert('el tipo de tercero ya existe en el sistema');</script>";

            }else{
                $insertar ="insert into tipo_terceros values('$this->ID_tipo_terceros','$this->Descripcion')";
                mysqli_query($cone,$insertar);
                echo"<script> alert('El tipo de terceros fue creado en el Sistema');</script>";

            }


}
function modificar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from tipo_terceros where ID_tipo_terceros = '$this->ID_tipo_terceros'";
    $resultado = mysqli_query($cone,$sql);  
    if(!mysqli_fetch_row($resultado)){

        echo"<script> alert('El tipo de terceros ya Existe en el Sistema');</script>";

    }else{
        $update ="update tipo_terceros set ID_tipo_terceros ='$this->ID_tipo_terceros',
                                    Descripcion = '$this->Descripcion'
                                    where ID_tipo_terceros ='$this->ID_tipo_terceros'";
        echo $update;
        mysqli_query($cone,$update);
        echo"<script> alert('El tipo de terceros fue Modificado en el Sistema');</script>";

    }
}
function eliminar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $delete = "delete from tipo_terceros where ID_tipo_terceros ='$this->ID_tipo_terceros'; ";
    if(mysqli_query($cone,$delete)){
        echo"<script> alert('El tipo de terceros fue eliminada  en el Sistema');</script>";
    }else{
        echo"<script> alert('El tipo de terceros no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
    }       
}
}
?>