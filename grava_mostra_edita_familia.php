<?php
require_once 'vendor/autoload.php';

if (isset($_POST['idcadastro'])) {
    $id = filter_var($_POST['idcadastro'], FILTER_SANITIZE_NUMBER_INT);
}

$cadastroDao = new \app\DAO\CadastroDao();

if (isset($id)) {
    $cadastroDao->read($id);
    foreach ($cadastroDao->read($id) as $cadastro) :

?>
        <form method="post" action="app/controller/processa_cadastro.php">

            <div class="form-floating mb-3">
                <input type="text" class="form-control focus border-warning" id="floatingInput" placeholder="text" value="<?php echo $cadastro['nome'];?>" name="nome">
                <label for="nome">Nome Completo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control focus border-warning" id="floatingInput" placeholder="text" value="<?php echo $cadastro['email']; ?>" name="email">
                <label for="nome">E-Mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control focus border-warning" id="floatingInput" placeholder="text" value="<?php echo $cadastro['endereco']; ?>"name="endereco">
                <label for="nome">Endereço</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control focus border-warning" id="floatingInput" placeholder="text" value="<?php echo $cadastro['auxilio']; ?>"name="auxilio">
                <label for="nome">Sua família participa de algum Programa Social de auxílio do governo? Qual?</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control focus border-warning" id="floatingInput" placeholder="text" value="<?php echo $cadastro['data_nasc']; ?>"name="data_nasc">
                <label for="nome">Data de Nascimento</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control focus border-warning" id="floatingInput" placeholder="text" value="<?php echo $cadastro['telefone']; ?>"name="celular">
                <label for="nome">Celular</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control focus border-warning" id="floatingInput" placeholder="text" value="<?php echo $cadastro['renda']; ?>" name="renda">
                <label for="nome">Qual é a renda financeira mensal da família?</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control focus border-warning" id="floatingInput" placeholder="text" value="<?php echo $cadastro['moradores']; ?>"name="moradores">
                <label for="nome">Quantas pessoas moram com você? Coloque o nome e idade: (inclusive crianças e bebês)</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control focus border-warning" id="floatingInput" placeholder="text" value="<?php echo $cadastro['termos']; ?>"name="termos">
                <label for="nome">Ao preencher este formulário você concorda com os termos e política do Projeto Casa do Pão, e autoriza a divulgação da sua imagem para depoimentos e registros do Projeto?</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control focus border-warning" id="floatingInput" placeholder="text" value="<?php echo $cadastro['data_aprovacao']; ?>"name="data_aprovacao">
                <label for="nome">Aprovado</label>
            </div>


    <?php
    endforeach;
}

    ?>
    <input type="hidden" name="idcadastro" value="<?php echo $id ?>">
    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        Editar
    </button>

        </form>