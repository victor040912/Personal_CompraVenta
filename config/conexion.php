<?php

    session_start();
    class conectar{
        protected $dbh;

        public function Conexion(){
            try{
                $conectar = $this->dbh=new PDO("sqlsrv:Server=localhost\\SQLEXPRESS;Database=CompraVenta","sa","Victorquiroz13");
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