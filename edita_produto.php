<?php
require_once 'vendor/autoload.php';

$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

if (isset($_POST['id']) && $_POST['id'] != 0) {

    $produtoDao = new \app\DAO\ProdutoDao();
    $produto = $produtoDao->read($id);
}
?>
<form class="row g-3 needs-validation" novalidate method="post" action="<?php echo $_POST['id'] != 0 ? 'processa_edita.php' : 'processa.php'; ?>">

    <div class="form-group">
        <div class="row">
            <div class="col-8">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nome" placeholder="Nome Completo" name="nome" value="<?php echo $_POST['id'] != 0 ? $produto['nome'] : ''; ?>" name="nome" required>
                    <label for="floatingInput">Nome do Produto</label>
                    <div class="invalid-feedback">
                        Nome do Produto.
                    </div>
                </div>

            </div>
            <div class="col-4">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="idMarca">
                        <?php
                        if ($_POST['id'] != 0) {
                            $marcaDao1 = new \app\DAO\MarcaDao();
                            $marca1 = $marcaDao1->read($produto['idmarca']);
                        ?>

                            <option value=" <?php echo $marca1['idmarca']; ?>" selected> <?php echo $marca1['nome']; ?></option>

                            <?php
                        }
                        $marcaDao = new \app\DAO\MarcaDao();
                        $marcaDao->listAll();

                        foreach ($marcaDao->listAll() as $marca) :
                            if ($marca['idmarca'] != $marca1['idmarca']) {
                            ?>
                                <option value=" <?php echo $marca['idmarca']; ?>"> <?php echo $marca['nome']; ?></option>
                        <?php
                            }
                        endforeach;
                        ?>

                    </select>
                    <label for="floatingSelect">Selecione a marca do produto</label>
                </div>

            </div>
        </div>
    </div>
    <br />

    <div class="col">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?php echo $_POST['id'] != 0 ? $produto['quantidade_estoque'] : ''; ?>" name="qtdeEstoque">
            <label for="nome">Em Estoque</label>
        </div>
    </div>
    <div class="col">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?php echo $_POST['id'] != 0 ? $produto['quantidade_minima'] : ''; ?>" name="qtdeMinima">
            <label for="nome">Mínima</label>
        </div>
    </div>
    <div class="col">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?php echo $_POST['id'] != 0 ? $produto['quantidade_pontos'] : ''; ?>" name="pontos">
            <label for="nome">Pontos</label>
        </div>
    </div>

    <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
    <input type="hidden" name="formulario" value="produto">
    <button type="submit" class="btn btn-primary" >

        <?php

        if ($id == 0 || $id == null) {
            echo 'Gravar';
        } else {
            echo 'Editar';
        }
        ?>

    </button>

</form>

<script>
    (() => {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach((form) => {
            form.addEventListener('submit', (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>