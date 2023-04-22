<?php

namespace app\controller;

require_once "../model/Cadastro.php";
require_once "../DAO/Conexao.php";
require_once "../DAO/CadastroDAO.php";

if (isset($_POST['id'])) {

    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    $cadastroDao = new \app\DAO\CadastroDao;
    $cadastroDao->aprova($id);
}

