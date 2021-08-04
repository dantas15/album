//variavel que recebe o elemento html(modal)
var confirmationModal = document.getElementById("confirmationModal");

//adiciona um evento, toda vez que o modal for aberto
confirmationModal.addEventListener("show.bs.modal", function (event) {
  //Botão que acionou o modal
  var button = event.relatedTarget;

  //variável que recebe o formulário do modal
  var form = document.getElementById("formDeletePhoto");

  //alterando a rota que o formulário envia os dados
  form.action = "/photo/delete/" + button.getAttribute("data-photo-id");
});
