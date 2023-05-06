<?php

require_once 'vendor/autoload.php';

require_once 'integra.php';

if (isset($_POST['idCad'])) {

$id = filter_var($_POST['idCad'], FILTER_SANITIZE_NUMBER_INT);

$cadastroDao = new \app\DAO\CadastroDao;
$cadastroDao->aprova($id);
}