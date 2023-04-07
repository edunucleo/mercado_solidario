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

$cadastroDao = new \app\DAO\CadastroDao();
$cadastroDao->read($id);
foreach ($cadastroDao->read($id) as $cadastro) :
?>
    <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <td><strong>Nome Completo</strong></td>
            </tr>
            <tr>
                <td><?php echo $cadastro['nome']; ?></td>
            </tr>
            <tr>
                <td><strong>E-mail</strong></td>
            </tr>
            <tr>
                <td><?php echo $cadastro['email']; ?></td>
            </tr>
            <tr>
                <td colspan="2"><strong>Endereço</strong></td>
            </tr>
            <tr>
                <td><?php echo $cadastro['endereco']; ?></td>
            </tr>
            <tr>
                <td><strong>Sua família participa de algum Programa Social de auxílio do governo? Qual?</strong></td>
            </tr>
            <tr>
                <td><?php echo $cadastro['auxilio']; ?></td>
            </tr>
            <tr>
                <td><strong>Data de Nascimento</strong></td>
            </tr>
            <tr>
                <td><?php echo $cadastro['data_nasc']; ?></td>
            </tr>
            <tr>
                <td><strong>Celular</strong></td>
            </tr>
            <tr>
                <td><?php echo $cadastro['telefone']; ?></td>
            </tr>
            <tr>
                <td><strong>Qual é a renda financeira mensal da família?</strong></td>
            </tr>
            <tr>
                <td><?php echo $cadastro['renda']; ?></td>
            </tr>
            <tr>
                <td><strong>Quantas pessoas moram com você? Coloque o nome e idade: (inclusive crianças e bebês)</strong></td>
            </tr>
            <tr>
                <td><?php echo $cadastro['moradores']; ?></td>
            </tr>
            <tr>
                <td><strong>Ao preencher este formulário você concorda com os termos e política do Projeto Casa do Pão, e autoriza a divulgação da sua imagem para depoimentos e registros do Projeto?</strong></td>
            </tr>
            <tr>
                <td><?php echo $cadastro['termos']; ?></td>
            </tr>
            <tr class="">
                <td><strong>Pontos</strong></td>
            </tr>
            <tr>
                <td><?php echo $cadastro['pontos']; ?></td>
            </tr>
            <tr>
                <td><strong>Aprovado</strong></td>
            </tr>
            <tr>
                <td>0</td>
            </tr>
        </tbody>
    </table>

    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        Editar
    </a>
<?php
endforeach;
?>