<?php
// clase para conectara la base de datos y ejecutar consultas PDO
class Base
{

    private $host = DB_HOST;
    private $usuario = DB_USUARIO;
    private $password = DB_PASSWORD;
    private $db = DB_NOMBRE;


    private $dbh; // database handler
    private $stmt; // statement
    private $error;

    public function __construct()
    {
        // configurar la conexion
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db.';charset=UTF8';
        $opciones = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // crear una instancia de PDO
        try {
            $this->dbh = new PDO($dsn, $this->usuario, $this->password, $opciones);
            $this->dbh->exec('set names utf8');
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }


    // Preparamos la consulta
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }
    // Vinculamos la consulta con bind
    public function bind($parametro, $valor, $tipo = null)
    {

        if (is_null($tipo)) {
            switch (true) {
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                    break;
                default:
                    $tipo = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($parametro, $valor, $tipo);
    }

    // Ejecuta la consulta
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Obtener los registros de la consulta
    public function registros()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    // Obtener un solo registro de la consulta
    public function registro()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Obtener cantidad de filas con el metodo rowCount
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    // Obtener estructura para insert
    public function montarInsert($datos,$tabla,$pk='',$where='')
    {   
        $insert=[];
        foreach($datos as $key=>$valor)
        {
            if($key!=$pk && $valor!=''){
                $insert['campos'][]=$key;
                $insert['valores'][]="'".$valor."'";
            }
        } 
        $campos=implode(",",$insert['campos']);
        $valores=implode(",",$insert['valores']);
        $sql="INSERT INTO ".$tabla." (".$campos.") VALUES (".$valores.") ".$where;
        $this->stmt = $this->dbh->prepare($sql);
        $this->stmt->execute();
        return $this->dbh->lastInsertId();
    }
    
    // Obtener estructura para delete
    public function montarDelete($tabla,$pk,$where)
    {
        $sql="DELETE FROM ".$tabla." ".$where;
        $this->stmt = $this->dbh->prepare($sql);
         if($this->stmt->execute()){
            return 1;
        }else{
            return 0;
        }
    }

    // Obtener estructura para update
    public function montarUpdate($datos,$tabla,$pk,$where)
    {   
        if($where!=''){
        $Set=[];
        foreach($datos as $key=>$valor)
        {
            if($key!=$pk){
                $Set[]=$key."='".$valor."'";
            }
        } 
        $valores=implode(",",$Set);
        $sql="UPDATE ".$tabla." SET ".$valores." ".$where;
        $this->stmt = $this->dbh->prepare($sql);
        return $this->stmt->execute();
        }else{
            return 'ES OBLIGATORIA UNA CONDICI??N PARA UPDATE';
        }
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}
