<?php
require_once '../Class/uf.php';
require_once '../config.php';

$uf = new uf($pdo);
$lista = $uf->cidade($_GET['uf']);
echo json_encode($lista);

