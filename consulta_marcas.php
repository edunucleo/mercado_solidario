<?php

require_once 'vendor/autoload.php';
//teste produtos
/*$produto = new \app\model\Produto();
$produto->setNome('produto111');
$produto->setIdMarca(1);
$produto->setQtdeEstoque(50);
$produto->setQtdeMinima(10);
$produto->setQtdePontos(5);

$produtoDao = new \app\model\ProdutoDao();
$produtoDao->create($produto);

// teste update produto
$produto = new \app\model\Produto();
$produto->setNome('produto111');
$produto->setIdMarca(1);
$produto->setQtdeEstoque(50);
$produto->setQtdeMinima(10);
$produto->setQtdePontos(5);

$produtoDao = new \app\model\ProdutoDao();
$produtoDao->update($produto);

 //delete
$produtoDao = new \app\model\ProdutoDao();
$produtoDao->delete(1);
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
    <script defer src="js/script.js"></script>
    <!-- fim da integração do datatable -->

    <title>Listagem de Famílias</title>

</head>

<body>
    <div class="d-flex flex-nowrap ">

        <?php include_once "sidebar.php"; ?>

        <div class="container w-60 pt-5">
            <!-- Início da DataTable -->
            <table id="tabela" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Status</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $marcaDao = new \app\model\MarcaDao();
                    $marcaDao->listAll();

                    foreach ($marcaDao->listAll() as $marca) :

                    ?>

                        <tr>
                            <td>
                                <?php echo $marca['nome']; ?>
                            </td>
                            <td>
                                <?php echo $marca['status']; ?>
                            </td>
                        </tr>

                    <?php
                    endforeach;
                    ?>
                </tbody>
                <tfoot>

                    <tr>
                        <th>Nome</th>
                        <th>Status</th>
                    </tr>

                </tfoot>
            </table>
            <!-- Fim da DataTable -->
        </div>
</body>

</html>