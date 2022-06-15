<?php
    class tipo_movimiento{
        public $ID_tipomovimiento;
        public $Descripcion;

        function agregar(){
            $c = new Conexion();
            $cone = $c->conectando();
            $sql = "select * from tipo_movimiento where Descripcion = '$this->Descripcion'";
            $resultado = mysqli_query($cone,$sql);
            if($arreglo = mysqli_fetch_row($resultado)){

                echo"<script> alert('el tipo de movimiento ya existe en el sistema');</script>";

            }else{
                $insertar ="insert into tipo_movimiento values('$this->ID_tipomovimiento','$this->Descripcion')";
                mysqli_query($cone,$insertar);
                echo"<script> alert('El tipo de movimiento fue creado en el Sistema');</script>";

            }


}
function modificar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from tipo_movimiento where ID_tipomovimiento = '$this->ID_tipomovimiento'";
    $resultado = mysqli_query($cone,$sql);  
    if(!mysqli_fetch_row($resultado)){

        echo"<script> alert('El tipo de movimiento ya Existe en el Sistema');</script>";

    }else{
        $update ="update tipo_movimiento set ID_tipomovimiento ='$this->ID_tipomovimiento',
                                    Descripcion = '$this->Descripcion'
                                    where ID_tipomovimiento ='$this->ID_tipomovimiento'";
        echo $update;
        mysqli_query($cone,$update);
        echo"<script> alert('El tipo de movimiento fue Modificado en el Sistema');</script>";

    }
}
function eliminar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $delete = "delete from tipo_Movimiento where ID_tipomovimiento ='$this->ID_tipomovimiento'; ";
    if(mysqli_query($cone,$delete)){
        echo"<script> alert('El tipo de movimiento fue eliminada  en el Sistema');</script>";
    }else{
        echo"<script> alert('El tipo de movimiento no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
    }       
}
}
?>