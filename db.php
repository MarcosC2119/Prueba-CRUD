/**
 * Configuración de Conexión a la Base de Datos
 * 
 * Este archivo establece la conexión a la base de datos MySQL.
 * Contiene las credenciales de la base de datos y crea un objeto de conexión mysqli.
 * 
 * @author Marcos Castro
 * @version 1.0
 */

<?php
$host = "localhost";
$db = "marcos_castro_db1";
$user = "marcos_castro";
$pass = "marcos_castro2025";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}
?>