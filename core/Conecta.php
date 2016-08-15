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
    
    public function Proceso(){
        $this->conexion= mysqli_connect($this->getHost(), $this->getUser(), $this->getPassword(), $this->getDatabase_name() ) or die ('mal conectado');
        $this->resultado = mysqli_query($this->conexion, $this->sql)or die ('no hay resultado');
    }
        
    public function CerrarConexion(){
        mysqli_close($this->getConexion());
    }
    
    function getHost() {
        return $this->host;
    }

    function getUser() {
        return $this->user;
    }

    function getPassword() {
        return $this->password;
    }

    function getDatabase_name() {
        return $this->database_name;
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

    function setHost($host) {
        $this->host = $host;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setDatabase_name($database_name) {
        $this->database_name = $database_name;
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