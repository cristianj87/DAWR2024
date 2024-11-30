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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca de</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <link rel="icon" type="image/png" href="img/web.png" sizes="32x32">
    <script src="mapa.js" defer></script>
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
    <div class="acerca-container">
        <center><h1>Acerca de Tecnologyti</h1></center>
        <p><strong>Teléfono:</strong> 656 345 7890</p>
        <p><strong>Email:</strong> soporte@tecnologyti.com</p>
        
        <h2>Misión</h2>
        <p>Proveer a nuestros clientes los equipos tecnológicos más innovadores y de alta calidad para satisfacer sus necesidades personales y empresariales, garantizando un excelente servicio y soporte técnico.</p>
        
        <h2>Visión</h2>
        <p>Ser una empresa líder en la venta de tecnología a nivel nacional, reconocida por nuestra excelencia en atención al cliente y por ofrecer soluciones tecnológicas que impulsen el crecimiento de nuestros usuarios.</p>
        
        <h2>Ubicación</h2>
        <div id="mapa" style="height: 350px;"></div>
    </div>
</body>
</html>
