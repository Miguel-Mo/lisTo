<?php

/**
 * Description of modeloTareas
 *
 * @author Usuario
 */
class modeloTiposTarea {
    
    
    public function __construct(){
        $this->db = new Base;
    }
    
    public function obtenerTiposTarea(){
        $this->db->query('SELECT * FROM tareas_tipos');

        $resultado = $this->db->registros();

        return $resultado;
    }
    
    
}
