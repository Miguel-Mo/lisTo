<?php
/**Recetas
 * Clase de retas que nos sirve como CRUD de recetas, como para cargar las recetas en pantalla
 */
class Recetas extends Controlador
{
        /**
     * Constructor que nos carga el modelo bbdd y el modeloRecetas
     * para poder llamarlo durante la clase, también hace un session start 
     * inicializando los valores de session
     */
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->modeloRecetas = $this->modelo('modeloRecetas');
        $this->modeloUsuarios = $this->modelo('modeloUsuarios');
        $this->modeloBBDD = $this->modelo('modeloBBDD');
        $this->modeloAlimentos = $this->modelo('modeloAlimentos');
    }

        /**
     * Index
     * Nos cargala vista de recetas
     */
    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $datos = [];
        $this->vista('recetas/recetas', $datos);
    }


/**addNuevoReceta
 * metodo para añadir nueva receta
 * tengo que hacer un for en mitad para insertar los alimentos uno por uno en la tabla intermedia
 * alimentos recetas
 */
    public function addNuevoReceta()
    {
        $idReceta = $this->modeloRecetas->insertNuevaReceta($_POST);

        for ($i = 0; $i < count($_POST['ingredienteReceta']); $i++) {
            $this->modeloRecetas->insertAlimentoReceta($_POST['ingredienteReceta'][$i], $_POST['cantidadReceta'][$i], $_POST['unidadMedidaReceta'][$i], $idReceta);
        }
        redireccionar('/Recetas');
    }

    /**editNuevoReceta
     * metodo para editar una receta. primero updateo la informacion de la receta luego elimino los alimentos
     * de la tabla intermedia
     * luego vuelvo a hacer un for para insertar los alimentos uno a uno
     */
    public function editNuevoReceta()
    {
        $this->modeloRecetas->updateReceta($_POST);
        $this->modeloRecetas->eliminarAlimentosReceta($_POST['idRecetaEdit']);

        for ($i = 0; $i < count($_POST['ingredienteReceta']); $i++) {
            $this->modeloRecetas->insertAlimentoReceta($_POST['ingredienteReceta'][$i], $_POST['cantidadReceta'][$i], $_POST['unidadMedidaReceta'][$i], $_POST['idRecetaEdit']);
        }
        redireccionar('/Recetas');
    }

    /**obtenerTodasRecetas
     * Metodo para obetenr las recetas y cargarlas en pantalla
     */
    public function obtenerTodasRecetas()
    {
        $resultado = $this->modeloRecetas->obtenerTodasRecetas();
        echo json_encode($resultado);
    }

    /**obtenerAlimentosRecetas
     * Metodo para obtener los alimentos y cargarlos en las recetas
     */
    public function obtenerAlimentosRecetas()
    {
        $idReceta = $_POST['idReceta'];
        $resultado = $this->modeloRecetas->obtenerAlimentosRecetas($idReceta);
        echo json_encode($resultado);
    }


    /**eliminarReceta
     * Metodo para eliminar recetas
     */
    public function eliminarReceta()
    {
        $resultado = $this->modeloRecetas->eliminarRecetaById($_POST['id']);
        echo $resultado;
    }

    /**obtenerFiltroRecetas
     * Metodo para obtener recetas filtradas despues de utilizar el buscador
     */
    public function obtenerFiltroRecetas()
    {
        $resultado = $this->modeloRecetas->obtenerRecetasFiltro($_POST);
        echo json_encode($resultado);
    }

    /**obtenerRecetaIndividual
     * Aqui obtengo una receta individual para editarla
     * hago una ñapa para el tiempo, debido a que no tengo creado en la bbdd una tabla de tiempos, posiblemente
     * en el futuro deba crearla
     * por otro lado obtengo laa receta y los alimentos y formo un array asociativa para enviarselo al js y que este lo trabaje
     */
    public function obtenerRecetaIndividual()
    {
        $receta = $this->modeloRecetas->obtenerRecetaIndividual($_POST['id']);
        if($receta->tiempo=="15 minutos"){
            $receta->tiempo=1;
        }else if($receta->tiempo=="30 minutos"){
            $receta->tiempo=2;
        }else if($receta->tiempo=="45 minutos"){
            $receta->tiempo=3;
        }else if($receta->tiempo=="1 hora"){
            $receta->tiempo=4;
        }else if($receta->tiempo=="1 hora y media"){
            $receta->tiempo=5;
        }else if($receta->tiempo=="2 horas"){
            $receta->tiempo=6;
        };
        $alimentos=$this->modeloRecetas->obtenerAlimentosRecetasEditar($_POST['id']);
        $resultado=[
            'receta'=>$receta,
            'alimentos'=>$alimentos
        ];
        echo json_encode($resultado);

    }
}
