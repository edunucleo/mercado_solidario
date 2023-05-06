<?php
namespace app\controller;

use \app\model\Cadastro; 
use \app\model\Produto;
use \app\model\Marca;
use \app\DAO\Conexao;
use \app\DAO\CadastroDao;
use \app\DAO\ProdutoDao;
use \app\DAO\MarcaDao;

class ProcessaCadastra {

    function cadastraProduto($produto)
{

        $produtoDao = new \app\DAO\ProdutoDao();
        $produtoDao->create($produto);
   
        
}

function cadastraCadastro($cadastro)
{


        $cadastroDao = new \app\DAO\CadastroDao();
        $cadastroDao->create($cadastro);

       
}
function cadastraMarca($marca)
{



        $marcaDao = new \app\DAO\MarcaDao;
        $marcaDao->create($marca);

        header('Location: ../../consulta_marcas.php?&msg=Sucesso no cadastro da Marca ');
    
}
}


/*switch ($_POST['formulario']) {
    case 'cadastro':
        cadastraCadastro();
        
        break;
    case 'produto':
        cadastraProduto($produto);
        break;
    case 'marca':
        cadastraMarca();
        break;

    default:
        # code...
        break;
}*/







