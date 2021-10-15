<?php  
	include '../../Connection/Connection.php';
	$Users_Id = $_GET['id'];
	$Sentencia = $Rizer->prepare("SELECT * FROM users WHERE Users_Id = ?;");
	$Sentencia->execute([$Users_Id]);
	$Person = $Sentencia->fetch(PDO::FETCH_OBJ);
	$Sentencia2 = $Rizer->prepare("SELECT * FROM details WHERE Details_Id= ?;");
	$Sentencia2->execute([$Users_Id]);
	$Person2 = $Sentencia2->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar perfil</title>
	<meta charset="utf-8">
	<script src="../../js/Validation.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script> 
	<script type="text/javascript" src="js/jquery.validate.js"></script>
</head>
<body>
	<center>
		<form method="POST" action="../../Crud/Update.php">
			<table>
				<tr>
					<td>Apodo </td>
					<td><input type="text" name="Users_Nickname" value="<?php echo $Person->Users_Nickname; ?>"></td>
				</tr>
				<tr>
					<td>Usuario</td>
					<td><input type="text" name="Users_User" value="<?php echo $Person->Users_User; ?>"></td>
				</tr>
				<tr>
					<td>Nombre</td>
					<td><input type="text" name="Users_Name" value="<?php echo $Person->Users_Name; ?>" onkeypress="return soloLetras(event)"> </td>
				</tr>
				<tr>
					<td>Apellido </td>
					<td><input type="text" name="Users_LastName" value="<?php echo $Person->Users_LastName; ?>" onkeypress="return soloLetras(event)"></td>
				</tr>
				<tr>
					<td>Correo </td>
					<td><input type="email" name="Users_Email" value="<?php echo $Person->Users_Email; ?>"></td>
				</tr>
				<tr>
                <td>¿Cuál es tu peso?</td>
                <td><input type="int" name="Details_Weight"  value="<?php echo $Person2->Details_Weight; ?>" onkeypress="return soloNumeros(event)"></td>
            </tr>
            <tr>
                <td>Elige el sistema de medida de tu peso</td>
                <td>
                    <select name="Weight_System" id="">
						<option value="2">Kilogramos</option>
                        <option value="1">Libras</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>¿Cuál es tu altura?</td>
                <td><input type="int" name="Details_Size" value="<?php echo $Person2->Details_Size; ?>" onkeypress="return soloNumeros(event)" maxlenght="9"></td>
            </tr>
            <td>Elige el sistema de medida de tu talla</td>
                <td>
                    <select name="Size_System" id="">
                        <option value="1">Centimetros</option>
                        <option value="2">Pies</option>
                        <option value="3">Metros</option>
                    </select>
                </td>
            <tr>
                <td>¿Cuándo naciste?</td>
                <td><input type="date" name="Details_Date_of_birth" value="<?php echo $Person2->Details_Date_of_birth; ?>"></td>
            </tr>
            <tr>
                <td>Promedio de horas de actividad física semanal</td>
                <td><input type="number" name="Details_Physical_activity" value="<?php echo $Person2->Details_Physical_activity; ?>"onkeypress="return soloNumeros(event)"> </td>
            </tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="Users_Id" value="<?php echo $Person->Users_Id; ?>">
					<td colspan="2"><input type="submit" value="Editar perfil"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>