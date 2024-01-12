
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de clientes</title>
</head>
<body>
<h1>Usuarios registrados en el hotel</h1>
    
</body>
</html>
<?php 
$inc = include("bd/con_db.php");
if ($inc) {
	$consulta = "SELECT * FROM datos";
	$resultado = mysqli_query($conex,$consulta);
	if ($resultado) {   
		while ($row = $resultado->fetch_array()) {
			$id = $row['id'];
			$nombre = $row['nombre'];
			$email = $row['email'];
			$fechareg = $row['fecha_reg'];
			?>
			<div>
				<h2><?php echo $nombre; ?></h2>
				<div>
					<p>
						<b>ID: </b> <?php echo $id; ?><br>
						<b>Email: </b> <?php echo $email; ?><br>
						<b>Fecha Registro: </b> <?php echo $fechareg; ?><br>
					</p>
				</div>
			</div> 
			<?php
            
		}
	}
}