<?php
    class unidad_medida{
        public $ID_unidadmedida;
        public $tipo_UND;
        public $descripcion;

        function agregar(){
            $c = new Conexion();
            $cone = $c->conectando();
            $sql = "select * from unidad_medida where tipo_UND = '$this->tipo_UND'";
            $resultado = mysqli_query($cone,$sql);
            if($arreglo = mysqli_fetch_row($resultado)){

                echo"<script> alert('La unidad ya existe en el sistema');</script>";

            }else{
                $insertar ="insert into unidad_medida values('$this->ID_unidadmedida','$this->tipo_UND','$this->descripcion')";
                mysqli_query($cone,$insertar);
                echo"<script> alert('La unidad fue creada en el Sistema');</script>";

            }


}
function modificar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from unidad_medida where ID_unidadmedida = '$this->ID_unidadmedida'";
    $resultado = mysqli_query($cone,$sql);
    if(!mysqli_fetch_row($resultado)){

        echo"<script> alert('La unidad ya Existe en el Sistema');</script>";

    }else{
        $update ="update unidad_medida set ID_unidadmedida ='$this->ID_unidadmedida',
                                    tipo_UND = '$this->tipo_UND',
                                    descripcion = '$this->descripcion'
                                    where ID_unidadmedida ='$this->ID_unidadmedida'";
        echo $update;
        mysqli_query($cone,$update);
        echo"<script> alert('La unidad fue Modificada en el Sistema');</script>";

    }
}
function eliminar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $delete = "delete from unidad_medida where ID_unidadmedida ='$this->ID_unidadmedida'; ";
    if(mysqli_query($cone,$delete)){
        echo"<script> alert('La unidad fue eliminada en el Sistema');</script>";
    }else{
        echo"<script> alert('La unidad no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
    }       
}
}
?>