<?php

class Conecta {
    private $host='mysql.hostinger.com.ar';
    private $user='u618118180_rav';
    private $password='282ANYFIO';
    private $database_name='u618118180_pagos';
    private $conexion;
    private $resultado;
    private $sql='SELECT c.nomCli, s.feInicio, s.fechaFin, c.pago, s.estado FROM serpag sp join servicio s on s.idmen = sp.idmen join pago p on p.idPago = sp.idpago join cliente c on c.idCli = p.idCli ';
    public function __construct() {
        
    }
    public function RealizarConexion(){
        $this->conexion=  mysqli_connect($this->host,$this->user,$this->password,$this->database_name);
    }
    public function Proceso(){
        $this->RealizarConexion();
        $this->result();
        
        
    }
    
    public function result(){
        $this->resultado=  mysqli_query($this->conexion,$this->sql);
    }

    public function VerificarConexion(){
        if(!$this->getConexion()){
             die('No se conecto'.mysqli_error());
        }  else {

//            echo 'se conecto en la verificacion<br>';
        }
    }

    public function rowCount(){
        $con=0;
        while($row=mysqli_fetch_array($this->getResultado())) {
            $con=$con+1;
        } 
        return $con;
    }

    public function EjecutarSql(){
        $this->setPeticion(mysqli_query($this->getConexion(),$this->getQuery())or die(('consulta fallida')));

    }
    
//    public function Nfilas($sql){
//        return mysqli_num_rows($sql);
//    }
//    public function NColumnas($sql){
//        return mysqli_num_fields($sql);
//    }
//    public function NomCampo($sql,$i){
//        return mysqli_field_name($sql);
//    }
   

    public function ProcesarConexion(){
        $this->Conectar();
        $this->VerificarConexion();
        $this->SeleccionarBD();
        $this->EjecutarSql();
    }
    public function CerrarConexion(){
        mysqli_close($this->getConexion());
    }
function getConexion() {
    return $this->conexion;
}

 function getResultado() {
    return $this->resultado;
}

 function getSql() {
    return $this->sql;
}

 function setConexion($conexion) {
    $this->conexion = $conexion;
}

 function setResultado($resultado) {
    $this->resultado = $resultado;
}

 function setSql($sql) {
    $this->sql = $sql;
}
}




?>