<?php 
    require_once '../Class/cliente.php';
    require_once '../config.php';


     $nome = (isset($_POST['nome']))? $_POST['nome']:'';
     $email = (isset($_POST['email']))? $_POST['email']:'';
     $telefone = (isset($_POST['telefone']))? $_POST['telefone']:'';
     $estado = (isset($_POST['estado']))? $_POST['estado']:'';
     $cidade = (isset($_POST['cidade']))? $_POST['cidade']:'';
     $id = (isset($_POST['id']))? $_POST['id']:'';


    $cliente = new cliente($pdo);

    if($cliente->update($nome ,$email ,$telefone ,$estado ,$cidade ,$id)){
        echo true;
    }else{
        echo false;
    }