<?php

/**
 * Description of modeloTareas
 *
 * @author Usuario
 */
class modeloTareas
{


    public function __construct()
    {
        $this->db = new Base;
    }

    public function obtenerTiposAlimento()
    {
        $this->db->query('SELECT t.tipo FROM tipo_alimento t');

        $resultado = $this->db->registros();

        return $resultado;
    }

    public function obtenerUnidadesAlimento()
    {
        $this->db->query('SELECT u.descripcion FROM unidad_medida u');

        $resultado = $this->db->registros();
        return $resultado;
    }
}
