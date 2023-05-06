<?php

namespace app\controller;


use \app\model\Cadastro;
use \app\model\Produto;
use \app\model\Marca;
use \app\DAO\Conexao;
use \app\DAO\CadastroDao;
use \app\DAO\ProdutoDao;
use \app\DAO\MarcaDao;


class ProcessaEdita
{
    function editaCadastro($cadastro)
    {

        $cadastroDao = new \app\DAO\CadastroDao;
        $cadastroDao->update($cadastro);
        
    }
    function editaProduto($produto)
    {

        $produtoDao = new \app\DAO\ProdutoDao();
        $produtoDao->update($produto);
    }
    function editaMarca($marca)
    {

        $marcaDao = new \app\DAO\MarcaDao;
        $marcaDao->update($marca);
    }
}
