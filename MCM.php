<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCM</title>
</head>
<body>
    <form action="Php/MCM.php" method="post">
        <h3>Sexo</h3>
        <select name="Sexo" id="">
            <option value="1">Femenino</option>
            <option value="2">Masculino</option>
        </select>
        <h3>Peso</h3>
        <input type="number" name="Peso">
        <select name="Sistema_Peso" id="">
            <option value="1">Libras</option>
            <option value="2">Kilogramos</option>
        </select>
        <h3>Altura</h3>
        <input type="int" name="Altura">
        <select name="Sistema_Medida" id="">
            <option value="1">Centimetros</option>
            <option value="2">Pies</option>
            <option value="3">Metros</option>
        </select>
        <br> <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>