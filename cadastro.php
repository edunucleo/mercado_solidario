<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jquery -->
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Bootstrap 5 links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- fim dos links do Bootstrap 5-->

    <!-- integrando o datatable -->
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <!-- fim da integração do datatable -->


    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/script.js"></script>

    <title>INSCRIÇÃO MERCADO SOLIDÁRIO</title>

</head>

<body>

    <?php
   $msg =  isset($_GET['msg'])?$_GET['msg']:'';
   
    if ($msg !='') {
        echo '  <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">' . $msg . '!</h4>
                </div> ';
    }
    ?>

    <div class="container">

        <h2 class="text-center">INSCRIÇÃO MERCADO SOLIDÁRIO</h2>
        <p>
            Este formulário tem o objetivo de cadastrar e selecionar pessoas que serão contempladas com compras mensais do Mercado Solidário Casa do Pão.
        </p>
        <p> *Importante:</p>

        <ol>
            <li> O Mercado Solidário Casa do Pão tem o objetivo de ajudar as famílias que estejam passando por dificuldades e precisam de auxílio com alimentação neste momento de crise, ocasionada pela pandemia do novo coronavírus (Covid-19).</li>
            <li> Os itens principais serão para alimentação básica, como; Arroz, feijão, açúcar, óleo, macarrão, café, farinha e leite. Porém receberemos doações de outros itens que poderão fazer parte da sua compra.</li>
            <li> Entraremos em contato com as famílias selecionadas para o Projeto Casa do Pão por ligação ou Whatsapp, caso não tenha celular, passar o contato de um familiar. As compras serão mensais e cada família terá sua pontuação de acordo com a avaliação da nossa equipe ao preencher todo o formulário.</li>
            <li> Caso seu formulário seja aprovado, você poderá realizar suas compras durante três meses, depois desse disso, um novo formulário deverá ser preenchido, caso necessite renovação.</li>
        </ol>

        <p>
            Qualquer dúvida, entrar em contato pelo Whatssapp (15) 99699-7979

            </br> Obrigado!
        </p>
        <form class="row g-3 needs-validation" novalidate method="post" action="processa.php">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nome" placeholder="Nome Completo" name="nome" required>
                <label for="floatingInput">Nome</label>
                <div class="invalid-feedback">
                    Preencha seu nome.
                </div>
            </div>
            <br />
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Data de Nascimento" id="data_nasc" name="data_nasc" required>
                            <label for="floatingInput">Data de Nascimento</label>
                            <div class="invalid-feedback">
                                Preecha a Data de Nascimento
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Telefone" name="celular">
                            <label for="floatingInput">Telefone</label>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="endereco" placeholder="Endereço" name="endereco" required>
                <label for="floatingInput">Endereço</label>
                <div class="invalid-feedback">
                    Preencha o Endereço
                </div>
            </div>
            <br />
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
                <label for="floatingInput">E-mail</label>
            </div>
            <br />
            <div class="form-group">
                <div class="row">
                    <div class="col col-md-6">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="moradores" required>
                                <option selected disabled value="">Escolha...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10 ou +</option>
                            </select>
                            <label for="floatingSelect">Quantas pessoas moram com você?(incluindo criaças e bebês)</label>
                            <div class="invalid-feedback">
                                Selecione quantas pessoas moram com você
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="Insira aqui o nome e a idade das pessoas que moram com você" name="nomes_moradores" required>
                            <label for="floatingInput">Insira aqui o nome e a idade das pessoas que moram com você</label>
                            <div class="invalid-feedback">
                                Preecha o nome e a idade das pessoas que moram com você
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Sua família participa de algum Programa Social de auxílio do governo? Qual?" name="auxilio" required>
                            <label for="floatingInput">Sua família participa de algum Programa Social de auxílio do governo? Qual?</label>
                            <div class="invalid-feedback">
                                Preencha este campo. Caso não participe digite "Não"
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="renda" required>
                                <option selected disabled value="">Escolha...</option>

                                <option value="<1">Menos de 1 salário mínimo</option>
                                <option value="<=2">Até 2 salários mínimos</option>
                                <option value="<=5">Até 5 salários mínimos</option>
                                <option value=">5">Mais de 5 salários mínimos</option>
                            </select>
                            <label for="floatingSelect">Qual é a renda financeira mensal da sua família?</label>
                            <div class="invalid-feedback">
                                Selecione qual renda que se encaixa próximo da sua
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            Ao preencher este formulário você concorda com os termos e política do Projeto Casa do Pão, e autoriza a divulgação da sua imagem para depoimentos e registros do Projeto?
            <br /><br />
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                <label class="form-check-label" for="flexCheckDefault">
                    Concordar
                </label>
                <div class="invalid-feedback">
                    Concorde com os Termos
                </div>
            </div>

            <br />
            <input type="hidden" name="formulario" value="cadastro">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

    </div>
</body>

</html>