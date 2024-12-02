<?php
$inc = include("conexion_libreria.php"); // Asegúrate de que la ruta sea correcta

// Realizar la consulta
$sql = "SELECT * FROM libros";
$stmt = mysqli_query($cont, $sql); // Usamos la variable $cont correctamente

if (!$stmt) {
    die("Error en la consulta: " . $cont->error);
}
?>

<!-- Estilos internos aplicados a la tabla -->
<style>
 
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background: linear-gradient(130deg, rgb(0, 255, 26), skyblue);
}

.container{
    max-width: 700px;
    width: 100%;
    padding: 25px 30px;
    background-color: #fff;
    border-radius: 5px;
}

.container .title{
    font-size: 25px;
    font-weight: 500;
}

.container form{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 10px 12px 0;
}

form .form-group{ 
    margin-bottom: 15px; 
    width: calc(100% / 2 - 20px); 
}

form span{
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
}

.form-group input{
    height: 40px;
    width: 100%;
    outline: none;
    border-radius: 5px;
    border: 1px solid #ccc;
    padding-left: 15px;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
}

.form-group input:focus,
.form-group input:valid{
    border-color: skyblue;
}

form .button{
    width: 100%;
    height: 40px;
    margin: 40px 0;
}

form .button input{
    width: 100%;
    height: 100%;
    outline: none;
    cursor: pointer;
    background: linear-gradient(130deg, GREEN ,skyblue);
    color: #fff;
    font-size: 16px;
    font-weight: 500;
    border:none;
    border-radius: 5px;
}

form .button input:hover{
    background: linear-gradient(130deg,skyblue,blue);
}

@media(max-width: 584px){
    .container{
        max-width: 100%;
    }

    form .form-group{
        margin-bottom: 15px;
        width: 100%;
    }

    .container form {
        max-height: 300px;
        overflow-y: scroll;
    }

    .container form::-webkit-scrollbar{
        width: 0;
    }

    form .button{
        margin: 20px 0; 
    }
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 18px;
    text-align: left;
}

.styled-table thead tr {
    background-color: #00c851;
    color: white;
    font-weight: bold;
}

.styled-table th, .styled-table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
}

.styled-table tbody tr:nth-child(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:hover {
    background-color: #d1f0ff;
}

.styled-table tbody tr td a {
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 3px;
    font-size: 14px;
    color: #fff;
}

.styled-table tbody tr td a.edit-btn {
    background-color: #007bff; /* Azul */
}

.styled-table tbody tr td a.delete-btn {
    background-color: #ff3547; /* Rojo */
}

.styled-table tbody tr td a:hover {
    opacity: 0.8;
}
</style>

<!-- Tabla con clase personalizada -->
<table class="styled-table"  class="table-container"  >
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
            <th>Género</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($libro = $stmt->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $libro['id']; ?></td>
                <td><?php echo $libro['titulo']; ?></td>
                <td><?php echo $libro['autor']; ?></td>
                <td><?php echo $libro['año']; ?></td>
                <td><?php echo $libro['genero']; ?></td>
                <td>
                    <!-- Botón Editar -->
                    <a href="actualizar.php?id=<?php echo $libro['id']; ?>" class="edit-btn">Editar</a>
                    <!-- Botón Eliminar -->
                    <a href="eliminar.php?id=<?php echo $libro['id']; ?>" class="delete-btn" onclick="return confirm('¿Está seguro?')">Eliminar</a>

                     

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
