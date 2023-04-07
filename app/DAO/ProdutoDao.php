<?php

namespace app\DAO;


class ProdutoDao{

    public function create(Produto $p){

        $sql = 'INSERT INTO `produtos` (`idproduto`, `nome`, `idmarca`, `quantidade_estoque`, `quantidade_minima`, `quantidade_pontos`) VALUES (NULL, ?, ?, ?, ?, ?);';

        $stmt = Conexao::conecta()->prepare($sql);
        $stmt ->bindValue(1,$p->getNome());
        $stmt ->bindValue(2,$p->getIdMarca());
        $stmt ->bindValue(3,$p->getQtdeEstoque());
        $stmt ->bindValue(4,$p->getQtdeMinima());
        $stmt ->bindValue(5,$p->getQtdePontos());

        $stmt->execute();

    }

    public function read($idProduto){

        $sql = 'SELECT * FROM `produtos` WHERE `produto`.`idproduto` = ?;';
        
        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->bindValue(1, $idProduto);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt-> fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;


    }

    public function listAll(){

        $sql = 'SELECT * FROM `produtos`';

        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt-> fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;

    }

    public function update(Produto $p){

        $sql = "UPDATE `produtos` SET 
        `nome` = ?, 
        `idmarca` = ?, 
        `quantidade_estoque` = ?, 
        `quantidade_minima` = ?, 
        `quantidade_pontos` = ? 
        WHERE `produtos`.`idproduto` = ?;";


        $stmt = Conexao::conecta()->prepare($sql);
        $stmt ->bindValue(1,$p->getNome());
        $stmt ->bindValue(2,$p->getIdMarca());
        $stmt ->bindValue(3,$p->getQtdeEstoque());
        $stmt ->bindValue(4,$p->getQtdeMinima());
        $stmt ->bindValue(5,$p->getQtdePontos());
        $stmt ->bindValue(6,$p->getIdproduto());

        $stmt->execute();
        
    }
    public function delete($idProduto){

        $sql='DELETE FROM produtos WHERE idproduto=?';
        
        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->bindValue(1,$idProduto);
        $stmt->execute();

    }
}