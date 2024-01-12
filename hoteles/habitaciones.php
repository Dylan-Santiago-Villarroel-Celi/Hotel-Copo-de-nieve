<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Habitaciones</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="?tipo=inicio">Inicio</a></li>
                <li><a href="?tipo=suite">Suite</a></li>
                <li><a href="?tipo=estandar">Estandar</a></li>
                <li><a href="?tipo=ejecutiva">Ejecutiva</a></li>
            </ul>
        </nav>
    </header>
<br>
<br>
<br>
    <div class="habitacion-container">
        <div class="habitacion-inner-container">
            <?php
            include 'config.php';

            // Agrega trim para eliminar espacios en blanco alrededor del tipo
            $tipoSeleccionado = isset($_GET['tipo']) ? trim($_GET['tipo']) : '';

            // Construye la consulta SQL según el tipo seleccionado
            $sql = "SELECT * FROM habitaciones WHERE disponible = 1";

            if ($tipoSeleccionado && $tipoSeleccionado !== 'inicio') {
                // Filtra por el tipo seleccionado
                if ($tipoSeleccionado === 'suite' || $tipoSeleccionado === 'estandar' || $tipoSeleccionado === 'ejecutiva') {
                    $sql .= " AND tipo = '$tipoSeleccionado'";
                } else {
                    // Tipo no reconocido, podrías manejar esto de manera diferente si es necesario
                    echo "<p>Tipo no reconocido.</p>";
                }
            }

            // Agrega verificación de errores en la conexión y la consulta
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            $result = $conn->query($sql);

            if (!$result) {
                die("Error en la consulta: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='habitacion'>";
                    echo "<h2>{$row['descripcion']}</h2>";
                    echo "<img src='{$row['imagen_url']}' alt='Habitación'>";
                    echo "<p>Capacidad para {$row['capacidad_adultos']} adultos y {$row['capacidad_ninos']} niños</p>";
                    echo "<p>Precio por noche: {$row['precio_noche']} USD</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay habitaciones disponibles en este momento.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
