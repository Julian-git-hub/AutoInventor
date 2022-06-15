<?php
    class modulos{
        public $ID_modulos;
        public $Descripcion;
        public $ID_permisos;

        function agregar(){
            $c = new Conexion();
            $cone = $c->conectando();
            $sql = "select * from modulos where Descripcion = '$this->Descripcion'";
            $resultado = mysqli_query($cone,$sql);
            if($arreglo = mysqli_fetch_row($resultado)){

                echo"<script> alert('el modulo ya existe en el sistema');</script>";

            }else{
                $insertar ="insert into modulos values('$this->ID_modulos','$this->Descripcion','$this->ID_permisos')";
                mysqli_query($cone,$insertar);
                echo"<script> alert('El modulo fue creado en el Sistema');</script>";

            }


}
function modificar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from modulos where ID_modulos = '$this->ID_modulos'";
    $resultado = mysqli_query($cone,$sql);  
    if(!mysqli_fetch_row($resultado)){

        echo"<script> alert('El modulo ya Existe en el Sistema');</script>";

    }else{
        $update ="update modulos set ID_modulos ='$this->ID_modulos',
                                    Descripcion = '$this->Descripcion',
                                    ID_permisos = '$this->ID_permisos'
                                    where ID_modulos ='$this->ID_modulos'";
        echo $update;
        mysqli_query($cone,$update);
        echo"<script> alert('El modulo fue Modificado en el Sistema');</script>";

    }
}
function eliminar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $delete = "delete from modulos where ID_modulos ='$this->ID_modulos';";
    if(mysqli_query($cone,$delete)){
        echo"<script> alert('El modulo fue eliminada  en el Sistema');</script>";
    }else{
        echo"<script> alert('El modulo no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
    }       
}
}
?>