<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Datos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: rgb(49, 55, 216);
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #fff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Registro de Usuarios</h1>

    <?php
    include("conexion.php");
    //Consulta sql seleccionar todo el contenido
    $query = "SELECT * FROM regisuser";

    echo '<table>
    <tr> 
        <th>ID</th> 
        <th>Usuario</th> 
        <th>Nombre</th> 
        <th>Apellido</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Password</th> 
    </tr>';

    if ($result = $conexion->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["id"];
            $field2name = $row["usuario"];
            $field3name = $row["nombre_u"];
            $field4name = $row["apellido_u"];
            $field5name = $row["mail"];
            $field6name = $row["telefono"];
            $field7name = $row["pass"];

            echo '<tr> 
                <td>'.$field1name.'</td> 
                <td>'.$field2name.'</td> 
                <td>'.$field3name.'</td> 
                <td>'.$field4name.'</td> 
                <td>'.$field5name.'</td> 
                <td>'.$field6name.'</td> 
                <td>'.$field7name.'</td> 
            </tr>';
        }
        $result->free();
    }
    ?>
    
    <a href="index2.html">Regresar</a>

</body>
</html>
