$(document).ready(function () {
  
  $('#tabela').DataTable({
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
    }
  })

});

function carregarCadastro(id) {
  $("#carrega_cadastro").load(`mostra_edita_familia.php`,
   { idcadastro: id }
    );
}


