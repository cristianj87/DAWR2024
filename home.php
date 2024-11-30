<?php
session_start();
if(!isset($_SESSION['usuario'])) {
    echo "<script>
    alert('¡Inicia sesión para acceder a la página de inicio!');
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
    <link rel="icon" type="image/png" href="img/web.png" sizes="32x32">
    <title>Inicio</title>
    <link rel="stylesheet" href="styles.css">
    <script src="clima.js" defer></script>
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
<div class="content">
    <div class="main-content">
        <h1>Bienvenidos a Tecnologyti</h1>
        <p>En Tecnologyti nos especializamos en proporcionar equipos tecnológicos de calidad y soluciones adaptadas a las necesidades de nuestros clientes.</p>
        
        <h2>Servicios que ofrecemos</h2>
        <ul>
            <li><strong>Venta de equipos tecnológicos:</strong> Computadoras, laptops, smartphones, tablets y accesorios.</li>
            <li><strong>Soporte técnico:</strong> Reparación de hardware, instalación de software y mantenimiento preventivo.</li>
            <li><strong>Consultoría tecnológica:</strong> Asesoría en adquisición de tecnología para empresas y proyectos específicos.</li>
            <li><strong>Instalaciones:</strong> Configuración de redes empresariales y domésticas.</li>
            <li><strong>Garantías:</strong> Servicios de postventa y gestión de garantías de productos.</li>
        </ul>
        
        <h2>¿Por qué elegirnos?</h2>
        <p>En Tecnologyti, nuestro compromiso es ofrecer la mejor experiencia en el mercado tecnológico, con atención personalizada y productos de vanguardia. Nuestro equipo está compuesto por expertos en tecnología que están listos para ayudarte a encontrar la solución perfecta.</p>
    </div>

    <div class="sidebar">
        <h2>Información del Clima</h2>
        <p id="ubicacion-clima">Cargando...</p>
        <p id="temperatura">Temperatura: Cargando...</p>
        <p id="descripcion">Descripción: Cargando...</p>
        <img id="icono" src="" alt="Icono del clima" style="display: block; width: 100px; height: 100px; margin: 0 auto;">
    </div>

</div>
</body>
</html>
