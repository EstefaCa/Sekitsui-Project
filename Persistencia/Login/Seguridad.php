<?php
if (!isset($_SESSION['Users_Nickname'],$_SESSION['Users_Email'])){
    header("Location: Index.php");
}
?>