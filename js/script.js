$(document).ready(function () {

  $('#tabela').DataTable({
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
    }
  })

});

$( function() {
  $( "#data_nasc" ).datepicker();
} );

function carregar(id, formulario) {
  $("#carrega_cadastro").load(`edita_familia.php`,
    {
      id: id,
      formulario: formulario
    }
  );
}

function excluir(id_, formulario_) {

  decisao = confirm('Deseja realmente excluir?')

  if (decisao) {
    var request = $.ajax({
      url: "app/controller/ProcessaExclui.php",
      method: "POST",
      data: { id: id_, formulario: formulario_ },
      dataType: "html"
    });
    request.done(function (msg) {
      alert("Sucesso na Exclusão!!!");
      location.reload() 
    });
    request.fail(function (jqXHR, textStatus) {
      alert("falhou: " + textStatus);
    });

  }
  else {
    return false;
  }

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
      location.reload() 
    });
    request.fail(function (jqXHR, textStatus) {
      alert("falhou: " + textStatus);
    });

  }
  else {
    return false;
  }
}