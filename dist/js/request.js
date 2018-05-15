function buscar_cidades(){
    var estado = $('#estado').val();
    if(estado){
      var url = '../../controller/cCidade.php?estado='+estado;
      $.get(url, function(dataReturn) {
        $('#load_cidades').html(dataReturn);
      });
    }
  }

function validar_senha(){
  if ( $('#senha').val() != $('#senha2').val() ){
    alert ('Senhas diferestes!')
    return false;
  }
  else{
    return true;
  }
}
