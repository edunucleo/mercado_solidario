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
                <i class="bi bi-people"></i>
                <span class="fs-4">Lista de Famílias</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#familias"></use></svg>
                    Lista de Famílias
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                    Lista de produtos/Estoque
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
                    <li><hr class="dropdown-divider"></li>
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
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Eduardo Vieira</td>
                    <td><button class="btn btn-primary d-inline-flex align-items-center" type="button">
                            <svg class="bi ms-1" width="20" height="20"><use xlink:href="#arrow-right-short"></use></svg>
                        </button></td>
                    <td>
                        <button class="btn btn-primary d-inline-flex align-items-center" type="button">
                            <svg class="bi ms-1" width="20" height="20"><use xlink:href="#arrow-right-short"></use></svg>
                        </button>
                        350
                        <button class="btn btn-primary d-inline-flex align-items-center" type="button">
                            <svg class="bi ms-1" width="20" height="20"><use xlink:href="#arrow-right-short"></use></svg>
                        </button>
                    </td>
                    <td><a href="" class="btn btn-danger">Excluir</a></td>
                    <td><a href="" class="btn btn-primary">Editar</a></td>
                </tr>
                
            </tbody>
            <tfoot>
            <tr>
                    <th>Nome</th>
                    <th>Aprovar</th>
                    <th>Pontos</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </tfoot>
            </table>
            <!-- Fim da DataTable -->
            </div>
        

</div><!--fim da principal-->
</body>

</html>