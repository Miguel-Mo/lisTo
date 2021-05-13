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
        $this->db->query('INSERT INTO alimento_usuario (nombre, tipo, unidad_medida,idUsuario)
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
        $this->db->query('SELECT au.id,au.nombre,t.tipo FROM alimento_usuario au LEFT JOIN tipo_alimento t ON au.tipo=t.id  WHERE idUsuario=' . $_SESSION['idUsuario']);

        $resultado = $this->db->registros();
        return $resultado;
    }

    public function obtenerAlimentosDefectoFiltro($datosFiltro)
    {
        $filtrito=$this->formatedFiltro($datosFiltro);
        $this->db->query('SELECT a.id,a.nombre,t.tipo FROM alimento a LEFT JOIN tipo_alimento t ON a.tipo=t.id WHERE nombre LIKE "' . $datosFiltro['filtro'] . '%" ' . $filtrito);
        $resultado = $this->db->registros();
        return $resultado;
    }

    public function obtenerAlimentosUsuarioFiltro($datosFiltro)
    {
        $filtrito=$this->formatedFiltro($datosFiltro);
        $this->db->query('SELECT a.id,a.nombre,t.tipo FROM alimento_usuario a LEFT JOIN tipo_alimento t ON a.tipo=t.id  WHERE idUsuario=' . $_SESSION['idUsuario'] . ' AND nombre LIKE "' . $datosFiltro['filtro'] . '%" ' . $filtrito);
        $resultado = $this->db->registros();
        return $resultado;
    }

    public function formatedFiltro($datosFiltro)
    {
        $filtrosActivos = [];
        $datosFiltro['lacteo'] == 1 ? array_push($filtrosActivos, 1) : "";
        $datosFiltro['vegetal'] == 1 ? array_push($filtrosActivos, 2) : "";
        $datosFiltro['carne'] == 1 ? array_push($filtrosActivos, 3) : "";
        $datosFiltro['pescado'] == 1 ? array_push($filtrosActivos, 4) : "";
        $tipos = "";
        for ($i = 0; $i < count($filtrosActivos); $i++) {
            if ($i + 1 >= count($filtrosActivos)) {
                $tipos .= $filtrosActivos[$i];
            } else {
                $tipos .= $filtrosActivos[$i] . ",";
            }
        }
        $filtrito = $tipos != "" ? 'AND a.tipo IN("' . $tipos . '")' : "";
        return $filtrito;
    }
}
