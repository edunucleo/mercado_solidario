<?php
require_once 'vendor/autoload.php';

if (isset($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
}

$cadastroDao = new \app\DAO\CadastroDao();

if (isset($id)) {
    $cadastroDao->read($id);
    foreach ($cadastroDao->read($id) as $cadastro) :

?>
        <form class="row g-3 needs-validation" novalidate method="post" action="app/controller/ProcessaEdita.php">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nome" placeholder="Nome Completo" name="nome" value="<?php echo $cadastro['nome']; ?>" name="nome" required>
                <label for="floatingInput">Nome Completo</label>
                <div class="invalid-feedback">
                    Preencha seu nome.
                </div>
            </div>
            <br />
            <div class="form-floating mb-3">
                <input type="email" class="form-control " id="floatingInput" placeholder="E-mail" value="<?php echo $cadastro['email']; ?>" name="email">
                <label for="nome">E-Mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?php echo $cadastro['endereco']; ?>" name="endereco" required>
                <label for="nome">Endereço</label>
                <div class="invalid-feedback">
                    Preencha seu Endereço.
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?php echo $cadastro['auxilio']; ?>" name="auxilio">
                <label for="nome">Sua família participa de algum Programa Social de auxílio do governo? Qual?</label>
                <div class="invalid-feedback">
                    Preencha este campo. Caso não participe digite "Não"
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?php echo $cadastro['data_nasc']; ?>" name="data_nasc" required>
                            <label for="nome">Data de Nascimento</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?php echo $cadastro['telefone']; ?>" name="celular">
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
                            <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?php echo $cadastro['renda']; ?>" name="renda">
                            <label for="nome">Qual é a renda financeira mensal da família?</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?php echo $cadastro['moradores']; ?>" name="moradores">
                            <label for="nome">Quantas pessoas moram com você? Coloque o nome e idade: (inclusive crianças e bebês)</label>
                        </div>
                    </div>
                </div>
            </div>
            <br />

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control " id="floatingInput" placeholder="text" value="<?php echo $cadastro['data_aprovacao']; ?>" name="data_aprovacao" readonly>
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
                            <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?php echo $cadastro['pontos']; ?>" name="pontos" <?php echo isset($cadastro['data_aprovacao'])?'':'readonly';?>>
                            <label for="nome">Pontos</label>
                        </div>
                    </div>
                </div>
            </div>
            <br />

    <?php
    endforeach;
}
    ?>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="hidden" name="formulario" value="cadastro">
    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        Editar
    </button>

        </form>