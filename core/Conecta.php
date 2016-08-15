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
        $this->conexion=  mysqli_connect($this->host,$this->user,$this->password,$this->database_name)or die('no se pudo conectar');
        
    }
    public function Proceso(){
        $this->RealizarConexion();
        mysqli_select_db($this->conexion, $this->database_name)or die('no se encuentra bd');
        $this->result();
    }
    
    public function result(){
        $this->resultado=  mysqli_query($this->conexion,$this->sql)or die('no hay resultados');
    }

    public function EjecutarSql(){
        $this->setPeticion(mysqli_query($this->getConexion(),$this->getQuery())or die(('consulta fallida')));

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