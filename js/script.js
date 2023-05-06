(() => {
  'use strict';

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation');

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach((form) => {
    form.addEventListener('submit', (event) => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
})();
$(document).ready(function () {

  $('#tabela').DataTable({
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
    }
  })

});

$(function () {
  $.datepicker.setDefaults({
    ordering: false,
    dateFormat: 'dd/mm/yy',
    showOn: "focus",
    dayNames: ["Domingo", "Segunda", "Terça", "Quarte", "Quinta", "Sexta", "Sábado"],
    dayNamesMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
    monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
  });
});
$(function () {
  $("#data_nasc").datepicker({
    yearRange: "1950:2023",
    changeMonth: true,
    changeYear: true,
  });
});

function carrega(id, formulario) {

  switch (formulario) {

    case 'cadastro':
      local = 'edita_familia.php';
      break;
    case 'produto':
      local = `edita_produto.php`;
      break;
    case 'marca':
      local = `edita_marca.php`;
      break;
    default:

  }

  $("#carrega").load(local,
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
      url: "processa_exclui.php",
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
      url: "processa_aprova.php",
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
