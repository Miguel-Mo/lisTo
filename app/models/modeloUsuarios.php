<?php


class modeloUsuarios{

    private $db;


    public function __construct(){
        $this->db = new Base;
    }


    public function obtenerUsuarios(){
        $this->db->query('SELECT * FROM usuarios
        LEFT JOIN roles r on r.idRol=usuarios.idRolUsuario');

        $resultado = $this->db->registros();

        return $resultado;
    }

    public function recuperarUsuarios()
    {
        $this->db->query('SELECT 
                                usuarios.*,
                                roles.nombre AS nombreRol 
                            FROM usuarios
                                LEFT JOIN roles ON usuarios.rol = roles.idRoles
                            ORDER BY usuarios.rol');

        return $this->db->registros();
    }


    public function agregarUsuario($datos){

        $this->db->query("INSERT INTO usuarios (nombreUsuario,emailUsuario,password,idRolUsuario) VALUES (:nombre, :mail,:password,:rol)");

        // vincular valores

        $this->db->bind(':nombre', $datos['nombreUsuario']);
        $this->db->bind(':mail', $datos['emailUsuario']);
        $this->db->bind(':password', $datos['password']);
        $this->db->bind(':rol', $datos['idRolUsuario']);

        //Ejecutar
        if($this->db->execute()){
            return $this->db->lastInsertId();
        } else {
            return false;
        }

    }

    public function nuevoUsuario($datos)
    {
        $query = 'INSERT INTO usuarios('.$datos['keys'].') VALUES ('.$datos['values'].')';

        // var_dump($query);
        $this->db->query($query);

        return $this->db->execute();
    }

    public function editarUsuario($id, $datos)
    {
        $query = 'UPDATE usuarios 
                        SET '.$datos.' 
                    WHERE idUsuario='.$id.'
                        AND idUsuario != 1';

        $this->db->query($query);
        return $this->db->execute();
    }

    public function obtenerUsuarioId($id){
        $this->db->query('SELECT * FROM usuarios WHERE idUsuario = :id');
        $this->db->bind(':id', $id);

        $fila = $this->db->registro();

        return $fila;
    }

    public function actualizarUsuario($datos){
        $this->db->query('UPDATE usuarios SET nombre = :nombre, mail = :mail, telefono = :telefono WHERE idUsuario = :id');
        $this->db->bind(':id', $datos['id_usuario']);
        $this->db->bind(':nombre', $datos['nombre']);
        $this->db->bind(':mail', $datos['mail']);
        $this->db->bind(':telefono', $datos['telefono']);

        //Ejecutar
        if($this->db->execute()){
            return true;

        }else {
            return false;
        }
    }

    public function borrarUsuario($datos){
        $this->db->query('DELETE FROM usuarios WHERE idUsuario = :id');
        $this->db->bind(':id', $datos['id_usuario']);


        //Ejecutar
        if($this->db->execute()){
            return true;

        }else {
            return false;
        }
    }

    public function borrarUsuarioById($id)
    {
        $this->db->query('DELETE FROM usuarios WHERE idUsuario = :id');
        $this->db->bind(':id', $id);


        //Ejecutar
        if($this->db->execute()){
            return true;

        }else {
            return false;
        }
    }

    public function obtenerUsuariosAsignadosAEvento($idEvento)
    {
        $this->db->query('SELECT 
                                usuarios.*,
                                roles.nombre AS nombreRol ,
                                roles.color AS colorRol
                            FROM eventosusuarios
                                LEFT JOIN usuarios ON eventosusuarios.idUsuario = usuarios.idUsuario 
                                LEFT JOIN roles ON usuarios.rol = roles.idRoles
                            WHERE eventosusuarios.idEvento='.$idEvento);

        return $this->db->registros();
    }

}