<?php

    session_start();
    class conectar{
        protected $dbh;

        protected function Conexion(){
            try{
                $conectar = $this->dbh=new PDO("sqlsrv:Server=localhost\\SQLEXPRESS;Database=CompraVenta","sa","Hiraoka.vic4$");
                echo "conexion exitosa";
                return $conectar;
            }catch(Exception $e){
                print "Error Conexion BD". $e->getMessage() ."<br/>>";
            }
        }

        public static function ruta(){
            return "http://localhost/PERSONAL_CompraVenta/";
        }
    }
?>