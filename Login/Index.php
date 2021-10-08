<?php
session_start();
include_once 'Seguridad.php';
?>


<h1>Hola <?php   echo $_SESSION['Users_Name'];?></h1>

<h4><a href="Logout.php?tk=<?php echo $_SESSION['token'];?>"><h2>Cerrar sesión</h2></a></h4>

