# CRUD Básico con PHP
Este es un proyecto básico de CRUD (Crear, Leer, Actualizar, Eliminar) utilizando PHP y MySQL. Este README proporciona instrucciones paso a paso para configurar y ejecutar el proyecto.
## Tabla de Contenidos
- Requisitos
- Configuración
- Ejecución del Proyecto
- Documentación
- Contacto
  
## Requisitos
Antes de comenzar, asegúrate de tener instalado lo siguiente:
  - PHP 7.x o superior
  - MySQL Server
  - XAMPP o cualquier otro servidor web compatible con PHP y MySQL
  
## Configuración
### 1. Clonar el Repositorio
Clona este repositorio en tu máquina local usando Git:
- git clone https://github.com/al3xbr4/CRUD-SENCILLO-PHP.git
- cd CRUD-SENCILLO-PHP

### 2. Crear la Base de Datos
- Crea una base de datos en tu servidor MySQL. Puedes hacerlo usando phpMyAdmin o la línea de comandos:
- CREATE DATABASE crud_db;

### 3. Configurar la Conexión a la Base de Datos
Edita el archivo connection.php para que coincida con tus credenciales de MySQL.
- Asegúrate de cambiar los valores de $servername, $username, $password y $dbname según sea necesario:
```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
````
### 4. Ejecutar las Consultas SQL
Importa el archivo Crud-Mysql-php.sql en tu base de datos recién creada.
- Esto creará las tablas necesarias para el proyecto.
Puedes hacerlo usando phpMyAdmin o la línea de comandos:
````
SOURCE /ruta/a/Crud-Mysql-php.sql;
````
## Ejecución del Proyecto
Una vez que hayas completado la configuración, puedes ejecutar el proyecto.
Coloca los archivos del proyecto dentro de la carpeta htdocs de XAMPP. Luego, abre tu navegador y navega a:

http://localhost/nombre-de-tu-carpeta/

## Documentación

###  Guía de Usuario
La guía de usuario está disponible en formato PDF y se llama "Documentación de Usuario: Aplicación Web de Registro de Alumnos" . 
- Puedes acceder a ella desde el menú principal de la aplicación o descargándola directamente desde el repositorio.

###  Guía Técnica
La documentación técnica está disponible en formato HTML.
- Para acceder a ella, abre el archivo index.html ubicado en la carpeta docs con cualquier navegador web.

## Contacto
- Si tienes alguna pregunta o problema, no dudes en contactarme:
  - Nombre: Alex Bordón Rosa
  - Email: alexbordonrosa@gmail.com
