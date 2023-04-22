<?php

namespace app\controller;

require_once "../model/Cadastro.php";
require_once "../model/Produto.php";
require_once "../model/Marca.php";
require_once "../DAO/Conexao.php";
require_once "../DAO/CadastroDAO.php";
require_once "../DAO/ProdutoDao.php";
require_once "../DAO/MarcaDao.php";

/*use \app\model\Cadastro;
use \app\model\Produto;
use \app\model\Marca;
use \app\DAO\Conexao;
use \app\DAO\CadastroDao;
use \app\DAO\ProdutoDao;
use \app\DAO\MarcaDao;*/


switch ($_POST['formulario']) {
    case 'cadastro':
        editaCadastro();
        break;
    case 'produto':
        editaProduto();
        break;
    case 'marca':
        editaMarca();
        break;

    default:
        # code...
        break;
}


function editaCadastro()
{

    if (isset($_POST['id'])) {

        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $nome = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $endereco = filter_var($_POST['endereco'], FILTER_SANITIZE_SPECIAL_CHARS);
        $auxilio = filter_var($_POST['auxilio'], FILTER_SANITIZE_SPECIAL_CHARS);
        $dataNasc =  preg_replace("([^0-9/])", "", $_POST['data_nasc']);
        $telefone = filter_var($_POST['celular'], FILTER_SANITIZE_NUMBER_INT);
        $renda = filter_var($_POST['renda'], FILTER_SANITIZE_NUMBER_INT);
        $moradores = filter_var($_POST['moradores'], FILTER_SANITIZE_NUMBER_INT);
        $termos = filter_var($_POST['termos'], FILTER_SANITIZE_NUMBER_INT);
        $dataCadastro = preg_replace("([^0-9/])", "", $_POST['data_cadastro']);
        $dataAprovacao = preg_replace("([^0-9/])", "", $_POST['data_aprovacao']);
        $pontos = filter_var($_POST['pontos'], FILTER_SANITIZE_NUMBER_INT);

        $cadastro = new \app\model\Cadastro;

        $cadastro->setId($id);
        $cadastro->setNome($nome);
        $cadastro->setEmail($email);
        $cadastro->setEndereco($endereco);
        $cadastro->setAuxilio($auxilio);
        $cadastro->setDataNasc($dataNasc);
        $cadastro->setTelefone($telefone);
        $cadastro->setRenda($renda);
        $cadastro->setMoradores($moradores);
        $cadastro->setTermos($termos);
        $cadastro->setDataCadastro($dataCadastro);
        $cadastro->setDataAprovacao($dataAprovacao);
        $cadastro->setPontos($pontos);

        $cadastroDao = new \app\DAO\CadastroDao;
        $cadastroDao->update($cadastro);
    }
}

function editaProduto()
{

    if (isset($_POST['id'])) {

        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $nome = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);
        $idMarca = filter_var($_POST['idMarca'], FILTER_SANITIZE_NUMBER_INT);
        $qtdeEstoque = filter_var($_POST['qtdeEstoque'], FILTER_SANITIZE_NUMBER_INT);
        $qtdeMinima = filter_var($_POST['qtdeMinima'], FILTER_SANITIZE_NUMBER_INT);
        $pontos = filter_var($_POST['pontos'], FILTER_SANITIZE_NUMBER_INT);

        $produto = new \app\model\Produto();
        $produto->setIdProduto($id);
        $produto->setNome($nome);
        $produto->setIdMarca($idMarca);
        $produto->setQtdeEstoque($qtdeEstoque);
        $produto->setQtdeMinima($qtdeMinima);
        $produto->setQtdePontos($pontos);

        $produtoDao = new \app\DAO\ProdutoDao();
        $produtoDao->update($produto);
    }
}

function editaMarca()
{
    if (isset($_POST['id'])) {

        $idMarca = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $nome = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);
        $status = filter_var($_POST['status'], FILTER_SANITIZE_SPECIAL_CHARS);

        $marca = new \app\model\Marca;
        $marca->setIdMarca($idMarca);
        $marca->setNome($nome);
        $marca->setStatus($status);

        $marcaDao = new \app\DAO\MarcaDao;
        $marcaDao->update($marca);
    }
}
