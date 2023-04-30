<?php
require_once 'vendor/autoload.php';

if (isset($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
}

$produtoDao = new \app\DAO\ProdutoDao();

if (isset($id)) {

    $produtoDao->read($id);
    foreach ($produtoDao->read($id) as $produto) :

?>
        <form class="row g-3 needs-validation" novalidate method="post" action="app/controller/ProcessaEdita.php">

            <div class="form-group">
                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nome" placeholder="Nome Completo" name="nome" value="<?php echo $produto['nome']; ?>" name="nome" required>
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
                                $marcaDao1 = new \app\DAO\MarcaDao();
                                $marca1 = $marcaDao1->read($produto['idmarca']);
                                ?>

                                <option value=" <?php echo $marca1['idmarca']; ?>" selected> <?php echo $marca1['nome']; ?></option>

                                <?php
                                $marcaDao = new \app\DAO\MarcaDao();
                                $marcaDao->listAll();

                                foreach ($marcaDao->listAll() as $marca) :
                                    if($marca['idmarca']!=$marca1['idmarca']){
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
                    <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?php echo $produto['quantidade_estoque']; ?>" name="qtdeEstoque">
                    <label for="nome">Em Estoque</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?php echo $produto['quantidade_minima']; ?>" name="qtdeMinima">
                    <label for="nome">Mínima</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="text" value="<?php echo $produto['quantidade_pontos']; ?>" name="pontos">
                    <label for="nome">Pontos</label>
                </div>
            </div>


    <?php
    endforeach;
}
    ?>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="hidden" name="formulario" value="produto">
    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        Editar
    </button>

        </form>