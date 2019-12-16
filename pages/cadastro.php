<?php
require_once '../Class/cliente.php';
require_once '../config.php';

$cliente = new cliente($pdo);

$nome = (isset($_POST['nome']))? $_POST['nome']:'';
$email = (isset($_POST['email']))? $_POST['email']:'';
$telefone = (isset($_POST['telefone']))? $_POST['telefone']:'';
$estado = (isset($_POST['estado']))? $_POST['estado']:'';
$cidade = (isset($_POST['cidade']))? $_POST['cidade']:'';

if($cliente->adiciona($nome,$email,$telefone,$estado,$cidade)){
    echo true;
}else{
    echo false; 
}