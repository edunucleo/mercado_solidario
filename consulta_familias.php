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
                <span class="fs-4">Lista de Famílias</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">

                        Lista de Famílias
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2"></use>
                        </svg>
                        Lista de Produtos/Estoque
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Eduardo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
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
                            <button class="btn btn-danger d-inline-flex align-items-center" type="button">
                                Não Aprovado
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary d-inline-flex align-items-center" type="button">
                                +
                            </button>
                            350
                            <button class="btn btn-danger d-inline-flex align-items-center" type="button">
                                -
                            </button>
                        </td>
                        <td>
                            31/03/2023
                        </td>
                        <td>
                            <a href="" class="btn btn-danger">Excluir</a>
                        </td>
                        <td>
                            <a href="" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Visualizar</a>
                        </td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>Aprovar</th>
                        <th>Pontos</th>
                        <th>Cadastrado em</th>
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
                        <div class="modal-body">

                            <table class="table table-striped table-bordered" >
                                <tbody>
                                    <tr >
                                        <td><strong>Nome Completo</strong></td>
                                    </tr>
                                    <tr >

                                        <td>edu4</td>
                                    </tr>
                                    <tr>
                                        <td ><strong>E-mail</strong></td>
                                    </tr>
                                    <tr >
                                        
                                        <td>edunucleo@gmail.com</td>
                                    </tr>
                                    <tr >
                                        <td colspan="2"><strong>Endereço</strong></td>
                                    </tr>
                                    <tr >
                                       
                                        <td>Rua Sto Antonio, 775 - cento - tatuí</td>
                                    </tr>
                                    <tr >
                                        <td ><strong>Sua família participa de algum Programa Social de auxílio do governo? Qual?</strong></td>
                                    </tr>
                                    <tr >
                                        
                                        <td>Bolsa família</td>
                                    </tr>
                                    <tr >
                                        <td ><strong>Data de Nascimento</strong></td>
                                    </tr>
                                    <tr >
                                       
                                        <td>02-03-2000</td>
                                    </tr>
                                    <tr >
                                        <td ><strong>Celular</strong></td>
                                    </tr>
                                    <tr >
                                        
                                        <td>15996008878</td>
                                    </tr>
                                    <tr>
                                        <td ><strong>Qual é a renda financeira mensal da família?</strong></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>&lt;1</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Quantas pessoas moram com você? Coloque o nome e idade: (inclusive crianças e bebês)</strong></td>
                                    </tr>
                                    <tr >
                                        
                                        <td>10</td>
                                    </tr>
                                    <tr >
                                        <td ><strong>Ao preencher este formulário você concorda com os termos e política do Projeto Casa do Pão, e autoriza a divulgação da sua imagem para depoimentos e registros do Projeto?</strong></td>
                                    </tr>
                                    <tr >
                                        
                                        <td>sim</td>
                                    </tr>
                                    <tr class="">
                                        <td ><strong>Pontos</strong></td>
                                    </tr>
                                    <tr >
                                        
                                        <td>0</td>
                                    </tr>
                                    <tr >
                                        <td ><strong>Aprovado</strong></td>
                                    </tr>
                                    <tr >
                                        <td>0</td>
                                    </tr>
                                </tbody>

                            </table>
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
</body>

</html>