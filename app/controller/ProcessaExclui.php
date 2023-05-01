<?php
namespace app\controller;

require_once "../model/Cadastro.php";
require_once "../model/Produto.php";
require_once "../model/Marca.php";
require_once "../DAO/Conexao.php";
require_once "../DAO/CadastroDAO.php";
require_once "../DAO/ProdutoDao.php";
require_once "../DAO/MarcaDao.php";
/*use app\DAO\CadastroDao;
use app\DAO\MarcaDao;
use app\DAO\ProdutoDao;*/

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
