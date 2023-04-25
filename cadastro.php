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

    <script defer src="js/script.js"></script>

    <title>INSCRIÇÃO MERCADO SOLIDÁRIO</title>

</head>

<body>

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
        <form>

            <div class="form-group">
                <input type="text" class="form-control" id="nome" placeholder="Nome Completo">
            </div>
            <br />
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Data de Nascimento" id="data_nasc">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Telefone">
                    </div>
                </div>
            </div>
            <br />
            <div class="form-group">
                <input type="text" class="form-control" id="endereco" placeholder="Endereço">
            </div>
            <br />
            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="E-mail">
            </div>
            <br />
            <div class="form-group">
                <div class="row">
                    <div class="col col-md-2">
                        <select class="form-select " aria-label="Default select example">
                            <option selected>Quantas pessoas moram com você?(incluindo criaças e bebês)</option>
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
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Insira aqui o nome e a idade das pessoas que moram com você">
                    </div>
                </div>
            </div>
            <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Sua família participa de algum Programa Social de auxílio do governo? Qual?">
    </div>
    <div class="form-group col-md-6">
    Qual é a renda financeira mensal da sua família?
      <label for="inputPassword4">Password</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
            
            <br />
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

    </div>
</body>

</html>