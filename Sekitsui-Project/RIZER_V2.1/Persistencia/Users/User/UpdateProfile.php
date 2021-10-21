<?php
session_start();
include_once '../../Login/Seguridad.php';
include '../../Connection/Connection.php';

if(isset($_SESSION['Users_Id'])){
    
	$Users_Id = $_SESSION['Users_Id'];
}
    $Sentencia = $Rizer->query("SELECT * FROM users WHERE Users_Id = $Users_Id");
    $Resultado = $Sentencia->fetchAll(PDO::FETCH_OBJ);

    $Sentencia2 = $Rizer->query("SELECT * FROM details WHERE Details_Id = $Users_Id");
    $Resultado2 = $Sentencia2->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Perfil | Rizer</title>
</head>
<body>
<center>
		<h1>¡<?php echo $_SESSION['Users_Name'];?>, actualiza tu perfil!</h1>
		<table>
			<tr>
				<td>Apodo</td>
				<td>Usuario</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Correo</td>
				<td>Peso</td>
				<td>Altura</td>
                <td>Fecha de nacimiento</td>
                <td>Actividad física semanal</td>
			</tr>

			<?php 
				foreach ($Resultado as $dato) {
                    foreach ( $Resultado2 as $dato1) {
					?>
					<tr>
						<td><?php echo $dato->Users_Nickname; ?></td>
						<td><?php echo $dato->Users_User; ?></td>
						<td><?php echo $dato->Users_Name; ?></td>
						<td><?php echo $dato->Users_LastName; ?></td>
						<td><?php echo $dato->Users_Email; ?></td>
						<td><?php echo $dato1->Details_Weight; ?>kg</td>
						<td><?php echo $dato1->Details_Size; ?>cm</td>
						<td><?php echo $dato1->Details_Date_of_birth; ?></td>
						<td><?php echo $dato1->Details_Physical_activity; ?> horas</td>
						<td><a href="Edit.php?id=<?php echo $dato->Users_Id; ?>">Editar</a></td>
					</tr>
					<?php
                    }
				}
			?>
		</table>
</body>
</html>