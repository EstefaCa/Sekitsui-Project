<?php
    include '../../Connection/Connection.php';
    $Sentencia = $Rizer->query("SELECT * FROM users WHERE Users_Active = 1");
    $Resultado = $Sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Perfiles | Rizer </title>
</head>
<body>
    <center>
		<h1>Perfiles</h1>
		<table>
			<tr>
				<td>Apodo</td>
				<td>Usuario</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Correo</td>
				<td>Estado</td>
			</tr>

			<?php 
				foreach ($Resultado as $dato) {
					?>
					<tr>
						<td><?php echo $dato->Users_Nickname; ?></td>
						<td><?php echo $dato->Users_User; ?></td>
						<td><?php echo $dato->Users_Name; ?></td>
						<td><?php echo $dato->Users_LastName; ?></td>
						<td><?php echo $dato->Users_Email; ?></td>
						<td><?php
                            if ($dato->Users_Active == 1) {
                                echo 'Activo';
                            }else {
                                echo 'Inactivo';
                            }
                        ?></td>
						<td><a href="../Edit.php?id=<?php echo $dato->Users_Id; ?>">Editar</a></td>
						<td><a href="../../Crud/Disable.php?id=<?php echo $dato->Users_Id; ?>">Eliminar</a></td>
					</tr>
					<?php
				}
			?>
		</table>
        <a href="Register.php">Regresar</a>
    </center>
</body>
</html>