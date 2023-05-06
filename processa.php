<?php
require_once 'vendor/autoload.php';


switch ($_POST['formulario']) {
    case 'cadastro':


        $nome = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $endereco = filter_var($_POST['endereco'], FILTER_SANITIZE_SPECIAL_CHARS);
        $auxilio = filter_var($_POST['auxilio'], FILTER_SANITIZE_SPECIAL_CHARS);
        $dataNasc =  preg_replace("([^0-9/])", "", $_POST['data_nasc']);
        $telefone = filter_var($_POST['celular'], FILTER_SANITIZE_NUMBER_INT);
        $renda = filter_var($_POST['renda'], FILTER_SANITIZE_NUMBER_INT);
        $moradores = filter_var($_POST['moradores'], FILTER_SANITIZE_NUMBER_INT);
        $nomes_moradores = filter_var($_POST['nomes_moradores'], FILTER_SANITIZE_NUMBER_INT);

        $cadastro = new \app\model\Cadastro;

        $cadastro->setNome($nome);
        $cadastro->setEmail($email);
        $cadastro->setEndereco($endereco);
        $cadastro->setAuxilio($auxilio);
        $cadastro->setDataNasc($dataNasc);
        $cadastro->setTelefone($telefone);
        $cadastro->setRenda($renda);
        $cadastro->setMoradores($moradores);
        $cadastro->setNomesMoradores($nomes_moradores);

        $cadastroController = new \app\controller\ProcessaCadastra;

        $cadastroController->cadastraCadastro($cadastro);

        header('Location: cadastro.php?&msg=Sucesso no cadastro. Agora vamos avaliar seu cadastro e em breve entraremos em contato');
       
        break;
    case 'produto':


        $nome = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);
        $idMarca = filter_var($_POST['idMarca'], FILTER_SANITIZE_NUMBER_INT);
        $qtdeEstoque = filter_var($_POST['qtdeEstoque'], FILTER_SANITIZE_NUMBER_INT);
        $qtdeMinima = filter_var($_POST['qtdeMinima'], FILTER_SANITIZE_NUMBER_INT);
        $pontos = filter_var($_POST['pontos'], FILTER_SANITIZE_NUMBER_INT);

        $produto = new \app\model\Produto();
        $produto->setNome($nome);
        $produto->setIdMarca($idMarca);
        $produto->setQtdeEstoque($qtdeEstoque);
        $produto->setQtdeMinima($qtdeMinima);
        $produto->setQtdePontos($pontos);

        $cadastroController = new \app\controller\ProcessaCadastra;

        $cadastroController->cadastraProduto($produto);

        header('Location: consulta_produtos.php?&msg=Sucesso no cadastro do Produto ');

        break;
    case 'marca':


        $nome = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);
        $status = filter_var($_POST['status'], FILTER_SANITIZE_SPECIAL_CHARS);

        $marca = new \app\model\Marca;

        $marca->setNome($nome);
        $marca->setStatus($status);
        
        $cadastroController = new \app\controller\ProcessaCadastra;

        $cadastroController->cadastraMarca($marca);

        header('Location: consulta_marcas.php?&msg=Sucesso no cadastro da Marca ');

        break;

    default:
        # code...
        break;
}
