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
    <script defer src="js/script.js"></script>
    <!-- fim da integração do datatable -->

    <title>Listagem de Famílias</title>

</head>

<body>
    <div class="d-flex flex-nowrap ">

        <!--Sidebar-->

        <div class="d-flex flex-column flex-shrink-0  p-3 text-bg-dark" style="width: 280px; height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">

                <span class="fs-4"><i class="bi bi-bag-heart-fill"></i> Administrativo</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="consulta_familias.php" class="nav-link active" aria-current="page">
                        <i class="bi bi-people-fill"></i>
                        Lista de Famílias
                    </a>
                </li>
                <li>
                    <a href="consulta_produtos.php" class="nav-link text-white">
                        <i class="bi bi-basket-fill"></i>
                        Lista de Produtos/Estoque
                    </a>
                </li>
                <li>
            <a href="cadastro_produtos.php" class="nav-link text-white">
                <i class="bi bi-basket-fill"></i>
                Cadastrar Produtos
            </a>
        </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://avatars.githubusercontent.com/u/6980543?s=40&v=4" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Eduardo</strong>
                </a>
            </div>
        </div>

        <!--fim da div sidebar-->

        <!--inicio div tabela-->

        <div class="container w-60 pt-5">
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
                        <th>Editar</th>
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Eduardo Vieira
                        </td>
                        <td>
                            <button class="btn btn-danger d-inline-flex align-items-center " type="button" data-bs-toggle="modal" data-bs-target="#aprova">
                                <i class="bi bi-cart-x-fill"></i>
                            </button>
                        </td>
                        <td class="align-itens-center">
                            <button class="btn btn-primary d-inline-flex align-items-center" type="button">
                                <i class="bi bi-plus-circle-fill"></i>
                            </button>
                            <input type="text" class="col-sm-3 col-form-label form-control-sm" aria-label="pontos" aria-describedby="ponto" value=350>
                            <button class="btn btn-danger d-inline-flex align-items-center" type="button">
                                <i class="bi bi-dash-circle-fill"></i>
                            </button>
                        </td>
                        <td>
                            31/03/2023
                        </td>
                        <td>
                            01/04/2023
                        </td>
                        <td>
                            <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exclui">
                                <i class="bi bi-x-circle-fill"></i>
                            </a>
                        </td>
                        <td>
                            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>Aprovar</th>
                        <th>Pontos</th>
                        <th>Cadastrado em</th>
                        <th>Aprovado em</th>
                        <th>Excluir</th>
                        <th>Editar</th>
                        <th>Visualizar</th>
                    </tr>
                </tfoot>
            </table>
            <!-- Fim da DataTable -->

            <!-- modal. ao clicar em visualizar ou editar aparece o modal com o cadastro completo-->
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Informações</h4>
                        </div>
                        <div class="modal-body" id="carrega_cadastro">

<?php
//agora ta improvisado. fazer isso com load do jquery com o id do cadastro
//precisa enviar uma variavel para verificar se é vizualisar ou editar
 include("mostra_edita_familia.php")
 ?>

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