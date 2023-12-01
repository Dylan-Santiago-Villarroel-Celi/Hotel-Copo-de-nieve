<!DOCTYPE html>
<html>
<head>
    <title>Registrar usuario</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <div class="login-box">
        <form method="post" action="validar_login.php">
            <div class="user-box">
                <input type="text" name="name" placeholder="Nombre" required>
            </div>
            <div class="user-box">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <center>
                <input type="submit" name="register" value="Tocame para enviar">
            </center>
        </form>
    </div>

    <?php
    include("validar_login.php");
    ?>
</body>
</html>
