<?php

    class Unidad extends conectar{
        /* TODO: Listar registros */
        public function get_unidad_x_suc_id($suc_id){
            $conectar=parent::Conexion();
            $sql="SP_L_UNIDAD_01 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$suc_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Listas registro por id en especifico */
        public function get_unidad_x_und_id($und_id){
            $conectar=parent::Conexion();
            $sql="SP_L_UNIDAD_02 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$und_id);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: Eiminar o cambiar estado a eliminado */
        public function delete_unidad($und_id){
            $conectar=parent::Conexion();
            $sql="SP_D_UNIDAD_01 ?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$und_id);
            $query->execute();
        }
        /* TODO: Registro de datos */
        public function insert_unidad($suc_id,$und_nom){
            $conectar=parent::Conexion();
            $sql="SP_I_UNIDAD_01 ?,?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$suc_id);
            $query->bindValue(2,$und_nom);
            $query->execute();
        }
        /* TODO: Actualizar datos */
        public function update_unidad($und_id,$suc_id,$cat_nom){
            $conectar=parent::Conexion();
            $sql="SP_U_UNIDAD_01 ?,?,?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$und_id);
            $query->bindValue(2,$suc_id);
            $query->bindValue(3,$cat_nom);
            $query->execute();
        }
    }

?>