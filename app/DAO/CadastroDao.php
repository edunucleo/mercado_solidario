<?php

namespace app\DAO;

use app\model\Cadastro;
use app\DAO\Conexao;

class CadastroDao extends Cadastro{

    public function create(Cadastro $c){

        $sql = 'INSERT INTO `cadastro` (`id`, `nome`, `email`, `endereco`, `auxilio`, `data_nasc`, `telefone`, `renda`, `moradores`, `nomes_moradores`, `data_cadastro`, `data_aprovacao`, `pontos`) VALUES (NULL, ?, ?, ?, ?, STR_TO_DATE(?,"%d/%m/%Y"), ?, ?, ?, ?, ?, NULL, NULL);';

        $stmt = Conexao::conecta()->prepare($sql);
        $stmt ->bindValue(1,$c->getNome());
        $stmt ->bindValue(2,$c->getEmail());
        $stmt ->bindValue(3,$c->getEndereco());
        $stmt ->bindValue(4,$c->getAuxilio());
        $stmt ->bindValue(5,$c->getDataNasc());
        $stmt ->bindValue(6,$c->getTelefone());
        $stmt ->bindValue(7,$c->getRenda());
        $stmt ->bindValue(8,$c->getMoradores());
        $stmt ->bindValue(9,$c->getNomesMoradores());
        $stmt ->bindValue(10,date('Y-m-d'));

        $stmt->execute();

    }

    public function read($id){

        $sql = 'SELECT *,DATE_FORMAT(data_cadastro,"%d/%m/%Y") AS data_cadastro, DATE_FORMAT(data_aprovacao,"%d/%m/%Y") AS data_aprovacao, DATE_FORMAT(data_nasc,"%d/%m/%Y") AS data_nasc  FROM `cadastro` WHERE `cadastro`.`id` = ?;';
        
        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt-> fetch(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;


    }

    public function listAll(){

        $sql = 'SELECT *,DATE_FORMAT(data_cadastro,"%d/%m/%Y") AS data_cadastro, DATE_FORMAT(data_aprovacao,"%d/%m/%Y") AS data_aprovacao FROM `cadastro`';

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

        $sql = "UPDATE `cadastro` SET 
        `nome` = ?, 
        `email` = ?, 
        `endereco` = ?, 
        `auxilio` = ?, 
        `data_nasc` = STR_TO_DATE(?,\"%d/%m/%Y\"),
        `telefone` = ?,
        `renda` = ?,
        `moradores` = ?, 
        `nomes_moradores` = ?, 
        `data_cadastro` = STR_TO_DATE(?,\"%d/%m/%Y\"), 
        `data_aprovacao` = STR_TO_DATE(?,\"%d/%m/%Y\"), 
        `pontos` = ? 
        WHERE `cadastro`.`id` = ?;";

        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->bindValue(1, $c->getNome());
        $stmt->bindValue(2, $c->getEmail());
        $stmt->bindValue(3, $c->getEndereco());
        $stmt->bindValue(4, $c->getAuxilio());
        $stmt->bindValue(5, $c->getDataNasc());
        $stmt->bindValue(6, $c->getTelefone());
        $stmt->bindValue(7, $c->getRenda());
        $stmt->bindValue(8, $c->getMoradores());
        $stmt->bindValue(9, $c->getNomesMoradores());
        $stmt->bindValue(10, $c->getDataCadastro());
        $stmt->bindValue(11, $c->getDataAprovacao());
        $stmt->bindValue(12, $c->getPontos());
        $stmt->bindValue(13, $c->getId());

        $stmt->execute();
        
    }

    public function aprova($id){

        $sql='UPDATE `cadastro` 
        SET 
        `data_aprovacao` = NOW(),
        `pontos` = 450
        WHERE 
        `cadastro`.`id` = ?;';
        
        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }
    
    public function delete($id){

        $sql='DELETE FROM cadastro WHERE id=?';
        
        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();

    }
}