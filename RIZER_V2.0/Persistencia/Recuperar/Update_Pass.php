<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar contraseña</title>
</head>
<body>
    <form action="" method="POST">
    <h2>Recuperar Contraseña</h2>
            <div>
                <label >Nueva Contraseña</label>
                <input type="text"  name="N_Password" required>
                <label >Confirmar Contraseña</label>
                <input type="text"  name="C_Password" required>
                <input type="submit" value="Enviar">
            </div>

    </form>

    <?php
    if (isset($_POST['N_Password'],$_POST['C_Password'])) {
        include_once 'Connection.php';
        include_once 'Update_P.php';
    }
    ?>

</body>
</html>