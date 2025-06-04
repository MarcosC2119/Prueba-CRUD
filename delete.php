/**
 * Eliminación de Proyecto
 * 
 * Este archivo maneja la funcionalidad para eliminar proyectos del portafolio.
 * Características:
 * - Eliminación de proyectos por ID
 * - Redirección automática al inicio
 * - Verificación de autenticación
 * 
 * @author Marcos Castro
 * @version 1.0
 */

<?php
include 'auth.php';
include 'db.php';
$id = $_GET['id'];

$conn->query("DELETE FROM proyectos WHERE id=$id");
header("Location: index.php");
?>