<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="menu.css">
    
</head>
<body>
    <nav>
        <ul class="menu-vertical">
            <li><a href="#Registro" onclick="mostrarSeccion('Registro')">Registro</a></li>
            <li><a href="#libros" onclick="mostrarSeccion('libros')">Libros</a></li>
            <li><a href="#productos" onclick="mostrarSeccion('productos')">productos</a></li>
        </ul>
    </nav>

    <!-- Sección Registro -->
    <section id="Registro" class="seccion" style="display: none;">
        <div class="container">
            <div class="title">Registro</div>
            <form id="form-validation" novalidate action="conexion.php" method="POST">
                <div class="form-group">
                    <span>Nombre</span>
                    <input type="text" name="nombre" placeholder="Ingrese nombre" required>
                </div>
                <div class="form-group">
                    <span>Usuario</span>
                    <input type="text" name="usuario" placeholder="Usuario" required>
                </div>
                <div class="form-group">
                    <span>Email</span>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <span>Teléfono</span>
                    <input type="number" name="telefono" placeholder="Teléfono" required>
                </div>
                <div class="form-group">
                    <span>Contraseña</span>
                    <input type="password" name="contrasena" placeholder="Ingrese contraseña" required>
                </div>
                <div class="form-group">
                    <span>Confirmar Contraseña</span>
                    <input type="password" name="confirmar_contrasena" placeholder="Confirme contraseña" required>
                </div>
                <div class="button">
                    <input type="submit" value="Registrarse">
                </div>
            </form>
        </div>
    </section>

    <!-- Sección Libros -->
    <section id="libros" class="seccion" style="display: none;">
        <div class="container">
            <h2>Gestión de Libros</h2>
            <!-- Formulario para agregar libros -->
            <form id="form-libros" action="insertar.php"  novalidate  method="POST">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Título del libro" required>
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" id="autor" name="autor" placeholder="Autor del libro" required>
                </div>
                <div class="form-group">
                    <label for="año">Año</label>
                    <input type="number" id="año" name="año" placeholder="Año de publicación" required>
                </div>
                <div class="form-group">
                    <label for="genero">Género</label>
                    <input type="text" id="genero" name="genero" placeholder="Género del libro" required>
                </div>
                <div class="button">
                    <input type="submit" value="Agregar Libro">
                </div>

            
            </form>

                  


    </section>

    </div id ="tabla-libros">

<?php include 'leer.php'; ?>

</div>





    <script src="script.js" defer></script>
</body>
<?php
?>