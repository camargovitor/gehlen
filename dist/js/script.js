$(document).ready(function () {

  $("#descricaoDoenca").hide();

  $("#arquivo").change(function() {
    let validos = /(\.jpg|\.png|\.gif)$/i;
    let fileInput = $(this);
    let nome = fileInput.get(0).files["0"].name;
    if (!(validos.test(nome))) {
      alert("Arquivo selecionado inválido, permitido apenas .jpg .png .gif!");

      $("#arquivo").val("");
    } else {
      console.log("Válido")
    }
  });

  $("#existDoenca").click(function(){
    if ($("#existDoenca").is(' :checked'))
      $("#descricaoDoenca").show();
    else
      $("#descricaoDoenca").hide();
  })
});