<?php
require_once 'vendor/autoload.php';
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
/* teste update
$cadastro = new \app\model\Cadastro();
$cadastro->setId(3);
$cadastro->setNome('teste pdo333');
$cadastro->setEmail('teste@pdo2333');
$cadastro->setEndereco('rua teste pdo333');
$cadastro->setAuxilio('333');
$cadastro->setDataNasc('2015/10/13');
$cadastro->setTelefone('15-99600-8873');
$cadastro->setRenda(503);
$cadastro->setMoradores(3);
$cadastro->setTermos(3);
$cadastro->setDataCadastro('2015/10/13');
$cadastro->setDataAprovacao('2015/10/13');
$cadastro->setPontos(453);

$cadastroDao = new \app\model\CadastroDao();
$cadastroDao->update($cadastro);
*/
/* delete
$cadastroDao = new \app\model\CadastroDao();
$cadastroDao->delete(1);
*/
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jquery -->
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Bootstrap 5 links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- fim dos links do Bootstrap 5-->

    <!-- integrando o datatable -->
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <!-- fim da integração do datatable -->

    <script defer src="js/script.js"></script>

    <title>Listagem de Famílias</title>

</head>

<body>
    <div class="d-flex flex-nowrap ">

        <?php include_once('sidebar.php'); ?>

        <!--inicio div tabela-->

        <div class="container w-60 pt-5">

            <button type="button" class="btn btn-primary">Cadastrar Família</button>

            <!-- Início da DataTable -->
            <table id="tabela" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Aprovar</th>
                        <th>Pontos</th>
                        <th>Cadastrado em</th>
                        <th>Aprovado em</th>
                        <th>Excluir</th>
                        <th>Editar/Ver</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    $cadastroDao = new \app\DAO\CadastroDao();
                    $cadastroDao->listAll();

                    foreach ($cadastroDao->listAll() as $cadastro) :

                    ?>
                        <tr>
                            <td>
                                <?php echo $cadastro['nome']; ?>
                            </td>
                            <td>
                                <button class="btn btn-danger d-inline-flex align-items-center " type="button" data-bs-toggle="modal" data-bs-target="#aprova">
                                    <i class="bi bi-cart-x-fill"></i>
                                </button>
                            </td>
                            <td>
                                
                                <input type="text" class="col-sm-3 col-form-label form-control-sm" aria-label="pontos" aria-describedby="ponto" value=<?php echo $cadastro['pontos']; ?>>
                                <button class="btn btn-success d-inline-flex align-items-center" type="button">
                                    <i class="bi bi-check-circle-fill"></i>
                                </button>

                            </td>
                            <td>
                                <?php echo $cadastro['data_cadastro']; ?>
                            </td>
                            <td>
                                <?php echo $cadastro['data_aprovacao']; ?>
                            </td>
                            <td>
                                <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exclui">
                                    <i class="bi bi-x-circle-fill"></i>
                                </a>
                            </td>
                            <td>
                                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastroFamilia" onclick="carregarCadastro(<?php echo $cadastro['id']; ?>)">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>Aprovar</th>
                        <th>Pontos</th>
                        <th>Cadastrado em</th>
                        <th>Aprovado em</th>
                        <th>Excluir</th>
                        <th>Editar/Ver</th>
                    </tr>
                </tfoot>
            </table>
            <!-- Fim da DataTable -->

            <!-- modal. ao clicar em visualizar ou editar aparece o modal com o cadastro completo-->
            <!-- Modal -->
            <div class="modal fade" id="cadastroFamilia" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Informações</h4>
                        </div>
                        <div class="modal-body" id="carrega_cadastro">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div><!--fim da principal-->


    <!-- MODAL DE APROVAÇÃO DE CADASTRO-->
    <div class="modal fade" id="aprova" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Aprovação</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja aprovar esta Família?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Aprovar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DE exclusao-->
    <div class="modal fade" id="exclui" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Aprovação</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseja excluir esta Família?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Excluir</button>
                </div>
            </div>
        </div>
    </div>
</body>
</body>

</html>