<?php

require_once 'vendor/autoload.php';

require_once 'integra.php';

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