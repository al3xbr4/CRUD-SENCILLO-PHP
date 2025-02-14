<?php
/**
 * Clase UsuarioController
 * 
 * Esta clase maneja las acciones relacionadas con los alumnos (CRUD).
 */
class UsuarioController
{
    /**
     * Muestra la página de bienvenida.
     */
    public function index()
    {
        require_once 'Views/Alumno/bienvenido.php';
    }

    /**
     * Muestra el formulario de registro de un alumno.
     */
    public function register()
    {
        require_once 'Views/Alumno/register.php';
    }

    /**
     * Guarda un alumno en la base de datos.
     */
    public function save()
    {
        $estado = isset($_POST['estado']) ? 'on' : 'of';
        $alumno = new Alumno(null, $_POST['nombres'], $_POST['apellidos'], $estado);
        Alumno::save($alumno);
        $this->show();
    }

    /**
     * Muestra la lista de alumnos.
     */
    public function show()
    {
        $listaAlumnos = Alumno::all();
        require_once 'Views/Alumno/show.php';
    }

    /**
     * Muestra el formulario de actualización de un alumno.
     */
    public function updateshow()
    {
        $id = $_GET['idAlumno'];
        $alumno = Alumno::searchById($id);
        require_once 'Views/Alumno/updateshow.php';
    }

    /**
     * Actualiza un alumno en la base de datos.
     */
    public function update()
    {
        $alumno = new Alumno($_POST['id'], $_POST['nombres'], $_POST['apellidos'], $_POST['estado']);
        Alumno::update($alumno);
        $this->show();
    }

    /**
     * Elimina un alumno de la base de datos.
     */
    public function delete()
    {
        $id = $_GET['id'];
        Alumno::delete($id);
        $this->show();
    }

    /**
     * Busca un alumno por su ID.
     */
    public function search()
    {
        if (!empty($_POST['id'])) {
            $id = $_POST['id'];
            $alumno = Alumno::searchById($id);
            if ($alumno) {
                $listaAlumnos = [$alumno];
            } else {
                $listaAlumnos = [];
                echo "<script>alert('Alumno no encontrado');</script>";
            }
        } else {
            $listaAlumnos = Alumno::all();
        }
        require_once 'Views/Alumno/show.php';
    }

    /**
     * Muestra la página de error.
     */
    public function error()
    {
        require_once 'Views/Alumno/error.php';
    }
}