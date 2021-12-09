/*
********************************************************************************
 Modal
********************************************************************************
*/
//variavel que recebe o elemento html(modal)
var confirmationModal = document.getElementById("confirmationModal");

//adiciona um evento, toda vez que o modal for aberto
confirmationModal.addEventListener("show.bs.modal", function (event) {
  //Botão que acionou o modal
  var button = event.relatedTarget;

  //variável que recebe o formulário do modal
  var form = document.getElementById("formDeletePhoto");

  //alterando a rota que o formulário envia os dados
  form.action = "/photos/" + button.getAttribute("data-photo-id");
});

/*
********************************************************************************
Carregar imagem
********************************************************************************
*/
function loadFile(event) {
  //variável que recebe o elemento img
  var imgPrev = document.getElementById("imgPrev");

  //link para a imagem
  var url = URL.createObjectURL(event.target.files[0]);

  //altera a propriedade src para o link da imagem
  imgPrev.src = url;
}
