<?php
require_once 'vendor/autoload.php';

$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

if (isset($_POST['id']) && $_POST['id'] != 0) {

    $marcaDao = new \app\DAO\MarcaDao();
    $marca = $marcaDao->read($id);
}
?>
<form class="row g-3 needs-validation" novalidate method="post" action="<?php echo $_POST['id'] != 0 ? 'processa_edita.php' : 'processa.php'; ?>">

        <div class="form-group">
            <div class="row">
                <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" value="<?php echo $_POST['id'] != 0 ? $marca['nome'] : ''; ?>" name="nome" required>
                    <label for="floatingInput">Nome da Marca</label>
                    <div class="invalid-feedback">
                        prencha o Nome da Marca.
                    </div>
                </div>
                </div>
                <div class="col">
                <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nome" placeholder="Status" value="<?php echo $_POST['id'] != 0 ? $marca['status'] : ''; ?>" name="status">
                        <label for="floatingInput">Status da marca</label>
                        <div class="invalid-feedback">
                            preencha o Status.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
        <input type="hidden" name="formulario" value="marca">
        <button type="submit" class="btn btn-primary">

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