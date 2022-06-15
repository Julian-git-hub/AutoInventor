<?php
    class producto{
        public $ID_producto;
        public $Nombre;
        public $Descripcion;
        public $Costo_producto;
        public $ID_marca;
        public $ID_unidadmedida;

        function agregar(){
            $c = new Conexion();
            $cone = $c->conectando();
            $sql = "select * from producto where Nombre = '$this->Nombre'";
            $resultado = mysqli_query($cone,$sql);
            if($arreglo = mysqli_fetch_row($resultado)){

                echo"<script> alert('el Producto ya existe en el sistema');</script>";

            }else{
                $insertar ="insert into Producto values('$this->ID_producto','$this->Nombre','$this->Descripcion','$this->Costo_producto','$this->ID_marca','$this->ID_unidadmedida')";
                mysqli_query($cone,$insertar);
                echo"<script> alert('El Producto fue creado en el Sistema');</script>";

            }


}
function modificar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from producto where ID_producto = '$this->ID_producto'";
    $resultado = mysqli_query($cone,$sql);  
    if(!mysqli_fetch_row($resultado)){

        echo"<script> alert('El producto ya Existe en el Sistema');</script>";

    }else{
        $update ="update producto set ID_producto ='$this->ID_producto',
                                    Nombre = '$this->Nombre',
                                    Descripcion = '$this->Descripcion',
                                    Costo_producto = '$this->Costo_producto',
                                    ID_marca = '$this->ID_marca',
                                    ID_unidadmedida = '$this->ID_unidadmedida'
                                    where ID_producto ='$this->ID_producto'";
        echo $update;
        mysqli_query($cone,$update);
        echo"<script> alert('El producto fue Modificado en el Sistema');</script>";

    }
}
function eliminar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $delete = "delete from producto where ID_producto ='$this->ID_producto'; ";
    if(mysqli_query($cone,$delete)){
        echo"<script> alert('El producto fue eliminada  en el Sistema');</script>";
    }else{
        echo"<script> alert('El producto no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
    }       
}
}
?>