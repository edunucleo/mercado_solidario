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
function aprovar(id) {

  decisao = confirm('Deseja realmente Aprovar?')
  if (decisao) {
    var request = $.ajax({
      url: "app/controller/ProcessaAprova.php",
      method: "POST",
      data: { idCad: id },
      dataType: "html"
    });
    request.done(function (msg) {
      alert("Sucesso na Aprovação!!!");
    });
    request.fail(function (jqXHR, textStatus) {
      alert("falhou: " + textStatus);
    });

  }
  else {
    return false;
  }
}