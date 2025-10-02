<?php
class Reportes extends Conectar {

    public function get_balance() {
        $conectar = parent::Conexion();
        $sql = "SELECT * FROM vw_balance"; // tu vista
        $query = $conectar->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
