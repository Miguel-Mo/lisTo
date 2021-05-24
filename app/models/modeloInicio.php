<?php

/**
 * Description of modeloInicio
 *
 * @author Usuario
 */
class modeloInicio {
    
    
    public function __construct(){
        $this->db = new Base;
    }

    public function obtenerDatosDonut(){
        $this->db->query('SELECT a.nombre, COUNT(*) as contador FROM receta_alimento ra
        LEFT JOIN alimento a ON ra.idAlimento=a.id
        LEFT JOIN receta r ON ra.idReceta=r.id
        WHERE r.idUsuario='.$_SESSION['idUsuario'].' 
        GROUP BY a.nombre');
        $resultado = $this->db->registros();
        
        return $resultado;
    }
    
    public function obtenerDatosGauge(){
        $this->db->query('SELECT l.tituloLista as nombre, l.vecesMarcadaComoActiva as contador FROM lista l 
        WHERE l.idUsuario='.$_SESSION['idUsuario'].' 
        GROUP BY nombre');
        $resultado = $this->db->registros();
        
        return $resultado;
    }
    
    
    
    
}
