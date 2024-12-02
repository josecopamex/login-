<?php
include 'conexion_libreria.php'; // Conexión a la base de datos

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obtener los datos del libro
    $sql = "SELECT * FROM libros WHERE id = $id";
    $result = mysqli_query($cont, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $libro = mysqli_fetch_assoc($result);
    } else {
        echo "El libro con ID $id no existe.";
        exit;
    }
} else {







}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $año = $_POST['año'];
    $genero = $_POST['genero'];

    // Consulta para actualizar los datos
    $sql = "UPDATE libros 
            SET titulo = '$titulo', autor = '$autor', año = $año, genero = '$genero' 
            WHERE id = $id";

    if (mysqli_query($cont, $sql)) {
        // Redirigir al archivo principal después de actualizar
        header('Location: hola.php');
        exit;
    } else {
        echo "Error al actualizar el libro: " . mysqli_error($cont);
    }
}
?>

<div  class="container" >
<form action="actualizar.php" method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($libro['id']); ?>">
    
    <label for="titulo">Título:</label>
    
        <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($libro['titulo']); ?>" required>
    
    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="autor" value="<?php echo htmlspecialchars($libro['autor']); ?>" required>
    
    <label for="año">Año:</label>
    <input type="number" id="año" name="año" value="<?php echo htmlspecialchars($libro['año']); ?>" required>
    
    <label for="genero">Género:</label>
    <input type="text" id="genero" name="genero" value="<?php echo htmlspecialchars($libro['genero']); ?>" required>
    
    <input type="submit" value="Actualizar">
</form>
</div>