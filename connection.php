<?php
/**
 * Clase Db
 * 
 * Esta clase maneja la conexión a la base de datos usando el patrón Singleton.
 */
class Db
{
    private static $instance = null;

    /**
     * Constructor privado para evitar instanciación directa.
     */
    private function __construct() {}

    /**
     * Obtiene la instancia única de la conexión a la base de datos.
     *
     * @return PDO
     */
    public static function getConnect()
    {
        if (!isset(self::$instance)) {
            try {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                self::$instance = new PDO('mysql:host=localhost;dbname=cphpmysql', 'root', '', $pdo_options);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}