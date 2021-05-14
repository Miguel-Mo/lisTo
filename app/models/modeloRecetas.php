<?php

/**
 * Description of modeloRecetas.
 *
 * @author Usuario
 */
class modeloRecetas
{
    public function __construct()
    {
        $this->db = new Base();
    }

    public function insertNuevaReceta($datos){
        $this->db->query('INSERT INTO receta (nombre, dificultad, tiempoEstimado,idUsuario)
        VALUES ("' . $datos["nombreNuevo"] . '", ' . $datos["dificultad"] . ', ' . $datos["tiempoReceta"] . ',' . $_SESSION['idUsuario'] . ')');
        $this->db->execute();
        $id=$this->db->lastInsertId();
        return $id;
    }

    public function insertAlimentoReceta($ingredienteReceta,$cantidadReceta,$unidadMedidaReceta,$idReceta){
        $this->db->query('INSERT INTO receta_alimento (idAlimento, cantidad, idUnidadMedida,idReceta)
        VALUES (' . $ingredienteReceta . ', ' . $cantidadReceta . ', ' . $unidadMedidaReceta . ',' . $idReceta . ')');
        $this->db->execute();
    }
   
}
