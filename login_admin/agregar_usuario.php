<?php
session_start();



// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar y sanitizar datos (esto es solo un ejemplo, implementa una validación más robusta)
    $nombre = htmlspecialchars($nombre);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Conectar a la base de datos (reemplaza con tus propios detalles de conexión)
    include("con_db.php");

    // Insertar usuario en la base de datos
    $consulta = "INSERT INTO usuarios (nombre, email, contraseña) VALUES ('$nombre', '$email', '$hashed_password')";
    $resultado = mysqli_query($conex, $consulta);

    // Verificar si la inserción fue exitosa
    if ($resultado) {
        header("Location: mostrar.php?mensaje=Usuario agregado correctamente");
        exit();
    } else {
        $error_message = "Error al agregar usuario: " . mysqli_error($conex);
    }
}

// Si llegamos aquí, o no se ha enviado el formulario o hubo un error en la inserción
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h2>Agregar Usuario</h2>

    <?php if (isset($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } ?>

    <form method="post" action="agregar_usuario.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Agregar Usuario">
    </form>
</body>
</html>
