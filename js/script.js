$(document).ready(function () {
  
  $('#tabela').DataTable({
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
    }
  })

});

function carregar(id,formulario) {
  $("#carrega_cadastro").load(`edita_familia.php`,
   { id: id ,
    formulario: formulario}
    );
}

function excluir(id,formulario) {
  $("#carrega_cadastro").load(`grava_mostra_edita_familia.php`,
   { id: id,
    formulario: formulario },
    
    );
}
function atualizarPontos(id,pontos, formulario) {
  $("#carrega_cadastro").load(`grava_mostra_edita_familia.php`,
   { id: id,
    pontos: pontos,
    formulario: formulario }
    );
}



