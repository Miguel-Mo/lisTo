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

    public function obtenerTodasRecetas(){
        $this->db->query('SELECT r.id,r.nombre,r.dificultad,t.tiempo FROM receta r  
        LEFT JOIN tiempo_aproximado t ON r.tiempoEstimado=t.id
        WHERE  idUsuario=' . $_SESSION['idUsuario']);
        $resultado = $this->db->registros();
        return $resultado;
    }

    public function obtenerAlimentosRecetas($idReceta){
        $this->db->query('SELECT ra.cantidad,a.nombre,um.descripcion FROM receta_alimento ra  
        LEFT JOIN alimento a ON ra.idAlimento=a.id
        LEFT JOIN unidad_medida um ON ra.idUnidadMedida=um.id

        WHERE  idReceta='.$idReceta);
        $resultado = $this->db->registros();
        return $resultado;
    }
   
    public function eliminarRecetaById($id){
        $this->db->query('DELETE FROM receta_alimento WHERE idReceta='.$id);
        $this->db->execute();
        $this->db->query('DELETE FROM receta WHERE id='.$id);
        $resultado = $this->db->execute()==true?1:0;
        return $resultado;
    }

    public function obtenerRecetasFiltro($datosFiltro)
    {
        $this->db->query('SELECT r.id,r.nombre,r.dificultad,t.tiempo FROM receta r  
        LEFT JOIN tiempo_aproximado t ON r.tiempoEstimado=t.id
        WHERE  idUsuario=' . $_SESSION['idUsuario'] .' AND nombre LIKE "' . $datosFiltro['filtro'] . '%"');
        $resultado = $this->db->registros();
        return $resultado;
    }

    public function obtenerRecetaIndividual($idReceta){
        $this->db->query('SELECT r.id,r.nombre,r.dificultad,t.tiempo FROM receta r  
        LEFT JOIN tiempo_aproximado t ON r.tiempoEstimado=t.id
        WHERE  idUsuario=' . $_SESSION['idUsuario'].' AND r.id='.$idReceta);
        $resultado = $this->db->registro();
        return $resultado;
    }

    public function obtenerAlimentosRecetasEditar($idReceta){
        $this->db->query('SELECT ra.*,a.nombre,um.descripcion FROM receta_alimento ra  
        LEFT JOIN alimento a ON ra.idAlimento=a.id
        LEFT JOIN unidad_medida um ON ra.idUnidadMedida=um.id
        WHERE  idReceta='.$idReceta);
        $resultado = $this->db->registros();
        return $resultado;
    }

}
