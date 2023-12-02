<?php
$conex = mysqli_connect("localhost", "root", "", "registro");

if (!$conex) {
    die("Error de conexión: " . mysqli_connect_error());
}
echo "Conexión exitosa"; // Este mensaje te indicará si la conexión se estableció correctamente