<?php

class modeloBBDD
{
    private $db;

    public function __construct()
    {
        $this->db = new Base();
    }

    public function insertBBDD($datos, $tabla, $pk = '', $where = '')
    {
        return $this->db->montarInsert($datos, $tabla, $pk = '', $where = '');
    }

    public function updateBBDD($datos, $tabla, $pk, $where = '')
    {
        if ($where != '') {
            return $this->db->montarUpdate($datos, $tabla, $pk, $where);
        }
    }

    public function deleteBBDD($tabla, $pk, $where)
    {
        if ($where != '') {
            return $this->db->montarDelete($tabla, $pk, $where);
        }
    }
}
