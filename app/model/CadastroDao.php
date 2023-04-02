<?php

namespace app\model;


class CadastroDao{

    public function create(Cadastro $c){

        $sql = 'INSERT INTO `cadastro` (`id`, `nome`, `email`, `endereco`, `auxilio`, `data_nasc`, `telefone`, `renda`, `moradores`, `termos`, `data_cadastro`, `data_aprovacao`, `pontos`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);';

        $stmt = Conexao::conecta()->prepare($sql);
        $stmt ->bindValue(1,$c->getNome());
        $stmt ->bindValue(2,$c->getEmail());
        $stmt ->bindValue(3,$c->getEndereco());
        $stmt ->bindValue(4,$c->getAuxilio());
        $stmt ->bindValue(5,$c->getDataNasc());
        $stmt ->bindValue(6,$c->getTelefone());
        $stmt ->bindValue(7,$c->getRenda());
        $stmt ->bindValue(8,$c->getMoradores());
        $stmt ->bindValue(9,$c->getTermos());
        $stmt ->bindValue(10,$c->getDataCadastro());
        $stmt ->bindValue(11,$c->getDataAprovacao());
        $stmt ->bindValue(12,$c->getPontos());

        $stmt->execute();

    }
    public function read(){

        $sql = 'SELECT * FROM `cadastro`';

        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt-> fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;


    }
    public function update(Cadastro $c){

    }
    public function delete($id){

    }
}