<?php
    class forma_de_pago{
        public $ID_formapago;
        public $Descripcion;

        function agregar(){
            $c = new Conexion();
            $cone = $c->conectando();
            $sql = "select * from forma_de_pago where Descripcion = '$this->Descripcion'";
            $resultado = mysqli_query($cone,$sql);
            if($arreglo = mysqli_fetch_row($resultado)){

                echo"<script> alert('La forma de pago ya existe en el sistema');</script>";

            }else{
                $insertar ="insert into forma_de_pago values('$this->ID_formapago','$this->Descripcion')";
                mysqli_query($cone,$insertar);
                echo"<script> alert('La forma de pago fue creado en el Sistema');</script>";

            }


}
function modificar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from forma_de_pago where ID_formapago = '$this->ID_formapago'";
    $resultado = mysqli_query($cone,$sql);  
    if(!mysqli_fetch_row($resultado)){

        echo"<script> alert('La forma de pago ya Existe en el Sistema');</script>";

    }else{
        $update ="update forma_de_pago set ID_formapago ='$this->ID_formapago',
                                    Descripcion = '$this->Descripcion'
                                    where ID_formapago ='$this->ID_formapago'";
        echo $update;
        mysqli_query($cone,$update);
        echo"<script> alert('La forma de pago fue Modificado en el Sistema');</script>";

    }
}
function eliminar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $delete = "delete from forma_de_pago where ID_formapago ='$this->ID_formapago'; ";
    if(mysqli_query($cone,$delete)){
        echo"<script> alert('La forma de pago fue eliminada  en el Sistema');</script>";
    }else{
        echo"<script> alert('La forma de pago no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
    }       
}
}
?>