<?php

namespace app\controller;

/*não entendi porque não funcionou os uses
use app\model\Cadastro;
use \app\DAO\Conexao;
use \app\DAO\CadastroDao; */

include_once"../model/Cadastro.php";
include_once"../DAO/CadastroDao.php";
include_once"../DAO/Conexao.php";

if (isset($_POST['idcadastro'])) {

    $id = filter_var($_POST['idcadastro'], FILTER_SANITIZE_NUMBER_INT);
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
