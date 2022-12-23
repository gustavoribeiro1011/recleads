<script>
  function processar() {
    $("#loading").html('<img src="img/loading2.gif" width="50px" />');
    validation();
  }

  function validation() {
    var validation = false;
    //Verificar se o campo data tem tamanho maior que zero 
    if ($("#dt_in").val().length > 0) {
      var dt_in = $("#dt_in").val();
      validation = false;
    } else {
      validation = true;
    }

    if ($("#dt_fn").val().length > 0) {
      var dt_in = $("#dt_fn").val();
      validation = false;
    } else {
      validation = true;
    }

    if (validation == false) {
      alert("Em desenvolvimento");
    } else {
      alert("Em desenvolvimento");
    }
  }
</script>