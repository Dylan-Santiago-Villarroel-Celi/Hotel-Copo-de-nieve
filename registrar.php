<?php
// Inicio de PHP

// Incluye el archivo que contiene la conexión a la base de datos
include("bd/con_db.php");

// Verifica si el formulario ha sido enviado
if (isset($_POST['register'])) {

    // Verifica si el campo 'name' tiene al menos un carácter y si el campo 'email' tiene un formato de correo electrónico válido
    if (strlen($_POST['name']) >= 1 && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        
        // Obtiene y limpia los valores del formulario
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $fechareg = date("d/m/y");
        echo "Nombre: $name, Email: $email";

        // Construye la consulta SQL para insertar los datos en la tabla 'datos'
        $consulta = "INSERT INTO datos(nombre, email, fecha_reg) VALUES ('$name','$email','$fechareg')";

        // Ejecuta la consulta en la base de datos
        $resultado = mysqli_query($conex, $consulta);

        // Verifica si la consulta se ejecutó con éxito
        if ($resultado) {
            header("Location: hotel.php");
            exit(); // Asegura que el script se detenga después de la redirección
            
        } else {
            ?> 
            <!-- Si hay un error en la consulta, muestra un mensaje de error -->
            <h3 class="bad">¡Ups ha ocurrido un error!</h3>
            <?php
        }
    } else {
        ?> 
        <!-- Si los campos no cumplen con los criterios, muestra un mensaje de error -->
        <h3 class="bad">¡Por favor complete los campos correctamente!</h3>
        <?php
    }
}

// Fin de PHP
?>
