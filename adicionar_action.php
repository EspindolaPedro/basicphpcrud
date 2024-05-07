<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require 'config.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($name && $email) {

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0 ) {
    $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");
    $sql->bindValue(':name', $name); //associando o valor enviado (:index  ,valor_Da_variável)
    $sql->bindValue(':email', $email); 
    $sql->execute();

    header("Location: index.php");
    exit;
    
    } else {
        header("Location: adicionar.php"); 
        exit;
    }

} else {
    header("Location: adicionar.php"); 
    exit;
}