<?php
    $host = 'localhost';
    $dbname = 'crud';
    $user ='root';
    $pass= '';

    try{
        $pdo = new PDO('mysql:dbname='.$dbname.';host='.$host,$user,$pass);
    }catch(PDOException $e){
        echo 'Erro'.$e->getMessage();
    }

?>