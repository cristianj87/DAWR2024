<?php
$servername = "localhost"; // Cambia esto si tu servidor de base de datos tiene un nombre diferente
$username = "root"; // Cambia esto por tu nombre de usuario de la base de datos
$password = "Crisja19%"; // Cambia esto por tu contraseña de la base de datos
$dbname = "web"; // Nombre de la base de datos

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"];
    $password = md5($_POST["password"]);

    // Consulta SQL para verificar el usuario y contraseña
    $query = "SELECT * FROM usuarios WHERE usuario='$usuario' AND pass='$password'";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {

        session_start(); //se inicia sesión
        $_SESSION['usuario']= $usuario; //Se utiliza la variable global de PHP para las sesiones
        //if (($nr == 1) && (password_verify($password, $row['pass']))) {




        // Inicio de sesión exitoso
        echo "<script>
                alert('¡Información Correcta!');
                window.location= 'home.php'
                </script>";
    } else {
        // Error en inicio de sesión
        echo "<script>
                alert('¡Información erronea!');
                window.location= 'index.html'
                </script>";
    }
    
    $conexion->close();
}
?>
