<?php
require_once 'vendor/autoload.php';

require_once 'integra.php';


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

            <a href="cadastro.php" class="btn btn-primary">Cadastrar Família</a>

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
                                <button class="btn <?php echo $cadastro['data_aprovacao'] == null || $cadastro['data_aprovacao'] == '00/00/0000' ? 'btn-danger' : 'btn-success' ?> d-inline-flex align-items-center " type="button" onclick="aprovar(<?php echo $cadastro['id']; ?>)">

                                    <i class="bi <?php echo $cadastro['data_aprovacao'] == null ? 'bi-cart-x-fill' : 'bi-cart-check-fill' ?>"></i>
                                </button>
                            </td>
                            <td>
                                <?php echo $cadastro['pontos']; ?>
                            </td>
                            <td>
                                <?php echo $cadastro['data_cadastro']; ?>
                            </td>
                            <td>
                                <?php echo $cadastro['data_aprovacao']; ?>
                            </td>
                            <td>
                                <button class="btn btn-danger" onclick="excluir(<?php echo $cadastro['id']; ?>,'cadastro')">
                                    <i class="bi bi-x-circle-fill"></i>
                                </button>
                            </td>
                            <td>
                                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastroFamilia" onclick="carrega(<?php echo $cadastro['id']; ?>,'cadastro')">
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
                        <div class="modal-body" id="carrega">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div><!--fim da principal-->

</body>
</body>

</html>