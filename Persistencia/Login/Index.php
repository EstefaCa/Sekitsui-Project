<?php
session_start();
include_once 'Seguridad.php';

if(isset($_SESSION['Users_Id'])){
    include '../Connection/Connection.php';
	$Users_Id = $_SESSION['Users_Id'];

    $Sentencia = $Rizer->prepare("SELECT Users_Active FROM users WHERE Users_Id = ?;");
    $Sentencia->execute([$Users_Id]);

    if ($Sentencia->rowCount()>=1) {
        $fila = $Sentencia->fetch();
        $Users_Active = $fila['Users_Active'];
    }
    
    if ($Users_Active == 1 ) {
        header('Location: ../Users/User/UpdateProfile.php');
    }
}   


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Rizer</title>
    <script src="../js/Validation.js"></script>
	<script type="../text/javascript" src="js/jquery.min.js"></script> 
	<script type="../text/javascript" src="js/jquery.validate.js"></script>
</head>
<body>
    <h1>Hola <?php echo $_SESSION['Users_Name'];?></h1> 
    <h3>Es momento de seguir completando tus datos</h3>
    <h3>Por favor, introduce datos verdaderos para ser más exactos con tus resultados</h3>
    <form action="" method="post">
        <table>
            <tr>
                <td>¿Cuál es tu peso?</td>
                <td><input type="number" name="Details_Weight" placeholder="Peso" maxlenght="3" onkeypress="return soloNumeros(event)"></td>
            </tr>
            <tr>
                <td>Elige el sistema de medida de tu peso</td>
                <td>
                    <select name="Weight_System" id="">
                        <option value="1">Libras</option>
                        <option value="2">Kilogramos</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>¿Cuál es tu altura?</td>
                <td><input type="int" name="Details_Size" placeholder="Talla" maxlenght="9"></td>
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
                <td>Elige tu género</td>
                <td>
                    <select name="Gender" id="">
                        <option value="1">Femenino</option>
                        <option value="2">Masculino</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>¿Cuándo naciste?</td>
                <td><input type="date" name="Details_Date_of_birth"></td>
            </tr>
            <tr>
                <td>Promedio de horas de actividad física semanal</td>
                <td><input type="number" name="Details_Physical_activity" placeholder="Horas de actividad" maxlenght="2" onkeypress="return soloNumeros(event)"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Enviar"></td>
            </tr>
            <?php
                if (isset($_POST['Details_Weight'],$_POST['Weight_System'],$_POST['Details_Size'],$_POST['Size_System'],$_POST['Gender'],$_POST['Details_Date_of_birth'],$_POST['Details_Physical_activity'])) {
                        require_once "../Connection/Connection.php";
                        require_once "../Crud/InsertDetails.php";
                    }
            ?>
            
        
        </table>
    </form>

<h4><a href="Logout.php?tk=<?php echo $_SESSION['token'];?>"><h2>Cerrar sesión</h2></a></h4>

</body>
</html>