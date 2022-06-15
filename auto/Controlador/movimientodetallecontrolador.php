<?php
    class movimiento_detalle{
        public $ID_movdetalle;
        public $Cantidad;
        public $descuento;
        public $Precio_unitario;
        public $Precio_total;
        public $movimiento_cabecera_ID_movcabecera;
        public $producto_ID_producto;

        function agregar(){
            $c = new Conexion();
            $cone = $c->conectando();
            $sql = "select * from movimiento_detalle where ID_movdetalle = '$this->ID_movdetalle'";
            $resultado = mysqli_query($cone,$sql);
            if($arreglo = mysqli_fetch_row($resultado)){

                echo"<script> alert('el movimiento detalle ya existe en el sistema');</script>";

            }else{
                $insertar ="insert into movimiento_detalle values('$this->ID_movdetalle','$this->Cantidad','$this->descuento','$this->Precio_unitario','$this->Precio_total','$this->movimiento_cabecera_ID_movcabecera','$this->producto_ID_producto')";
                mysqli_query($cone,$insertar);
                echo"<script> alert('El movimiento detalle fue creado en el Sistema');</script>";

            }


}
function modificar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from movimiento_detalle where ID_movdetalle = '$this->ID_movdetalle'";
    $resultado = mysqli_query($cone,$sql);  
    if(!mysqli_fetch_row($resultado)){

        echo"<script> alert('El movimiento detalle ya Existe en el Sistema');</script>";

    }else{
        $update ="update movimiento_detalle set ID_movdetalle ='$this->ID_movdetalle',
                                    Cantidad = '$this->Cantidad',
                                    descuento = '$this->descuento',
                                    Precio_unitario = '$this->Precio_unitario',
                                    Precio_total = '$this->Precio_total',
                                    movimiento_cabecera_ID_movcabecera = '$this->movimiento_cabecera_ID_movcabecera',
                                    producto_ID_producto = '$this->producto_ID_producto'
                                    where ID_movdetalle ='$this->ID_movdetalle'";
        echo $update;
        mysqli_query($cone,$update);
        echo"<script> alert('El movimiento detalle fue Modificado en el Sistema');</script>";

    }
}
function eliminar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $delete = "delete from movimiento_detalle where ID_movdetalle ='$this->ID_movdetalle'; ";
    if(mysqli_query($cone,$delete)){
        echo"<script> alert('El movimiento detalle fue eliminada  en el Sistema');</script>";
    }else{
        echo"<script> alert('El movimiento detalle no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
    }       
}
}
?>