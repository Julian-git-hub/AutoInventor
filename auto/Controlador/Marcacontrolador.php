<?php
    class marca{
        public $ID_marca;
        public $Modelo;
        public $Descripcion;

        function agregar(){
            $c = new Conexion();
            $cone = $c->conectando();
            $sql = "select * from marca where Modelo = '$this->Modelo'";
            $resultado = mysqli_query($cone,$sql);
            if($arreglo = mysqli_fetch_row($resultado)){

                echo"<script> alert('el modelo ya existe en el sistema');</script>";

            }else{
                $insertar ="insert into marca values('$this->ID_marca','$this->Modelo','$this->Descripcion')";
                mysqli_query($cone,$insertar);
                echo"<script> alert('El modelo fue creado en el Sistema');</script>";

            }


}
function modificar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from marca where ID_marca = '$this->ID_marca'";
    $resultado = mysqli_query($cone,$sql);  
    if(!mysqli_fetch_row($resultado)){

        echo"<script> alert('El modelo ya Existe en el Sistema');</script>";

    }else{
        $update ="update marca set ID_marca ='$this->ID_marca',
                                    Modelo = '$this->Modelo',
                                    Descripcion = '$this->Descripcion'
                                    where ID_marca ='$this->ID_marca'";
        echo $update;
        mysqli_query($cone,$update);
        echo"<script> alert('El modelo fue Modificado en el Sistema');</script>";

    }
}
function eliminar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $delete = "delete from marca where ID_marca ='$this->ID_marca'; ";
    if(mysqli_query($cone,$delete)){
        echo"<script> alert('El modelo fue eliminada  en el Sistema');</script>";
    }else{
        echo"<script> alert('El modelo no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
    }       
}
}
?>