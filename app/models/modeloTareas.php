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

    public function insertNuevoAlimento($datos)
    {
        $this->db->query( 'INSERT INTO alimento_usuario (nombre, tipo, unidad_medida,idUsuario)
        VALUES ("' . $datos["nombreNuevo"] . '", ' . $datos["categoria"] . ', ' . $datos["unidadMedida"] . ',' . $_SESSION['idUsuario'] . ')');
        $this->db->execute();
    }

    public function obtenerAlimentosDefecto()
    {
        $this->db->query('SELECT a.id,a.nombre,t.tipo FROM alimento a LEFT JOIN tipo_alimento t ON a.tipo=t.id');

        $resultado = $this->db->registros();
        return $resultado;
    }

    public function obtenerAlimentosUsuario()
    {
        $this->db->query('SELECT au.id,au.nombre,t.tipo FROM alimento_usuario au LEFT JOIN tipo_alimento t ON au.tipo=t.id  WHERE idUsuario='.$_SESSION['idUsuario']);

        $resultado = $this->db->registros();
        return $resultado;
    }

    public function obtenerAlimentosDefectoFiltro($filtro)
    {
        $this->db->query('SELECT a.id,a.nombre,t.tipo FROM alimento a LEFT JOIN tipo_alimento t ON a.tipo=t.id WHERE nombre LIKE "'.$filtro.'%"');
        $resultado = $this->db->registros();
        return $resultado;
    }

    public function obtenerAlimentosUsuarioFiltro($filtro)
    {
        $this->db->query('SELECT au.id,au.nombre,t.tipo FROM alimento_usuario au LEFT JOIN tipo_alimento t ON au.tipo=t.id  WHERE idUsuario='.$_SESSION['idUsuario'].' AND nombre LIKE "'.$filtro.'%"');

        $resultado = $this->db->registros();
        return $resultado;
    }

}
