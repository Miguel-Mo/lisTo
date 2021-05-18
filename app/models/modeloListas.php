<?php

/**
 * Description of modeloEmpleados
 *
 * @author Usuario
 */
class modeloListas {
    
    
    public function __construct(){
        $this->db = new Base;
    }


    public function insertRecetasToListaTemporal($idReceta){
        $this->db->query('INSERT INTO lista_temporal (idReceta,idUsuario)
        VALUES (' . $idReceta . ','. $_SESSION['idUsuario'] . ')');
        $this->db->execute();
    }    

    public function traerListaTemporal(){
        $this->db->query('SELECT * FROM lista_temporal where idUsuario='. $_SESSION['idUsuario'] );
        $resultado = $this->db->registros();
        return $resultado;
    }  

    public function eliminarRecetasListaTemporal($idReceta){
        $this->db->query('DELETE FROM lista_temporal where idUsuario='. $_SESSION['idUsuario'].' AND id='.$idReceta);
        $this->db->execute();
    }
}
