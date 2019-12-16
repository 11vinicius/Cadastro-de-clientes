<?php 
    require_once '../config.php';
    require_once '../Class/cliente.php'; 

    $id = (isset($_GET['id']) && !empty($_GET['id']))? $_GET['id']:'';
    $cliente = new cliente($pdo);
    $excluir = $cliente->exclui($id);
    header("Location: ../index.php");