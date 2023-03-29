<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <!-- fim dos links do Bootstrap 5-->

    <!-- integrando o datatable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="js/script.js"></script>
    <!-- fim da integração do datatable -->

    <title>Listagem de Familias</title>

</head>
<body>
    <div class="container w-60 pt-5">
        <h1 class="pb-4">Listagem de Famílias</h1>
        <!-- Início da DataTable -->
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data Nasc.</th>
                <th>Celular</th>
                <th>Endereço</th>
                <th>Email</th>
                <th>Nº de Moradores</th>
                <th>Programa Social</th>
                <th>Renda Mensal</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
                <td>$320,800</td>
                <td>$320,800</td>
                <td><a href="" class="btn btn-danger">Excluir</a></td>
                <td><a href="" class="btn btn-primary">Editar</a></td>
            </tr>
            
        </tbody>
        <tfoot>
            <tr>
                <th>Nome</th>
                <th>Data Nasc.</th>
                <th>Celular</th>
                <th>Endereço</th>
                <th>Email</th>
                <th>Nº de Moradores</th>
                <th>Programa Social</th>
                <th>Renda Mensal</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </tfoot>
        </table>
         <!-- Fim da DataTable -->
    </div>
</body>

</html>