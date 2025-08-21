<?php
    class conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                $conectar = $this->dbh=new PDO("sqlsrv:Server=localhost;Databes=CompraVenta","sa","Hiraoka.vic4$");
                return $conectar;
            }catch(Exception $e){
                print "Error Conexion BD". $e->getMessage() ."<br/>>";
            }
        }
    }
?>