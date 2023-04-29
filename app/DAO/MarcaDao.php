<?php

namespace app\DAO;

use \app\model\Marca;

class MarcaDao extends Marca{

    public function create(Marca $m){

        $sql = 'INSERT INTO `marca` (`idmarca`, `nome`, `status`) VALUES (NULL, ?, ?);';

        $stmt = Conexao::conecta()->prepare($sql);
        $stmt ->bindValue(1,$m->getNome());
        $stmt ->bindValue(1,$m->getStatus());
        $stmt->execute();

    }
    
    public function read($idMarca){

        $sql = 'SELECT * FROM `marca` WHERE `idmarca` = ?;';
        
        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->bindValue(1, $idMarca);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt-> fetchAll(\PDO::FETCH_ASSOC);
            return $resultado[0];
        else:
            return [];
        endif;


    }
    public function listAll(){

        $sql = 'SELECT * FROM `marca`';

        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt-> fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return [];
        endif;

    }

    public function update(Marca $m){

        $sql = "UPDATE `marca` 
        SET `nome` = ?, 
        `status` = ? 
        WHERE `marca`.`idmarca` = ?;";


        $stmt = Conexao::conecta()->prepare($sql);
        $stmt ->bindValue(1,$m->getNome());
        $stmt ->bindValue(2,$m->getStatus());
        $stmt ->bindValue(3,$m->getIdMarca());

        $stmt->execute();
        
    }
    public function delete($idMarca){

        $sql='DELETE FROM marca WHERE idmarca=?';
        
        $stmt = Conexao::conecta()->prepare($sql);
        $stmt->bindValue(1,$idMarca);
        $stmt->execute();
    }
}