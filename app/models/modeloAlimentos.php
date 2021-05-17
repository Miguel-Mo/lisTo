<?php

/**
 * Description of modeloTareas
 *
 * @author Usuario
 */
class modeloAlimentos
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
        $this->db->query('INSERT INTO alimento (nombre, tipo, unidad_medida,idUsuario)
        VALUES ("' . $datos["nombreNuevo"] . '", ' . $datos["categoria"] . ', ' . $datos["unidadMedida"] . ',' . $_SESSION['idUsuario'] . ')');
        $this->db->execute();
    }

    public function obtenerAlimentosDefecto()
    {
        $this->db->query('SELECT a.id,a.nombre,t.tipo,a.idUsuario FROM alimento a LEFT JOIN tipo_alimento t ON a.tipo=t.id WHERE idUsuario IN(0,' . $_SESSION['idUsuario'].')');

        $resultado = $this->db->registros();
        return $resultado;
    }

    public function obtenerAlimentosDefectoFiltro($datosFiltro)
    {
        $filtrito=$this->formatedFiltro($datosFiltro);
        $this->db->query('SELECT a.id,a.nombre,t.tipo,a.idUsuario FROM alimento a LEFT JOIN tipo_alimento t ON a.tipo=t.id WHERE a.idUsuario IN(0,' . $_SESSION['idUsuario'].') AND  nombre LIKE "' . $datosFiltro['filtro'] . '%" ' . $filtrito);
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
        $filtrito = $tipos != "" ? 'AND a.tipo IN(' . $tipos . ')' : "";
        return $filtrito;
    }

    public function eliminarAlimentoById($id){

        $this->db->query('DELETE FROM alimento WHERE id='.$id);
        $resultado = $this->db->execute()==true?1:0;
        return $resultado;
    }

    public function eliminarAlimentoRecetaById($id){
        $this->db->query('DELETE FROM receta_alimento WHERE idAlimento='.$id);
        $this->db->execute();
    }
}
