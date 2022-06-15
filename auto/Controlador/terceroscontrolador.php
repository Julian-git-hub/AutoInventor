<?php
    class terceros{
        public $ID_terceros;
        public $Nombre; 
        public $Apellidos; 
        public $Direccion;
        public $Correo;
        public $Telefono; 
        public $Identificacion; 
        public $Razon_Social;
        public $Username;
        public $Password;
        public $ID_tipo_Documento; 
        public $ID_tipo_terceros;

        function agregar(){
            $c = new Conexion();
            $cone = $c->conectando();
            $sql = "select * from terceros where Nombre = '$this->Nombre'";
            $resultado = mysqli_query($cone,$sql);
            if($arreglo = mysqli_fetch_row($resultado)){

                echo"<script> alert('el tercero ya existe en el sistema');</script>";

            }else{
                $insertar ="insert into terceros values('$this->ID_terceros','$this->Nombre','$this->Apellidos','$this->Direccion','$this->Correo','$this->Telefono','$this->Identificacion','$this->Razon_Social','$this->Username','$this->Password','$this->ID_tipo_Documento','$this->ID_tipo_terceros')";
                mysqli_query($cone,$insertar);
                echo"<script> alert('El tercero fue creado en el Sistema');</script>";

            }


}
function modificar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $sql = "select * from terceros where ID_terceros = '$this->ID_terceros'";
    $resultado = mysqli_query($cone,$sql);  
    if(!mysqli_fetch_row($resultado)){

        echo"<script> alert('El tercero ya Existe en el Sistema');</script>";

    }else{
        $update ="update terceros set ID_terceros ='$this->ID_terceros',
                                    Nombre = '$this->Nombre',
                                    Apellidos = '$this->Apellidos',
                                    Direccion = '$this->Direccion',
                                    Correo = '$this->Correo',
                                    Telefono = '$this->Telefono',
                                    Identificacion = '$this->Identificacion',
                                    Razon_Social = '$this->Razon_Social',
                                    Username = '$this->Username',
                                    Password = '$this->Password',
                                    ID_tipo_Documento = '$this->ID_tipo_Documento',
                                    ID_tipo_terceros = '$this->ID_tipo_terceros'
                                    where ID_terceros ='$this->ID_terceros'";
        echo $update;
        mysqli_query($cone,$update);
        echo"<script> alert('El tercero fue Modificado en el Sistema');</script>";

    }
}
function eliminar(){
    $c = new Conexion();
    $cone = $c->conectando();
    $delete = "delete from terceros where ID_terceros ='$this->ID_terceros'; ";
    if(mysqli_query($cone,$delete)){
        echo"<script> alert('El tercero fue eliminada  en el Sistema');</script>";
    }else{
        echo"<script> alert('El tercero no se puede eliminar porque tiene registros relacionados en el Sistema');</script>";
    }       
}
}
?>