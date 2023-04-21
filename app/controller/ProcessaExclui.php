<?php
namespace app\controller;

use app\DAO\CadastroDao;
use app\DAO\MarcaDao;
use app\DAO\ProdutoDao;

$id = $_POST['id'];

switch ($_POST['formulario']) {
    case 'cadastro':
        $cadastroDao = new CadastroDao();
        $cadastroDao->delete($id);
        break;
    case 'produto':
        $produtoDao = new ProdutoDao();
        $produtoDao->delete($id);
        break;
    case 'marca':
        $marcaDao = new MarcaDao();
        $cadastroDao->delete($id);
        break;

    default:
        # code...
        break;
}
