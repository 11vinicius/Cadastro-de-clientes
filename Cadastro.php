<?php
    require_once 'Pages/head.php';
    require_once 'Class/uf.php';
    require_once 'config.php';

    $uf = new uf($pdo);
        
?>

<div class="container">
    <h1><b>Cadastro clientes</b></h1>
    <p id="erro"></p>
    <form method="POST" id="cadastro">
        <div class="form-group">
            <label for="nome"><h4>Nome</h4></label><br/>
            <input type="text" name="nome" id="nome" class="form-control" autocomplete="off" maxlength="100" minlength="8" required>
        </div>

        <div class="form-group">
            <label for="email"><h4>Email</h4></label><br/>
            <input type="email" name="email" id="email" class="form-control" maxlength="100" minlength="8" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="telefone"><h4>Telefone</h4></label><br/>
            <input type="text" name="telefone" id="telefone" class="form-control" maxlength="100" minlength="13" autocomplete="off" required>
        </div>

        <div class="form-group">
            <label for="estado"><h4>Estado</h4></label><br/>
            <select name="estado" id="estado" class="form-control">
                <option value="" selected></option>
                <?php
                    $estados = $uf->estado();
                    if(!empty($estados)):
                        foreach($estados as $estado):
                ?>
                <option value="<?php echo $estado['uf']?>"><?php echo $estado['nome'];?></option>
                <?php
                        endforeach;
                    endif;
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="cidade"><h4>Cidade</h4></label><br/>
            <select name="cidade" id="cidade" class="form-control">
                            
            </select>
        </div>

        <button type="submit" class="btn btn-outline-primary">Cadastrar</button>            
    </form>
</div>

<?php
    require_once 'Pages/footer.php';
?>