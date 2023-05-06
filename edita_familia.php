<?php
require_once 'vendor/autoload.php';

if (isset($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
}

$cadastroDao = new \app\DAO\CadastroDao();

if (isset($id)) {
    $cadastro = $cadastroDao->read($id);

?>
    <form class="row g-3 needs-validation" novalidate method="post" action="processa_edita.php">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nome" placeholder="Nome Completo" name="nome" value="<?= $cadastro['nome']; ?>" name="nome" required>
            <label for="floatingInput">Nome Completo</label>
            <div class="invalid-feedback">
                Preencha seu nome.
            </div>
        </div>
        <br />
        <div class="form-floating mb-3">
            <input type="email" class="form-control " id="floatingInput" placeholder="E-mail" value="<?= $cadastro['email']; ?>" name="email">
            <label for="nome">E-Mail</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?= $cadastro['endereco']; ?>" name="endereco" required>
            <label for="nome">Endereço</label>
            <div class="invalid-feedback">
                Preencha seu Endereço.
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?= $cadastro['auxilio']; ?>" name="auxilio">
            <label for="nome">Sua família participa de algum Programa Social de auxílio do governo? Qual?</label>
            <div class="invalid-feedback">
                Preencha este campo. Caso não participe digite "Não"
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?= $cadastro['data_nasc']; ?>" name="data_nasc" required>
                        <label for="nome">Data de Nascimento</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?= $cadastro['telefone']; ?>" name="celular">
                        <label for="nome">Celular</label>
                    </div>
                </div>
            </div>
        </div>
        <br />

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?= $cadastro['renda']; ?>" name="renda">
                        <label for="nome">Qual é a renda financeira mensal da família?</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?= $cadastro['moradores']; ?>" name="moradores">
                        <label for="nome">Quantas pessoas moram com você? </label>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nomes_moradores" placeholder="Nome e idade dos Moradore" name="nomes_moradores" value="<?= $cadastro['nomes_moradores']; ?>" required>
            <label for="floatingInput">Coloque o nome e idade: (inclusive crianças e bebês)</label>
            <div class="invalid-feedback">
                Preencha o Nome dos Moradores
            </div>
        </div>
        <br />

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control " id="floatingInput" placeholder="text" value="<?= $cadastro['data_aprovacao']; ?>" name="data_aprovacao" readonly>
                        <label for="nome">Aprovado em</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control " id="floatingInput" placeholder="text" value="<?php echo $cadastro['data_cadastro']; ?>" name="data_cadastro" readonly>
                        <label for="nome">Cadastrado em</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?php echo $cadastro['pontos']; ?>" name="pontos" <?php echo isset($cadastro['data_aprovacao']) ? '' : 'readonly'; ?>>
                        <label for="nome">Pontos</label>
                    </div>
                </div>
            </div>
        </div>
        <br />

    <?php
}
    ?>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="hidden" name="formulario" value="cadastro">
    <button type="submit" class="btn btn-primary">
        Editar
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
    <style>
        .form-floating:not(.form-control:disabled)::before {

            background-color: rgba(255, 255, 255, 0) !important;

        }
    </style>