<?php 
    require_once 'pages/head.php';
    require_once 'Class/cliente.php';
    require_once 'config.php';
    $cliente = new Cliente($pdo);

    $p = (isset($_GET['p']))?$_GET['p']:1;
    $total = $cliente->paginacao();
    $pagina = ceil($total/10);
    $inicio = ($p*10)-10;
    
?>
  <div class="container">
    <h1>Listagem Clientes</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Opções</th>
            </tr>
        </thead>
        <?php
            $clientes = $cliente->exibe($inicio,10);
            if(!empty($clientes )):
                foreach($clientes  as $item):
                   
        ?>
        <tbody>
            <tr>
                <td>  <b><?php echo $item['id'];?>  </b></td>
                <td>  <b><?php echo $item['nome'];?>  </b></td>
                <td>  <a href="visualizar.php?id=<?php echo $item['id']; ?>" class="btn btn-outline-info">Visualizar Dados</a> <a href="atualizar.php?id=<?php echo $item['id']; ?>" class="btn btn-outline-success">Atualizar</a> <a href="Pages/deletar.php?id=<?php echo $item['id']; ?>" class="btn btn-outline-danger">remover</a>  </td> 
            </tr>
        </tbody>
       <?php 
                endforeach;
            endif;
       ?> 
    </table>
    <nav aria-label="Navegação de página exemplo">
    <ul class="pagination">
        <?php 
            for($i=0;$i<$pagina;$i++):
                
                                  
        ?>
        <li  class="page-item"><a class="page-link" href="index.php?p=<?php echo $i+1;?>"><?php echo $i+1;?></a></li>
        <?php
                
            endfor;
        ?>
    </ul>
    </nav>
    
  
  </div>
<?php 
     require_once "Pages/footer.php";
?>

