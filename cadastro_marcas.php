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
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/features/">

    <title>Cadastro de Marcas</title>

     <!-- Css interno para alterar valores default do Bootstrap-->
     <style type="text/css">
     .voltar:hover {
            
            background-color: #ffc107;
            border-radius: 5px;
            transition: background-color 0.5s ease;
            padding: 5px;
        }
        /* Para mudar a cor de fundo da seleção */
        ::selection {
        background-color: #ffc107;
        }

        /* Para mudar a cor do texto selecionado */
        ::selection {
        color: #ffc107;
        }

        /* Para mudar a cor de fundo e do texto da seleção ao mesmo tempo */
        ::selection {
        background-color: #ffc107;
        color: #000;
        }

        /* Altera a cor da borda quando o input está em foco */
        .form-control:focus { box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25); /* opcional: adiciona uma sombra ao redor do input */ }

        .form-label:focus { box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25); }

        .form-select:focus { box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25); }

        select option:hover {background-color: #fff; /* Substitua pela cor desejada */}


        /* Altera a cor da bolinha do range */
        .form-range::-webkit-slider-thumb {
        background-color: #ffc107; /* substituir pela cor desejada */
        border-color: #ffc107; /* substituir pela cor desejada */
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25); 
        }

        .form-range::-moz-range-thumb {
        background-color: #ffc107; /* substituir pela cor desejada */
        border-color: #ffc107; /* substituir pela cor desejada */
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25); 
        }

        .form-range::-ms-thumb {
        background-color: #ffc107; /* substituir pela cor desejada */
        border-color: #ffc107; /* substituir pela cor desejada */
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25); 
        }

        /* Altera a cor da sombra da borda da bolinha do form-range quando selecionado */
        .form-range::-webkit-slider-thumb:active {
        background-color: #ffc107;
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);  /* substituir pela cor desejada */
        }

        .form-range::-moz-range-thumb:active {
        background-color: #ffc107;
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);  /* substituir pela cor desejada */
        }

        .form-range::-ms-thumb:active {
        background-color: #ffc107;
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25); 
        }

    </style>

</head>
<body>
   
    <div class="container w-50 pt-5">
    <a href="menu.php" class="text-decoration-none text-dark voltar">Voltar ao Menu</a>
        <h1 class="pb-5 pt-5">Cadastro de Marcas</h1>
        <form action="action_marcas.php" method="POST">

            <div class="form-floating mb-3">
                <input type="text" class="form-control focus border-warning" id="nome" placeholder="text">
                <label for="nome">Nome da Marca</label>
            </div>

            <div class="form-floating mb-3" id="status" >
                <select class="form-select focus border-warning" name="status" id="status" aria-label="Floating label select example">
                    <option selected>Selecione o Status</option>
                    <option value="1">Ativo</option>
                    <option value="2">Inativo</option>
                </select>
                <label for="marca">Clique aqui</label>
            </div>

            <!-- Botões -->
            <div class="col-12 pt-2">
                <button type="submit" class="btn btn-warning">Cadastrar Marca</button>
                <button type="reset" class="btn btn-dark">Cancelar</button>
                <button class="btn btn-dark"><a href="cadastro_produtos.php" class="text-decoration-none text-light">Cadastrar Produto</a></button>
            </div>

        </form>


    </div>

</body>

</html>