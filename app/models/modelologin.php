<?php

class modeloLogin
{

    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }


    public function comprobarLogin($mail, $pass)
    {

        $this->db->query('SELECT * FROM usuarios WHERE mail = :mail AND password = :pass');
        $this->db->bind(':mail', $mail);
        $this->db->bind(':pass', $pass);

        $fila = $this->db->registro();

        return $fila;

        if (in_array($mail, $fila) && in_array($pass, $fila)) {
            return $fila[2];
        } else {
            return 0;
        }
    }

    public function obtenerUsuarioMail($mail)
    {
        $this->db->query('SELECT 
        usu.idUsuario as idUsuario,
        usu.nombreUsuario as nombreUsuario,
        usu.emailUsuario as emailUsuario,
        usu.idRolUsuario as idRolUsuario,
        usu.password as pass,
        rol.nombreRol as rolUsuario,
        rol.colorRol as rolColor,
        rol.nivelAccesoRol as nivelAccesoRol
        FROM usuarios usu 
        LEFT JOIN roles rol ON usu.idRolUsuario = rol.idRol 
        WHERE emailUsuario = :emailUsuario;');
        $this->db->bind(':emailUsuario', $mail);
        $fila = $this->db->registro();
        return $fila;
    }

    public function comprobarEmail($mail)
    {
        $this->db->query(" SELECT * FROM usuarios WHERE emailUsuario='$mail'");
        $resultado = $this->db->registro();
        $resultado == false ? $resultado = 1 : $resultado = 0;
        return $resultado;
    }


    public function registroNuevoUsuario($nuevoRegistro)
    {
        if ($nuevoRegistro['selectTipoAlimento'] != 0) {
            switch ($nuevoRegistro['selectTipoAlimento']) {
                case 1:
                    $this->db->query("SELECT * FROM alimento_defecto");
                    $arrayAlimentos = $this->db->registros();
                    break;
                case 2:
                    $this->db->query("SELECT * FROM alimento_defecto WHERE tipo=2");
                    $arrayAlimentos = $this->db->registros();
                    break;
                case 3:
                    $this->db->query("SELECT * FROM alimento_defecto WHERE tipo IN(2,4)");
                    $arrayAlimentos = $this->db->registros();
                    break;
                case 4:
                    $this->db->query("SELECT * FROM alimento_defecto WHERE tipo IN(1,2)");
                    $arrayAlimentos = $this->db->registros();
                    break;
            }
        } else {
            $this->db->query("SELECT * FROM alimento_defecto ");
            $arrayAlimentos = $this->db->registros();
        }

        $this->db->query('INSERT INTO usuarios (nombreUsuario, emailUsuario, password,ciudad,idRolUsuario)
        VALUES ("' . $nuevoRegistro["nombreNuevo"] . '", "' . $nuevoRegistro["mailNuevo"] . '", "' . password_hash($nuevoRegistro["passNuevo"], PASSWORD_DEFAULT) . '","' . $nuevoRegistro['direccionNuevo'] . '",1)');
        $resultado = $this->db->execute() == true ? 1 : 0;
        $lastId = $this->db->lastInsertId();

        for ($i = 0; $i < count($arrayAlimentos); $i++) {
            $this->db->query('INSERT INTO alimento (nombre, tipo, unidad_medida,idUsuario)
            VALUES ("' . $arrayAlimentos[$i]->nombre . '", "' . $arrayAlimentos[$i]->tipo . '", "' . $arrayAlimentos[$i]->unidad_medida . '","' . $lastId . '")');
            $this->db->execute();
        }


        return $resultado;
    }
}
