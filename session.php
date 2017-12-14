<?php
//session_start();
//$_SESSION['usuario'] = $_POST['usuario'];

//header("location:index.php");


$mysqli = new mysqli("localhost","root","usbw","sistema_escola");

if($mysqli->connect_errno)
echo "Falha na conexão com banco";

?>
