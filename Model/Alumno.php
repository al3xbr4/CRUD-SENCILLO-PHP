<?php
/**
 * Clase Alumno
 * 
 * Esta clase representa a un alumno y contiene métodos para gestionar su información en la base de datos.
 */
class Alumno
{
    private $id;
    private $nombres;
    private $apellidos;
    private $estado;

    /**
     * Constructor de la clase Alumno.
     *
     * @param int    $id        ID del alumno.
     * @param string $nombres   Nombres del alumno.
     * @param string $apellidos Apellidos del alumno.
     * @param int    $estado    Estado del alumno (1 para activo, 0 para inactivo).
     */
    public function __construct($id, $nombres, $apellidos, $estado)
    {
        $this->setId($id);
        $this->setNombres($nombres);
        $this->setApellidos($apellidos);
        $this->setEstado($estado);
    }

    /**
     * Obtiene el ID del alumno.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Establece el ID del alumno.
     *
     * @param int $id ID del alumno.
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Obtiene los nombres del alumno.
     *
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Establece los nombres del alumno.
     *
     * @param string $nombres Nombres del alumno.
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    /**
     * Obtiene los apellidos del alumno.
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Establece los apellidos del alumno.
     *
     * @param string $apellidos Apellidos del alumno.
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * Obtiene el estado del alumno.
     *
     * @return int
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Establece el estado del alumno.
     *
     * @param mixed $estado Estado del alumno (1 para activo, 0 para inactivo).
     */
    public function setEstado($estado)
    {
        // Simplificamos la lógica del estado
        $this->estado = ($estado === 'on' || $estado === 1) ? 1 : 0;
    }

    /**
     * Guarda un alumno en la base de datos.
     *
     * @param Alumno $alumno Objeto Alumno a guardar.
     */
    public static function save($alumno)
    {
        $db = Db::getConnect();
        $insert = $db->prepare('INSERT INTO alumno VALUES (NULL, :nombres, :apellidos, :estado)');
        $insert->bindValue('nombres', $alumno->getNombres());
        $insert->bindValue('apellidos', $alumno->getApellidos());
        $insert->bindValue('estado', $alumno->getEstado());
        $insert->execute();
    }

    /**
     * Obtiene todos los alumnos de la base de datos.
     *
     * @return Alumno[]
     */
    public static function all()
    {
        $db = Db::getConnect();
        $listaAlumnos = [];

        $select = $db->query('SELECT * FROM alumno ORDER BY id');

        foreach ($select->fetchAll() as $alumno) {
            $listaAlumnos[] = new Alumno($alumno['id'], $alumno['nombres'], $alumno['apellidos'], $alumno['estado']);
        }
        return $listaAlumnos;
    }

    /**
     * Busca un alumno por su ID.
     *
     * @param int $id ID del alumno a buscar.
     * @return Alumno
     */
    public static function searchById($id)
    {
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM alumno WHERE id = :id');
        $select->bindValue('id', $id);
        $select->execute();

        $alumnoDb = $select->fetch();
        return new Alumno($alumnoDb['id'], $alumnoDb['nombres'], $alumnoDb['apellidos'], $alumnoDb['estado']);
    }

    /**
     * Actualiza un alumno en la base de datos.
     *
     * @param Alumno $alumno Objeto Alumno a actualizar.
     */
    public static function update($alumno)
    {
        $db = Db::getConnect();
        $update = $db->prepare('UPDATE alumno SET nombres = :nombres, apellidos = :apellidos, estado = :estado WHERE id = :id');
        $update->bindValue('nombres', $alumno->getNombres());
        $update->bindValue('apellidos', $alumno->getApellidos());
        $update->bindValue('estado', $alumno->getEstado());
        $update->bindValue('id', $alumno->getId());
        $update->execute();
    }

    /**
     * Elimina un alumno de la base de datos.
     *
     * @param int $id ID del alumno a eliminar.
     */
    public static function delete($id)
    {
        $db = Db::getConnect();
        $delete = $db->prepare('DELETE FROM alumno WHERE id = :id');
        $delete->bindValue('id', $id);
        $delete->execute();
    }
}