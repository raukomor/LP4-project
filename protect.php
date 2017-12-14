<?php
if (!function_exists("protect")){
    function protect(){
        if(!isset($_SESSION))
        session_start();
        if(!isset($_SESSION['admin']))
        header("location:telalogin.php");
    }
}



?>