<?php

    class Cliente Extends Controller {

        function __construct() {

            parent ::__construct();
            
            
        }

        function render() {

            # Creo la propiedad title de la vista
            $this->view->title = "Home - Panel Control Clientes";
            
            # Creo la propiedad alumnos dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->clientes = $this->model->get();

            $this->view->render('cliente/main/index');
        }

        function new() {

            # etiqueta title de la vista
            $this->view->title = "Añadir - Gestión Clientes";

            #  obtener los cursos  para generar dinámicamente lista cursos
            // $this->view->cursos = $this->model->getCursos();

            # cargo la vista con el formulario nuevo alumno
            $this->view->render('cliente/new/index');
        }

        function create ($param = []) {
            
            # Cargamos los datos del formulario
            $cliente = new classCliente(
                null,
                $_POST['nombre'],
                $_POST['apellidos'],
                $_POST['email'],
                $_POST['telefono'],
                $_POST['ciudad'],
                $_POST['dni']
            );

            # Validación

            # Añadir registro a la tabla
            $this->model->create($cliente);

            # Redirigimos al main de alumnos
            header('location:'.URL.'cliente');
        }

        function edit($param = []) {

            # obtengo el id del alumno que voy a editar
            // alumno/edit/4

            $id = $param[0];

            # asigno id a una propiedad de la vista
            $this->view->id = $id;

            # title
            $this->view->title = "Editar - Panel de control Clientes";

            # obtener objeto de la clase alumno
            $this->view->cliente = $this->model->read($id);

            # obtener los cursos
            // $this->view->cursos = $this->model->getCursos();

            # cargo la vista
            $this->view->render('cliente/edit/index');

        }

        function delete($param){

            $this->view->id = $param[0];

            $this->view->delete = $this->model->delete($this->view->id);

            header('location: ' . URL . 'cliente');

        }

        function show($param){

            $this->view->id = $param[0];

            $this->view->title = "Mostrar - Datos del Cliente";

            $this->view->cliente = $this->model->read($this->view->id);

            $this->view->render('cliente/show/index');
 

        }

        public function update($param = []) {

            # Cargo id del alumno
            $id = $param[0];

            # Con los detalles formulario creo objeto alumno
            $cliente = new classCliente (

                null,
                $_POST['nombre'],
                $_POST['apellidos'],
                $_POST['email'],
                $_POST['telefono'],
                $_POST['ciudad'],
                $_POST['dni']

            );

            # Actualizo base  de datos
            $this->model->update($cliente, $id);

            # Cargo el controlador principal de alumno
            header('location:'. URL.'cliente');

        }

        public function order($param = []) {

            # Obtengo criterio de ordenación
            $criterio = $param[0];

            # Creo la propiedad title de la vista
            $this->view->title = "Ordenar - Panel Control Clientes";
            
            # Creo la propiedad alumnos dentro de la vista
            # Del modelo asignado al controlador ejecuto el método get();
            $this->view->clientes = $this->model->order($criterio);

            # Cargo la vista principal de alumno
            $this->view->render('cliente/main/index');
        }

        public function filter($param = []) {

            # Obtengo expresión de búsqueda
            $expresion = $_GET['expresion'];

            # Creo la propiedad title de la vista
            $this->view->title = "Buscar - Panel Control Clientes";
            
            # Filtro a partir de la  expresión
            $this->view->clientes = $this->model->filter($expresion);

            # Cargo la vista principal de alumno
            $this->view->render('cliente/main/index');
        }
    }

?>