<?php
session_start();
if(!isset($_SESSION['usuario'])) {
    echo "<script>
    alert('¡Inicia sesión para contáctarnos!');
    window.location= 'index.html'
    </script>";
  exit(0);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/web.png" sizes="32x32">
    <title>Contacto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<nav>
        <h1>Tecnologyti</h1>
        <ul>
            <li><a href="home.php">Inicio</a></li>
            <li><a href="contacto.php">Contáctanos</a></li>
            <li><a href="acerca.php">Acerca de</a></li>
            <li><a href="cerrarsesion.php">Salir</a></li>
        </ul>
</nav>


    <div class="login-container">
        <h2>Formulario de Contacto</h2>
        <h3 style="color:#FFFFFF;">Hola <strong><?php echo $_SESSION['usuario']; ?></strong></h3>
        <form action="enviar.php" method="post" id="contactForm">
            <div class="input-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="asunto">Asunto:</label>
                <input type="text" id="asunto" name="asunto" required>
            </div>
            <div class="input-group">
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
