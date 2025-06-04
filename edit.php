/**
 * Página de Editar Proyecto
 * 
 * Este archivo maneja la funcionalidad para editar proyectos existentes en el portafolio.
 * Características:
 * - Formulario prellenado con datos del proyecto
 * - Actualización de información en la base de datos
 * - Manejo opcional de actualización de imágenes
 * - Validación de campos requeridos
 * - Diseño responsivo usando Tailwind CSS
 * 
 * @author Marcos Castro
 * @version 1.0
 */

<?php
include 'auth.php';
include 'db.php';
include 'header.php';

$id = $_GET['id'];
$proyecto = $conn->query("SELECT * FROM proyectos WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $url_github = $_POST['url_github'];
  $url_produccion = $_POST['url_produccion'];

  if ($_FILES['imagen']['name']) {
    $imagen = $_FILES['imagen']['name'];
    move_uploaded_file($_FILES['imagen']['tmp_name'], "uploads/$imagen");
    $img_sql = ", imagen='$imagen'";
  } else {
    $img_sql = "";
  }

  $sql = "UPDATE proyectos SET titulo='$titulo', descripcion='$descripcion', url_github='$url_github', url_produccion='$url_produccion' $img_sql WHERE id=$id";
  $conn->query($sql);
  header("Location: index.php");
}
?>

<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-white">Editar Proyecto</h1>
    
    <form method="post" enctype="multipart/form-data" class="space-y-6 bg-gray-800 p-6 rounded-lg shadow-lg">
        <div>
            <label for="titulo" class="block text-sm font-medium text-gray-300 mb-2">Título del Proyecto</label>
            <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($proyecto['titulo']) ?>" required
                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
        </div>

        <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-300 mb-2">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="4"
                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"><?= htmlspecialchars($proyecto['descripcion']) ?></textarea>
        </div>

        <div>
            <label for="url_github" class="block text-sm font-medium text-gray-300 mb-2">URL de GitHub</label>
            <input type="url" id="url_github" name="url_github" value="<?= htmlspecialchars($proyecto['url_github']) ?>"
                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
        </div>

        <div>
            <label for="url_produccion" class="block text-sm font-medium text-gray-300 mb-2">URL de Producción</label>
            <input type="url" id="url_produccion" name="url_produccion" value="<?= htmlspecialchars($proyecto['url_produccion']) ?>"
                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
        </div>

        <div>
            <label for="imagen" class="block text-sm font-medium text-gray-300 mb-2">Imagen del Proyecto</label>
            <input type="file" id="imagen" name="imagen"
                class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            <?php if($proyecto['imagen']): ?>
                <p class="mt-2 text-sm text-gray-400">Imagen actual: <?= htmlspecialchars($proyecto['imagen']) ?></p>
            <?php endif; ?>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="index.php" class="px-6 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition duration-150 ease-in-out">
                Cancelar
            </a>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-150 ease-in-out">
                Actualizar Proyecto
            </button>
        </div>
    </form>
</div>

<?php include 'footer.php'; ?>