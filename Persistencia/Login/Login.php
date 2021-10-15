<?php
session_start();
if (isset($_SESSION['Users_Email'],$_SESSION['Users_Password'])){

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<div class="">
			<form action="" method="POST">
				<h2 class="">Bienvenido</h2>
           		<div class="">

           		   <div class="div">
           		   		<h5>Usuario o email</h5>
           		   		<input type="text" class="input" maxlength="60" name="Users_Nickname" required="" value="">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input type="password" class="input" maxlength="15" name="Users_Password" required="">
            	   </div>
            	</div>
            	<a href="#" class="Lost">¿Olvidaste la contraseña?</a>
            	<input type="submit" class="btn" value="Siguiente">
				<?php
				if (isset($_POST['Users_Nickname'],$_POST['Users_Password'])) {
					require_once "../Connection/Connection.php";
					require_once "Login_code.php";
				}	

				?>
            </form>
        </div>
    </div>
   </body>
</html>