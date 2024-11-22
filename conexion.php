<?php
// Configuración de conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$database = "usuarios";

// Crear conexión
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Validar si se enviaron los datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];

    // Validar que las contraseñas coincidan
    if ($contrasena !== $confirmar_contrasena) {
        echo "Las contraseñas no coinciden.";
        exit;
    }

    // Encriptar contraseña
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO registro (nombre, usuario, email, telefono, contrasena) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $usuario, $email, $telefono, $contrasena_encriptada);

    if ($stmt->execute()) {
        // Redirigir al formulario de registro con un parámetro de éxito
        header("Location: hola.html");
        exit; // Detener la ejecución del código para evitar que se ejecute más código
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Cerrar conexión
$conn->close();
?>
