<?php

/**
 * Description of modeloTareasPausas.
 *
 * @author Usuario
 */
class modeloTareasPausas
{
    public function __construct()
    {
        $this->db = new Base();
    }

    public function obtenerPausasEmpleados()
    {
        $this->db->query('SELECT 
                                *
                            FROM tareas_pausas tp
                                LEFT JOIN tareas_persona tpe ON tp.idTareaPersona = tpe.idTareaPersona
                                LEFT JOIN tareas t ON tpe.idTareaPersona = t.idTarea
                                LEFT JOIN personas p ON tpe.idPersona = p.idPersona
                                LEFT JOIN tareas_tipos tt ON t.idTipoTarea = tt.idTipoTarea
                                LEFT JOIN zonas z ON t.idZonaTarea = z.idZona
                            ORDER BY tpe.fechaTarea DESC, tpe.horaLimite ASC');

        return $this->db->registros();
    }

    public function obtenerPausasEmpleado($idPersona)
    {
        $this->db->query('SELECT 
                                *
                            FROM tareas_pausas tp
                                LEFT JOIN tareas_persona tpe ON tp.idTareaPersona = tpe.idTareaPersona
                                LEFT JOIN tareas t ON tpe.idTareaPersona = t.idTarea
                                LEFT JOIN personas p ON tpe.idPersona = p.idPersona
                                LEFT JOIN tareas_tipos tt ON t.idTipoTarea = tt.idTipoTarea
                                LEFT JOIN zonas z ON t.idZonaTarea = z.idZona
                            WHERE tpe.idPersona = :idPersona
                            ORDER BY tpe.fechaTarea DESC, tpe.horaLimite ASC');

        $this->db->bind(':idPersona', $idPersona);

        return $this->db->registros();
    }

    public function obtenerPausasTarea($idTarea)
    {
        $this->db->query('SELECT 
                                *
                            FROM tareas_pausas tp
                                LEFT JOIN tareas_persona tpe ON tp.idTareaPersona = tpe.idTareaPersona
                                LEFT JOIN tareas t ON tpe.idTareaPersona = t.idTarea
                                LEFT JOIN personas p ON tpe.idPersona = p.idPersona
                                LEFT JOIN tareas_tipos tt ON t.idTipoTarea = tt.idTipoTarea
                                LEFT JOIN zonas z ON t.idZonaTarea = z.idZona
                            WHERE tpe.idTareaPersona = :idTarea
                            ORDER BY tpe.fechaTarea DESC, tpe.horaLimite ASC');

        $this->db->bind(':idTarea', $idTarea);

        return $this->db->registros();
    }

    public function obtenerPausaTarea($idPausa)
    {
        $this->db->query('SELECT 
                                *
                            FROM tareas_pausas tp
                                LEFT JOIN tareas_persona tpe ON tp.idTareaPersona = tpe.idTareaPersona
                                LEFT JOIN tareas t ON tpe.idTareaPersona = t.idTarea
                                LEFT JOIN personas p ON tpe.idPersona = p.idPersona
                                LEFT JOIN tareas_tipos tt ON t.idTipoTarea = tt.idTipoTarea
                                LEFT JOIN zonas z ON t.idZonaTarea = z.idZona
                            WHERE tp.idPausa = :idPausa');

        $this->db->bind(':idPausa', $idPausa);

        return $this->db->registro();
    }

    public function registrarInicioPausa($idTareaPersona)
    {
        $this->db->query('INSERT INTO tareas_pausas (idTareaPersona)
        VALUES (:idTareaPersona)');

        $this->db->bind(':idTareaPersona', $idTareaPersona);

        return $this->db->execute();
    }

    public function registrarFinPausa($idPausa)
    {
        $this->db->query('UPDATE tareas_pausas tp 
                            SET tp.finPausa = NOW() 
                            WHERE tp.idPausa = :idPausa');

        $this->db->bind(':idPausa', $idPausa);

        return $this->db->execute();
    }

    public function obtenerIdUltimaPausa($idTarea)
    {
        $this->db->query('SELECT 
                                MAX(idPausa) as id
                            FROM tareas_pausas
                            WHERE idTareaPersona = :idTarea');

        $this->db->bind(':idTarea', $idTarea);

        return $this->db->registro();
    }
}
