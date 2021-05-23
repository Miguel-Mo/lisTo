<?php

/**
 * Description of modeloEmpleados
 *
 * @author Usuario
 */
class modeloListas {
    
    
    public function __construct(){
        $this->db = new Base;
    }


    public function insertRecetasToListaTemporal($idReceta){
        $this->db->query('INSERT INTO lista_temporal (idReceta,idUsuario)
        VALUES (' . $idReceta . ','. $_SESSION['idUsuario'] . ')');
        $this->db->execute();
    }    

    public function traerListaTemporal(){
        $this->db->query('SELECT lt.*,r.nombre FROM lista_temporal lt
        LEFT JOIN receta r ON lt.idReceta=r.id
        where lt.idUsuario='. $_SESSION['idUsuario'] );
        $resultado = $this->db->registros();
        return $resultado;
    }  

    public function eliminarItemRecetasListaTemporal($idReceta){
        $this->db->query('DELETE FROM lista_temporal where idUsuario='. $_SESSION['idUsuario'].' AND id='.$idReceta);
        $this->db->execute();
    }

    public function obtenerAlimentosDesdeTemporal($idListaTemporal){
        $this->db->query('SELECT a.nombre,ra.idAlimento,SUM(ra.cantidad) as cantidad,um.id as unidadMedida,um.descripcion FROM lista_temporal lt
        LEFT JOIN receta r ON lt.idReceta=r.id
        LEFT JOIN receta_alimento ra ON r.id=ra.idReceta
        LEFT JOIN alimento a ON ra.idAlimento=a.id 
        LEFT JOIN unidad_medida um on ra.idUnidadMedida=um.id
        where lt.idUsuario='. $_SESSION['idUsuario'] .' 
        GROUP BY ra.idAlimento, ra.idUnidadMedida');
        $resultado = $this->db->registros();
        return $resultado;
    }

    public function insertNuevaLista($arrayAlimentos){
        $jsonArray=json_encode($arrayAlimentos);
        $idUsuario=$_SESSION['idUsuario'];
        $this->db->query("INSERT INTO lista (alimentosJSON,idUsuario)
        VALUES ( '$jsonArray' , $idUsuario )");
        $this->db->execute();
    }   

    public function eliminarListaTemporalUsuario(){
        $this->db->query('DELETE FROM lista_temporal where idUsuario='. $_SESSION['idUsuario']);
        $this->db->execute();
    }

    public function obtenerTodasListas(){
        $this->db->query('SELECT * FROM lista l  
        WHERE  idUsuario=' . $_SESSION['idUsuario']);
        $resultado = $this->db->registros();
        for ($i=0; $i < count($resultado); $i++) { 
            $resultado[$i]->alimentosJSON=json_decode($resultado[$i]->alimentosJSON);
        }
        
        return $resultado;
    }

    public function principalLista($id){
        $this->db->query('UPDATE lista SET activo=0');
        $this->db->execute();
        $this->db->query('UPDATE lista SET activo=1 WHERE id='.$id);
        $this->db->execute();
    }

    public function eliminarListaById($id){
        $this->db->query('DELETE FROM lista WHERE id='.$id);
        $resultado = $this->db->execute()==true?1:0;
        return $resultado;
    }
}
