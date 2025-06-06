/**
 * Pie de Página del Sitio
 * 
 * Este archivo contiene el pie de página común para todas las páginas del sitio.
 * Características:
 * - Muestra el copyright con el año actual
 * - Diseño responsivo usando Tailwind CSS
 * - Cierra las etiquetas HTML del documento
 * 
 * @author Marcos Castro
 * @version 1.0
 */

    <footer class="bg-gray-800 border-t border-gray-700 mt-12">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-400 text-sm">
                &copy; <?php echo date('Y'); ?> Mi Portafolio. Todos los derechos reservados.
            </p>
        </div>
    </footer>
</body>
</html> 