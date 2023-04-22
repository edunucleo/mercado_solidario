$(document).ready(function () {

  $('#tabela').DataTable({
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
    }
  })

});

function carregar(id, formulario) {
  $("#carrega_cadastro").load(`edita_familia.php`,
    {
      id: id,
      formulario: formulario
    }
  );
}

function excluir(id, formulario) {

  decisao = confirm('Deseja realmente excluir?')

  if (decisao) {
    //colocar ajax aqui
    console.log('foi');
  }
  else
    return false;

}
function atualizarPontos(id, pontos, formulario) {

  decisao = confirm('Deseja realmente atualizar Pontos?')

  if (decisao) {
    //colocar ajax aqui
    console.log('foi');
  }
  else
    return false;
}
function aprovar(id, formulario) {

  decisao = confirm('Deseja realmente Aprovar?')

  if (decisao) {
    //colocar ajax aqui
    console.log('foi');
  }
  else
    return false;

}



