<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../config/conexion.php");
require_once("../models/Reportes.php");

$reporte = new Reportes();

switch($_GET["op"]){
    /* TODO: Listar datos para DataTable */
    case "listarbalance":
        $datos = $reporte->get_balance();
        $data = array();

        foreach($datos as $row){
        $sub_array = array();
        $sub_array[] = $row["Producto"];                // PROD_NOM
        
        $sub_array[] = $row["Stock_Historico"];           // PROD_PCOMPRA
        $sub_array[] = $row["Stock_Actual"];              // PROD_STOCK
        $sub_array[] = $row["Precio_Compra"];           
        $sub_array[] = $row["Precio_Venta"];            // PROD_PVENTA
        $sub_array[] = $row["Total_Esperado"];
        $sub_array[] = $row["Total_Invertido"];
        $sub_array[] = $row["Total_Ganancia_Esperada"]; 
        $sub_array[] = $row["Venta_Realizada"];
        $sub_array[] = $row["Ganancia_Realizada"];  
        $sub_array[] = $row["Total_Invertido"];         // si quieres mostrar inversión retornada
        $sub_array[] = $row["Desbalance"];
        $sub_array[] = $row["A_Favor"];
        $data[] = $sub_array;
    }


        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );

        echo json_encode($results);
        break;
}
?>
