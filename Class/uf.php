<?php

Class uf{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function estado()
    {
        $sql = $this->pdo->prepare("select * from tb_estados");
        $sql->execute();

        if($sql->rowCount()>0){
            $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $dados;
    }

    public function cidade($uf)
    {
        $sql = $this->pdo->prepare("select * from tb_cidades where uf = :uf");
        $sql->bindvalue(":uf",$uf);
        $sql->execute();

        if($sql->rowCount()>0){
            $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $dados;
    }

    public function cidades(){

        $sql = $this->pdo->prepare("select * from tb_cidades");
        $sql->execute();

        if($sql->rowCount()>0){
            $dados = $sql->fetchAll();
        }
        return $dados;
    }
}
