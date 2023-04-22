<?php

namespace app\controller;

require_once "../model/Cadastro.php";
require_once "../DAO/Conexao.php";
require_once "../DAO/CadastroDAO.php";

if (isset($_POST['id'])) {

    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    $cadastro = new \app\model\Cadastro;

    $cadastro->setId($id);

    $cadastro->setDataAprovacao($dataAprovacao);
    $cadastro->setPontos($pontos);

    $cadastroDao = new \app\DAO\CadastroDao;
    $cadastroDao->update($cadastro);
}

