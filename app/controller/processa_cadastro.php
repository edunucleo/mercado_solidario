<?php

require_once 'vendor/autoload.php';

if (isset($_POST['idcadastro'])) {
    $id = filter_var($_POST['idcadastro'], FILTER_SANITIZE_NUMBER_INT);
}

//filter_var ( $smaller, FILTER_SANITIZE_STRING);
/* teste cadastro
$cadastro = new \app\model\Cadastro();
$cadastro->setNome('teste pdo1');
$cadastro->setEmail('teste@pdo');
$cadastro->setEndereco('rua teste pdo');
$cadastro->setAuxilio('sim');
$cadastro->setDataNasc('2015/10/10');
$cadastro->setTelefone('15-99600-8878');
$cadastro->setRenda(500);
$cadastro->setMoradores(2);
$cadastro->setTermos(1);
$cadastro->setDataCadastro('2015/10/10');
$cadastro->setDataAprovacao('2015/10/10');
$cadastro->setPontos(450);

$cadastroDao = new \app\model\CadastroDao();
$cadastroDao->create($cadastro);
*/