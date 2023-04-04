<?php

namespace app\model;

class Produto
{
    private $idproduto, $nome, $idMarca, $qtdeEstoque, $qtdeMinima, $qtdePontos;

    public function getIdproduto()
    {
        return $this->idproduto;
    }
    public function setIdProduto($idproduto)
    {
        return $this->idproduto = $idproduto;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        return $this->nome = $nome;
    }

    public function getIdMarca()
    {
        return $this->idMarca;
    }
    public function setIdMarca($idMarca)
    {
        return $this->idMarca = $idMarca;
    }

    public function getQtdeEstoque()
    {
        return $this->qtdeEstoque;
    }
    public function setQtdeEstoque($qtdeEstoque)
    {
        return $this->qtdeEstoque = $qtdeEstoque;
    }

    public function getQtdeMinima()
    {
        return $this->qtdeMinima;
    }
    public function setQtdeMinima($qtdeMinima)
    {
        return $this->qtdeMinima = $qtdeMinima;
    }

    public function getQtdePontos()
    {
        return $this->qtdePontos;
    }
    public function setQtdePontos($qtdePontos)
    {
        return $this->qtdePontos = $qtdePontos;
    }

}