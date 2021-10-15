<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registro | Rizer </title>
	<script src="js/Validation.js"></script>
</head>  
<body>
    <div>
        <h1>¡Hola!</h1>
        <h3>Rellene los campos para continuar</h3>
		<form method="POST" action="" class="password-strength form p-4">
			<table>
				<tr>
					<td>Nombre </td>
					<td><input type="text" name="Users_Name" maxlenght="15" required="" onkeypress="return soloLetras(event)"></td>
				</tr>
				<tr>
					<td>Correo </td>
					<td><input type="email" name="Users_Email" maxlenght="40" required=""></td>
				</tr>
				<tr>
					<td>Apodo </td>
					<td><input type="text" name="Users_Nickname" maxlenght="15" required=""></td>
				</tr>
				<tr>
					<td>Contraseña</td>
					<td><input class="password-strength__input form-control" name="Users_Password" type="password" id="password-input" aria-describedby="passwordHelp" placeholder="Ingrese contraseña"/>
						<button class="password-strength__visibility btn btn-outline-secondary" type="button"><span class="password-strength__visibility-icon" data-visible="hidden"><i class="fas fa-eye-slash"></i></span><span class="password-strength__visibility-icon js-hidden" data-visible="visible"><i class="fas fa-eye"></i></span></button><br>
                    	<small class="password-strength__error text-danger js-hidden"></small><small class="form-text text-muted mt-2" id="passwordHelp">Añade 9 caracteres o más, letras minúsculas, mayúsculas, números y símbolos para que la contraseña sea realmente fuerte.</small>
						<div class="password-strength__bar progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
					</td>
				</tr>
                <input type="hidden" name="oculto" value="1">
				<tr>
					
					<td><button class="password-strength__submit btn btn-success d-flex m-auto" type="submit" disabled="disabled">Submit</button></td>
				</tr>
			</table>
            <?php
                if (isset($_POST['Users_Name'],$_POST['Users_Email'],$_POST['Users_Nickname'],$_POST['Users_Password'])) {
                    require_once "../Connection/Connection.php";
                    require_once "../Crud/Insert.php";
                }
            ?>
		</form>
    </div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js'></script><script  src="../js/Password.js"></script>
</body>
</html>