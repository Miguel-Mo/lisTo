<?php

/**
 * Description of modeloZonas
 *
 * @author Usuario
 */
class modeloZonas {
    
    
    public function __construct(){
        $this->db = new Base;
    }
    
    public function obtenerZonas(){
        $this->db->query('SELECT * FROM zonas');

        $resultado = $this->db->registros();

        return $resultado;
    }

    public function obtenerZona($id){
        $this->db->query('SELECT * FROM zonas where idZona='.$id);

        $resultado = $this->db->registro();

        return $resultado;
    }
    
    
}
