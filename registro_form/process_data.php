<?php
// Conexión a la base de datos
$conex = mysqli_connect("localhost", "root", "", "registro");

// Verifica la conexión
if (!$conex) {
    die("Error de conexión: " . mysqli_connect_error());
}

echo "Conexión exitosa"; // Este mensaje te indicará si la conexión se estableció correctamente

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recibe los datos del formulario
    $name = mysqli_real_escape_string($conex, $_POST["name"]);
    $arrival = mysqli_real_escape_string($conex, $_POST["date_in"]);
    $departure = mysqli_real_escape_string($conex, $_POST["date_out"]);
    $adults = mysqli_real_escape_string($conex, $_POST["adults"]);
    $children = mysqli_real_escape_string($conex, $_POST["children"]);

    // Puedes realizar alguna validación adicional si es necesario

    // Inserta los datos en la base de datos
    $query = "INSERT INTO habitaciones (nombre_cliente, fecha_llegada, fecha_salida, adultos, ninos) VALUES ('$name', '$arrival', '$departure', '$adults', '$children')";
    $result = mysqli_query($conex, $query);

    // Verifica si la inserción fue exitosa
    if ($result) {
        echo "Datos insertados correctamente en la base de datos.";
    } else {
        echo "Error al insertar datos: " . mysqli_error($conex);
    }
} else {
    // Si intentan acceder directamente al archivo sin enviar el formulario, redirige a otra página o realiza alguna acción.
    echo "Acceso no permitido.";
}

// Cierra la conexión a la base de datos
mysqli_close($conex);
?>
