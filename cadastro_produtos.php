<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Cadastro de Produtos</title>

    <!-- Css interno para alterar valores default do Bootstrap-->
    <style type="text/css">
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
<body> <div class="d-flex flex-nowrap ">

<?php include_once"sidebar.php";?>

    <div class="container w-50 pt-5">
        <h1 class="pb-5 pt-5">Cadastro de Produtos</h1>
        <form>
            <div class="form-floating mb-3">
                <input type="text" class="form-control focus border-warning" id="floatingInput" placeholder="text">
                <label for="floatingInput">Nome do Produto</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select focus border-warning" id="floatingSelect" aria-label="Floating label select example">
                    <option selected>Selecione uma Marca</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <label for="floatingSelect">Clique aqui</label>
            </div>

            
            <div class="form-floating mb-3">
                <input type="number" class="form-control focus border-warning" id="floatingInput" placeholder="number">
                <label for="floatingInput">Quantidade em Estoque</label>
            </div>

            <div class="form-floating mb-3">
                <input type="number" class="form-control focus border-warning" id="floatingInput" placeholder="number">
                <label for="floatingInput">Quantidade Mínima de Estoque</label>
            </div>
            

            <div class="row g-2">
            <div class="col-md mb-4">
                <label for="customRange3" class="form-label focus border-warning  -webkit-slider-thumb -moz-range-thumb -ms-thumb ">Pontos do Produto</label>
                <input type="range" class="form-range" min="5" max="25" step="5" id="customRange3">
                <div id="rangeValue"></div>
                    <script>
                        // Seleciona o input range
                        const range = document.querySelector("#customRange3");
                        // Seleciona o elemento que exibirá o valor selecionado
                        const rangeValue = document.querySelector("#rangeValue");
                        // Atualiza o valor exibido ao mover o input range
                        range.addEventListener("input", function() {
                            rangeValue.innerText = range.value;
                        });
                    </script> 
            </div>
            </div>

            <!-- Botões -->
            <div class="col-12 pt-2">
                <button type="submit" class="btn btn-warning">Cadastrar Produto</button>
                <button type="reset" class="btn btn-dark">Cancelar</button>
            </div>

            
            
        </form>
    </div>
</body>

</html>