<?php

/**
 * Description of modeloEmpleados
 *
 * @author Usuario
 */
class modeloEmpleados {
    
    
    public function __construct(){
        $this->db = new Base;
    }
    
    public function obtenerEmpleados(){
        $this->db->query('SELECT *,personas.idPersona as idPersona,
        count(distinct(personas.idPersona)) as Empleados,
        sum(if(tp.fechaTarea=CURDATE(),1,0)) as TareasHoy,
        sum(if(tp.fechaTarea=CURDATE() and tp.finTarea is not null,1,0)) as TareasTerminadasHoy,
        count(distinct(tp.idTareaPersona)) as TareasTotal,
        sum(if(tp.finTarea is not null,1,0)) as TareasTerminadasTotal 
        FROM personas
        LEFT JOIN centros c on c.idCentro= personas.idCentroPersona
        LEFT JOIN roles r on r.idRol= personas.idRolPersona
        LEFT JOIN tareas_persona tp on tp.idPersona=personas.idPersona               
        where idRolPersona=3  GROUP BY personas.idPersona');

        $resultado = $this->db->registros();

        return $resultado;
    }

    public function obtenerEmpleado($id){
        $this->db->query('SELECT *,personas.idPersona as idPersona,
        count(distinct(personas.idPersona)) as Empleados,
        sum(if(tp.fechaTarea=CURDATE(),1,0)) as TareasHoy,
        sum(if(tp.fechaTarea=CURDATE() and tp.finTarea is not null,1,0)) as TareasTerminadasHoy,
        count(distinct(tp.idTareaPersona)) as TareasTotal,
        sum(if(tp.finTarea is not null,1,0)) as TareasTerminadasTotal 
        FROM personas
        LEFT JOIN centros c on c.idCentro= personas.idCentroPersona
        LEFT JOIN roles r on r.idRol= personas.idRolPersona
        LEFT JOIN tareas_persona tp on tp.idPersona=personas.idPersona               
        where idRolPersona=3 and personas.idPersona='.$id);

        $resultado = $this->db->registro();

        return $resultado;
    }

    public function obtenerEmpleadosCentro($idCentro){
        $this->db->query('SELECT *,personas.idPersona as idPersona,
        count(distinct(personas.idPersona)) as Empleados,
        sum(if(tp.fechaTarea=CURDATE(),1,0)) as TareasHoy,
        sum(if(tp.fechaTarea=CURDATE() and tp.finTarea is not null,1,0)) as TareasTerminadasHoy,
        count(distinct(tp.idTareaPersona)) as TareasTotal,
        sum(if(tp.finTarea is not null,1,0)) as TareasTerminadasTotal 
        FROM personas
        LEFT JOIN centros c on c.idCentro= personas.idCentroPersona
        LEFT JOIN roles r on r.idRol= personas.idRolPersona
        LEFT JOIN tareas_persona tp on tp.idPersona=personas.idPersona               
        where idRolPersona=3 and idCentroPersona='.$idCentro.' GROUP BY personas.idPersona');

        $resultado = $this->db->registros();

        return $resultado;
    }
    
    
    
}
