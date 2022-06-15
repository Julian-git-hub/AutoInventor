<?php
    class permisos{
        public $ID_permisos;
        public $Descripcion;

        function agregar(){
            $c = new Conexion();
            $cone = $c->conectando();
            $sql = "select * from permisos where Descripcion = '$this->Descripcion'";
            $resultado = mysqli_query($cone,$sql);
            if($arreglo = mysqli_fetch_row($resultado)){

                echo"<script> alert('el permiso ya existe en el sistema');</script>";

            }else{
                $insertar ="insert into permisos values('$this->ID_permisos','$this->Descripcion')";
                mysqli_query($cone,$insertar);
                echo"<script> alert('El permiso fue creado en el Sistema');</script>";

            }


}
function modificar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from permisos where ID_permisos = '$this->ID_permisos'";
    $resultado = mysqli_query($cone,$sql);  
    if(!mysqli_fetch_row($resultado)){

        echo"<script> alert('El permiso ya Existe en el Sistema');</script>";

    }else{
        $update ="update permisos set ID_permisos ='$this->ID_permisos',
                                    Descripcion = '$this->Descripcion'
                                    where ID_permisos ='$this->ID_permisos'";
        echo $update;
        mysqli_query($cone,$update);
        echo"<script> alert('El permiso fue Modificado en el Sistema');</script>";

    }
}
function eliminar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $delete = "delete from permisos where ID_permisos ='$this->ID_permisos'; ";
    if(mysqli_query($cone,$delete)){
        echo"<script> alert('El permiso fue eliminada  en el Sistema');</script>";
    }else{
        echo"<script> alert('El permiso no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
    }       
}
}
?>