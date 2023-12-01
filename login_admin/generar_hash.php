<?php
$password = 'admin'; // Reemplaza 'tu_nueva_contraseña' con la contraseña que quieras probar
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Contraseña original: $password <br>";
echo "Hash de la contraseña: $hash";
?>
