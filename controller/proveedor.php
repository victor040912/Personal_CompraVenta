<?php

    require_once("../config/conexion.php");
    require_once("../models/Proveedor.php");

    $proveedor=new Proveedor();

    switch($_GET["op"]){

        /* TODO: Guardar y editar, guardar como el ID este vacio y actualizar cuando se envie el ID */
        case "guardaryeditar":
            if(empty($_POST["prov_id"])){
                $proveedor->insert_proveedor($_POST["emp_id"],
                                        $_POST["prov_nom"],
                                        $_POST["prov_ruc"],
                                        $_POST["prov_telf"],
                                        $_POST["prov_direcc"],
                                        $_POST["prov_correo"]);
            }else{
                $proveedor->update_proveedor($_POST["prov_id"],
                                        $_POST["emp_id"],
                                        $_POST["prov_nom"],
                                        $_POST["prov_ruc"],
                                        $_POST["prov_telf"],
                                        $_POST["prov_direcc"],
                                        $_POST["prov_correo"]);
            }
            break;
        /* TODO: Listado de registros formato JSON para datatable */
        case "listar":
            $datos=$proveedor->get_proveedor_x_emp_id($_POST["emp_id"]);
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["PROV_NOM"];
                $sub_array[] = $row["PROV_RUC"];
                $sub_array[] = $row["PROV_TELF"];
                $sub_array[] = $row["PROV_DIRECC"];
                $sub_array[] = $row["FECH_CREA"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["PROV_ID"].')" id="'.$row["PROV_ID"].'" class="btn btn-primary waves-effect waves-light"><i class="ri-edit-2-line"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["PROV_ID"].')" id="'.$row["PROV_ID"].'" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-delete-bin-5-line"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
                echo json_encode($results);
            break;
            /* TODO: Mostrar informacion de registro segun su ID */
        case "mostrar":
            $datos=$proveedor->get_proveedor_x_prov_id($_POST["prov_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["PROV_ID"]    = $row["PROV_ID"];
                    $output["EMP_ID"]     = $row["EMP_ID"];
                    $output["PROV_NOM"]   = $row["PROV_NOM"];
                    $output["PROV_RUC"]   = $row["PROV_RUC"];
                    $output["PROV_TELF"]  = $row["PROV_TELF"];
                    $output["PROV_DIRECC"]= $row["PROV_DIRECC"];
                    $output["PROV_CORREO"]= $row["PROV_CORREO"];
                }
                echo json_encode($output);
            }
            break;
        /* TODO: cambiar esato a 0 del registro */
        case "eliminar":
            $proveedor->delete_proveedor($_POST["prov_id"]);
            break;
    }

?>