<?php 
    require_once 'pages/head.php';
    require_once 'Class/cliente.php';
    require_once 'config.php';
    $cliente = new Cliente($pdo);

    $p = (isset($_GET['p']))?$_GET['p']:1;
    $total = $cliente->paginacao();
    $pagina = ceil($total/7);
    $inicio = ($p*7)-7;
    
?>
  <div class="container">
    <div class="table-responsive-sm-6 my-4">
        <h1>Listagem Clientes</h1>
        <table class="table table-striped my-4">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <?php
                $clientes = $cliente->exibe($inicio,7);
                if(!empty($clientes )):
                    foreach($clientes  as $item):
                    
            ?>
            <tbody>
                <tr>
                    <td>  <b><?php echo $item['id'];?>  </b></td>
                    <td>  <b><?php echo $item['nome'];?>  </b></td>
                    <td>
                        <a href="visualizar.php?id=<?php echo $item['id']; ?>" class="btn btn-outline-info mx-1 my-1">Visualizar Dados</a> 
                        <a href="atualizar.php?id=<?php echo $item['id']; ?>" class="btn btn-outline-success  mx-1 my-1">Atualizar</a> 
                        <a href="Pages/deletar.php?id=<?php echo $item['id']; ?>" class="btn btn-outline-danger  mx-1 my-1">remover</a>  
                    </td> 
                </tr>
            </tbody>
        <?php 
                    endforeach;
                endif;
        ?> 
        </table>
    </div>
   
    <ul class="pagination justify-content-center my-4">
        
        <?php 
            for($i=1;$i<$pagina;$i++):
               $select = "";
               if($p == $i){
                   $select = 'active';
               }               
        ?>
        <li  class="page-item <?php echo $select;?>"><a class="page-link" href="index.php?p=<?php echo $i;?>"><?php echo $i;?></a></li>
        <?php
                
            endfor;
        ?>
    </ul>
    </nav>
  
<?php 
     require_once "Pages/footer.php";
?>

