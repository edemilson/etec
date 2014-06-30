<?php
error_reporting(0);
session_start();

$usuario = "root";
$senha = "";
$bancodedados = "noticias";
$conexao = "";

try {
    $conexao = new PDO('mysql:host=localhost;dbname='.$bancodedados, $usuario, $senha);
} catch (PDOException $e) {
    print "Erro ao conectar: " . $e->getMessage() . "<br/>";
    die();
}

?>