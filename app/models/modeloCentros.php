<?php

/**
 * Description of modeloCentros.
 *
 * @author Usuario
 */
class modeloCentros
{
    public function __construct()
    {
        $this->db = new Base();
    }

    public function obtenerCentros()
    {
        $this->db->query('SELECT * FROM centros');

        $resultado = $this->db->registros();

        return $resultado;
    }

    public function obtenerCentro($id)
    {
        $this->db->query('SELECT * FROM centros where idCentro='.$id);

        $resultado = $this->db->registro();

        return $resultado;
    }

    public function obtenerCentrosResumen()
    {
        $this->db->query('SELECT *,
        count(distinct(p.idPersona)) as Empleados,
        sum(if(tp.fechaTarea=CURDATE(),1,0)) as TareasHoy,
        sum(if(tp.fechaTarea=CURDATE() and tp.finTarea is not null,1,0)) as TareasTerminadasHoy,
        count(distinct(tp.idTareaPersona)) as TareasTotal,
        sum(if(tp.finTarea is not null,1,0)) as TareasTerminadasTotal FROM centros c
        LEFT JOIN personas p on p.idCentroPersona=c.idCentro
        LEFT JOIN tareas_persona tp on tp.idPersona=p.idPersona
        GROUP BY c.idCentro');

        $resultado = $this->db->registros();

        return $resultado;
    }

    public function editarUsuarioCentro($idCentro, $idUsuario)
    {
        $query = 'UPDATE centros 
                        SET idUsuario ='.$idUsuario.'
                    WHERE idCentro='.$idCentro;

        $this->db->query($query);

        return $this->db->execute();
    }

    public function obtenerCentroPorUsuario($id)
    {
        $this->db->query('SELECT 
                                * 
                            FROM centros 
                            WHERE idUsuario = :idUsuario');

        $this->db->bind(':idUsuario', $id);

        return $this->db->registro();
    }
}
