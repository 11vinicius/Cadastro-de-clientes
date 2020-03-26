<?php

Class cliente{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function exibe($inicio,$fim)
    {
        $dados = "";
        $sql = $this->pdo->prepare("select * from cliente limit $inicio,$fim");
        $sql->execute();
        
        if($sql->rowCount()>0){
            $dados = $sql->fetchAll();
        }
        return $dados;
    }
    public function visualizar($id)
    {
        $sql = $this->pdo->prepare("select * from cliente where id= :id");
        $sql->bindvalue(":id",$id);
        $sql->execute();
        
        if($sql->rowCount()>0){
            $dados = $sql->fetchAll();
        }
        return $dados;
    }

    public function adiciona($nome,$email,$telefone,$estado,$cidade)
    {
        $sql = $this->pdo->prepare("select * from cliente where email=:email");
        $sql->bindvalue(':email',$email);
        $sql->execute();

        if($sql->rowCount()===0){

            $sql = $this->pdo->prepare('insert into cliente (nome,email,telefone,estado,cidade) values(:nome,:email,:telefone,:estado,:cidade)');
            $sql->bindvalue(":nome",$nome); 
            $sql->bindvalue(":email",$email);
            $sql->bindvalue(":telefone",$telefone);
            $sql->bindvalue(":estado",$estado);
            $sql->bindvalue(":cidade",$cidade);
            $sql->execute();
  
              return true; 
          }else{
              return false;
          }
        }

    public function exclui($id)
    {
        $sql = $this->pdo->prepare('delete from cliente where id = :id');
        $sql->bindvalue(":id",$id);
        $sql->execute();

        return true;
    }

    public function update($nome ,$email ,$telefone ,$estado ,$cidade ,$id)
    {
        $sql = $this->pdo->prepare("update cliente set nome = :nome ,email = :email ,telefone = :telefone ,estado = :estado ,cidade = :cidade where id =:id");
        $sql->bindvalue(":nome",$nome);
        $sql->bindvalue(":email",$email);
        $sql->bindvalue(":telefone",$telefone);
        $sql->bindvalue(":estado",$estado);
        $sql->bindvalue(":cidade",$cidade);
        $sql->bindvalue(":id",$id);
        $sql->execute();
        return true;
    }

    public function paginacao()
    {
        $sql = $this->pdo->prepare("select count(*) as c from cliente");
        $sql->execute();

        $total = $sql->fetch();

        return $total['c'];
    }
}

