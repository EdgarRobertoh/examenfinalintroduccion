<!DOCTYPE html>
<html>
<head>
    <title>Listado de Alumnos</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Listado de Alumnos</h1>

    <?php
    $servername = "localhost";
    $username = "tu_usuario";
    $password = "tu_contraseña";
    $dbname = "Final_Numero_Carnet";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conn->connect_error);
    }

    $sql = "SELECT carnet, nombre, grado, telefono FROM Alumnos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Carnet</th><th>Nombre</th><th>Grado</th><th>Teléfono</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["carnet"]."</td><td>".$row["nombre"]."</td><td>".$row["grado"]."</td><td>".$row["telefono"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron alumnos.";
    }

    $conn->close();
    ?>
</body>
</html>
