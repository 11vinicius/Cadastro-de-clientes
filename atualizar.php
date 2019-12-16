<?php
    require_once 'Pages/head.php';
    require_once  'Class/cliente.php';
    require_once 'Class/uf.php';
    require_once 'config.php';

    $uf = new uf($pdo);
    $cliente = new cliente($pdo);
    $clientes = $cliente->visualizar($_GET['id']);

    if(!empty($clientes)):
        foreach($clientes as $dados):
?>

<div class="container">
    <h1><b>Atualizar clientes</b></h1>
    
    <form method="POST" id="atualizar">
    <input type="hidden"  name="id" value="<?php echo $_GET['id'];?>">
        <div class="form-group">
            <label for="nome"><h4>Nome</h4></label><br/>
            <input type="text" value="<?php echo $dados['nome'];?>"  name="nome" id="nome" class="form-control" autocomplete="off" maxlength="100" minlength="8" required>
        </div>

        <div class="form-group">
            <label for="email"><h4>Email</h4></label><br/>
            <input type="email" value="<?php echo $dados['email'];?>"  name="email" id="email" class="form-control" maxlength="100" minlength="8" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="telefone"><h4>Telefone</h4></label><br/>
            <input type="text" value="<?php echo $dados['telefone'];?>"  name="telefone" id="telefone" class="form-control" maxlength="100" minlength="13" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="estado"><h4>Estado</h4></label><br/>
            <select name="estado" id="estado" class="form-control">
                <?php 
                    $estados = $uf->estado();
                    if(!empty($estados)):
                        foreach($estados as $estado):
                ?>
                <option value="<?php echo $estado['uf'];?>" <?php if($dados['estado'] == $estado['uf']){echo "selected";}?>><?php echo $estado['nome'];?></option>
                <?php
                        endforeach;
                    endif;
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="cidade"><h4>Cidade</h4></label><br/>
            <select name="cidade" id="cidade" class="form-control">
                <?php 
                  $cidades = $uf->cidades();
                  if(!empty($cidades)):
                    foreach($cidades as $cidade):
                ?>
                <option value="<?php echo $cidade['nome']?>" <?php if($dados['cidade'] == $cidade['nome'] ){echo 'selected';}?>><?php echo $cidade['nome'];?></option>
                <?php 
                    endforeach;
                  endif; 
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-outline-primary">Cadastrar</button>            
    </form>
</div>

<?php
        endforeach;
     endif;
    require_once 'Pages/footer.php';
?>