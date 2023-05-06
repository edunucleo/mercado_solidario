<?php
namespace app\controller;

use \app\model\Cadastro;
use \app\model\Produto;
use \app\model\Marca;
use \app\DAO\Conexao;
use \app\DAO\CadastroDao;
use \app\DAO\ProdutoDao;
use \app\DAO\MarcaDao;

$id = $_POST['id'];

switch ($_POST['formulario']) {
    case 'cadastro':
        $cadastroDao = new \app\DAO\CadastroDao();
        $cadastroDao->delete($id);
        break;
    case 'produto':
        $produtoDao = new \app\DAO\ProdutoDao();
        $produtoDao->delete($id);
        break;
    case 'marca':
        $marcaDao = new \app\DAO\MarcaDao();
        $marcaDao->delete($id);
        break;

    default:
        # code...
        break;
}
