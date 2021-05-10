<?php

/**
 * Description of modeloTareas
 *
 * @author Usuario
 */
class modeloTareas {
    
    
    public function __construct(){
        $this->db = new Base;
    }
    
    public function obtenerTareas(){
        $this->db->query('SELECT * FROM tareas LEFT JOIN tareas_tipos tt on tt.idTipoTarea=tareas.idTipoTarea LEFT JOIN zonas z on z.idZona=tareas.idZonaTarea');

        $resultado = $this->db->registros();

        return $resultado;
    }

    public function obtenerTarea($id){
        $this->db->query('SELECT * FROM tareas LEFT JOIN tareas_tipos tt on tt.idTipoTarea=tareas.idTipoTarea LEFT JOIN zonas z on z.idZona=tareas.idZonaTarea where tareas.idTarea='.$id);

        $resultado = $this->db->registro();

        return $resultado;
    }

    public function obtenerTareaPersona($id){
        $this->db->query('SELECT * FROM tareas_persona where idTareaPersona='.$id);

        $resultado = $this->db->registro();

        return $resultado;
    }
    
    
}
