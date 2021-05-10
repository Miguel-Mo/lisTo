<?php

/**
 * Description of modeloTareasEmpleado.
 *
 * @author Usuario
 */
class modeloTareasEmpleado
{
    public function __construct()
    {
        $this->db = new Base();
    }

    public function obtenerTareasEmpleados()
    {
        $this->db->query('SELECT 
                                *
                            FROM tareas_persona tp
                                LEFT JOIN tareas t ON tp.idTarea = t.idTarea
                                LEFT JOIN personas p ON tp.idPersona = p.idPersona
                                LEFT JOIN tareas_tipos tt ON t.idTipoTarea = tt.idTipoTarea
                                LEFT JOIN zonas z ON t.idZonaTarea = z.idZona
                            ORDER BY tp.fechaTarea ASC, tp.horaLimite ASC');

        return $this->db->registros();
    }

    public function obtenerTareasEmpleado($idPersona)
    {
        $this->db->query('SELECT 
                                *
                            FROM tareas_persona tp
                                LEFT JOIN tareas t ON tp.idTarea = t.idTarea
                                LEFT JOIN personas p ON tp.idPersona = p.idPersona
                                LEFT JOIN tareas_tipos tt ON t.idTipoTarea = tt.idTipoTarea
                                LEFT JOIN zonas z ON t.idZonaTarea = z.idZona
                            WHERE tp.idPersona = :idPersona
                            ORDER BY tp.fechaTarea ASC, tp.horaLimite ASC');

        $this->db->bind(':idPersona', $idPersona);

        return $this->db->registros();
    }

    public function obtenerTareasEmpleadoHoy($idPersona)
    {
        $this->db->query('SELECT 
                                *
                            FROM tareas_persona tp
                                LEFT JOIN tareas t ON tp.idTarea = t.idTarea
                                LEFT JOIN personas p ON tp.idPersona = p.idPersona
                                LEFT JOIN tareas_tipos tt ON t.idTipoTarea = tt.idTipoTarea
                                LEFT JOIN zonas z ON t.idZonaTarea = z.idZona
                            WHERE tp.idPersona = :idPersona
                                AND tp.fechaTarea = CURDATE() 
                                OR (tp.fechaTarea < CURDATE() AND tp.finTarea IS NULL)
                            ORDER BY tp.fechaTarea ASC, tp.horaLimite ASC');

        $this->db->bind(':idPersona', $idPersona);

        return $this->db->registros();
    }

    public function obtenerTareaEmpleado($idTarea)
    {

        $this->db->query('SELECT 
                                *
                            FROM tareas_persona tp
                                LEFT JOIN tareas t ON tp.idTarea = t.idTarea
                                LEFT JOIN personas p ON tp.idPersona = p.idPersona
                                LEFT JOIN tareas_tipos tt ON t.idTipoTarea = tt.idTipoTarea
                                LEFT JOIN zonas z ON t.idZonaTarea = z.idZona
                            WHERE tp.idTareaPersona = :idTarea');
        $this->db->bind(':idTarea', $idTarea);

        return $this->db->registro();
    }

    public function registrarInicioTarea($idTarea)
    {
        $this->db->query('UPDATE tareas_persona tp 
                            SET tp.inicioTarea = NOW() 
                            WHERE tp.idTareaPersona = :idTarea');

        $this->db->bind(':idTarea', $idTarea);

        return $this->db->execute();
    }

    public function registrarFinTarea($idTarea)
    {
        $this->db->query('UPDATE tareas_persona tp 
                            SET tp.finTarea = NOW() 
                            WHERE tp.idTareaPersona = :idTarea');

        $this->db->bind(':idTarea', $idTarea);

        return $this->db->execute();
    }

    public function marcarComoPausada($idTarea, $idPausa = null)
    {
        $this->db->query('UPDATE tareas_persona tp 
                            SET tp.idUltimaPausa = :idPausa
                            WHERE tp.idTareaPersona = :idTarea');

        $this->db->bind(':idTarea', $idTarea);
        $this->db->bind(':idPausa', $idPausa);

        return $this->db->execute();
    }
}