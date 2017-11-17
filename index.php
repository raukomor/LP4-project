<?php
    //require_once("config.php");
    require_once("class/Sql.php");
    require_once("class/Aluno.php");
    // $sql = new Sql();
    // $usuarios = $sql->select("SELECT * FROM aluno");
    // echo json_encode($usuarios);
    $rodrigo = new Aluno("");
    $rodrigo->loadById(4);

    echo $rodrigo;
?>