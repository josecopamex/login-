
<?php

include 'conexion_libreria.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $año = $_POST['año'];
    $genero = $_POST['genero'];

    // Preparar la consulta

    echo $titulo ;
    $sql = "INSERT INTO libros (titulo, autor, año, genero) VALUES (?, ?, ?, ?)";
    $stmt = $cont->prepare($sql);  // Usamos la conexión MySQLi ($cont)
    $stmt->bind_param("ssss", $titulo, $autor, $año, $genero); // 'ssss' indica que son 4 valores de tipo string

    if ($stmt->execute()) {
        header('Location: hola.php'); // Redirige a la página después de la inserción
    } else {
        echo "Error al agregar el libro.";
    }
}
?>
