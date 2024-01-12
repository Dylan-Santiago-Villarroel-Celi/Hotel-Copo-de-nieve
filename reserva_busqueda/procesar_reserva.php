<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitReservation"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registro";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];

    // Inicializar totales
    $totalAdultos = 0;
    $totalNinos = 0;

    // Insertar reserva
    $sqlReserva = "INSERT INTO reservas (check_in, check_out) VALUES ('$checkIn', '$checkOut')";

    if ($conn->query($sqlReserva) === TRUE) {
        // Recuperar el id_reserva recién insertado
        $idReserva = $conn->insert_id;

        // Iterar a través de las habitaciones
        foreach ($_POST['adults'] as $key => $adults) {
            $children = $_POST['children'][$key];

            // Actualizar totales
            $totalAdultos += $adults;
            $totalNinos += $children;

            // Insertar detalles de la habitación asociados a la reserva
            $sqlHabitacion = "INSERT INTO habitaciones (id_reserva, adultos, ninos) 
                              VALUES ('$idReserva', '$adults', '$children')";

            if ($conn->query($sqlHabitacion) !== TRUE) {
                echo "Error al insertar datos de la habitación en la base de datos: " . $conn->error;
            }

            // Recuperar el id_habitacion recién insertado
            $idHabitacion = $conn->insert_id;

            // Iterar a través de las edades de los niños si existen
            if (isset($_POST["childAge{$key}"])) {
                foreach ($_POST["childAge{$key}"] as $i => $edadNino) {
                    if (!empty($edadNino)) {
                        // Insertar edad del niño asociada a la habitación
                        $sqlEdadNino = "INSERT INTO edades_ninos (id_habitacion, id_nino, edad) 
                                        VALUES ('$idHabitacion', '$i', '$edadNino')";

                        if ($conn->query($sqlEdadNino) !== TRUE) {
                            echo "Error al insertar edad del niño en la base de datos: " . $conn->error;
                        }
                    }
                }
            }
        }

        // Actualizar la reserva con los totales
        $sqlActualizarReserva = "UPDATE reservas 
                                SET total_adultos = '$totalAdultos', total_ninos = '$totalNinos' 
                                WHERE id_reserva = '$idReserva'";

        if ($conn->query($sqlActualizarReserva) !== TRUE) {
            echo "Error al actualizar totales en la base de datos: " . $conn->error;
        }
    } else {
        echo "Error al insertar reserva en la base de datos: " . $conn->error;
    }

    $conn->close();
}

 header("Location: ../hoteles/habitaciones.php");
?>