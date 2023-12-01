<?php
session_start();

include("../bd/con_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = mysqli_real_escape_string($conex, $_POST['usuario']);
    $contraseña = $_POST['password'];

    $consulta = "SELECT * FROM administradores WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conex, $consulta);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conex));
    }

    $row = mysqli_fetch_assoc($resultado);

    if ($row) {
        if (password_verify($contraseña, $row['contraseña'])) {
            // Credenciales válidas, iniciar sesión
            $_SESSION['usuario'] = $usuario;
            header("Location: agregar_usuario.php");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
}
?>
