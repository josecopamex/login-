<?php
include 'conexion_libreria.php'; // Incluimos la conexión a la base de datos

if (isset($_GET['id'])) {
    // Obtenemos el ID desde el parámetro GET y lo validamos
    $id = intval($_GET['id']); // Convertimos el ID a un entero para evitar inyección SQL

    // Preparamos la consulta SQL para eliminar el registro
    $sql = "DELETE FROM libros WHERE id = ?";
    $stmt = $cont->prepare($sql);

    if ($stmt) {
        // Vinculamos el parámetro y ejecutamos la consulta
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Redirigimos al usuario después de eliminar el registro
            header('Location: hola.php');
            exit(); // Finalizamos el script después de la redirección
        } else {
            echo "Error al eliminar el libro: " . $stmt->error;
        }

        $stmt->close(); // Cerramos la declaración preparada
    } else {
        echo "Error al preparar la consulta: " . $cont->error;
    }
} else {
    echo "ID no válido o no especificado.";
}

$cont->close(); // Cerramos la conexión a la base de datos
?>


