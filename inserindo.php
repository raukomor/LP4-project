<?php
require "conexao.php";

$stmt = $con->prepare("SELECT * FROM aluno ORDER BY cd_aluno");

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($results);
print_r($results);

$stmt = $con->prepare("INSERT INTO aluno(cd_aluno,nm_aluno) VALUES ('','batata')");

$stmt->execute();

echo "Inserido com sucesso";
?>