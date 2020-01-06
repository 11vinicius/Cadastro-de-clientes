<?php
  require_once 'Pages/head.php';
  require_once 'Class/cliente.php';
  require_once 'config.php';

    $id = (isset($_GET['id']) && !empty($_GET['id']))? $_GET['id']:'';

    $cliente = new cliente($pdo);  

    $clientes = $cliente->visualizar($id);
    if(!empty( $clientes )):
        foreach( $clientes  as $item):
?>
    <div class="container my-3">
        <h1><b>Dados de cliente</b></h1>

        <p><h3><b>Nome : </b> <?php echo $item['nome'];?> .</h3></p>
        <p><h3><b>E-mail : </b> <?php echo $item['email'];?> .</h3></p>
        <p><h3><b>Telefone : </b> <?php echo $item['telefone'];?> .</h3></p>
        <p><h3><b>Estado : </b> <?php echo $item['estado'];?> .</h3></p>
        <p><h3><b>Cidade : </b> <?php echo $item['cidade'];?> .</h3></p>
    </div>
<?php
        endforeach;
    endif;  
    require_once 'pages/footer.php';
?>    