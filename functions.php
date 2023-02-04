<!-- Functions -->
<script>
  function openPage(page) {
    escreverHash(page); //Escrever a hash
  }

  /**
   * Escuta alterações na hash da localização actual.
   * @param {Event} e HashChangeEvent object
   */
  window.onhashchange = function(e) {
    // Fazer algo quando existe uma alteração de valor

    var page = lerHash();
    // console.log("Alteração..page: " + page);
    openPage(page);

    // aqui chama-se função X mediante o valor da variável "pagina"
  };

  /**
   * Escuta alterações na hash da localização actual.
   * @param {Event} e HashChangeEvent object
   */
  function handleOpenPage(page) {

    var page = page.toString();
    // console.log("??" + page);
    // var page = lerHash();

    if (page.length == 0) {
      openPage("dashboard");

    } else

    if (page == 'admin') {

      //carregar pagina
      $("#main").load("components/admin/index.php");

    }

    if (page == "dashboard") {
      // console.log("precisa cair aqui!!");
      //carregar pagina
      $("#main").load("components/dashboard/dashboard.php");



    }

    if (page == 'users') {
      $("#main").load("components/users/users.php");
    }

    if (page.includes('domains') == true) {

      $("#main").load("components/" + page);
    }

    if (page.includes('analytics/report1') == true) {

      $("#main").load("components/" + page);
    }

    if (page.includes('relatorios') == true) {

      $("#main").load("components/analytics/index.php");
    }

    if (page.includes('report2') == true) {

      $("#main").load("components/analytics/report2/index.php");
    }


  };

  /**
   * Actualiza a hash da localização actual com o valor facultado
   * @param {string} str
   */
  function escreverHash(str) {

    window.location.hash = str;
    // console.log(str);
    handleOpenPage(str);
  }

  /**
   * Devolve a hash da localização actual
   * @return {string} Valor da Hash  com prefixo '#' ignorado.
   */
  function lerHash() {
    return window.location.hash.substr(1);
    // console.log("Ler hash=> " + window.location.hash.substr(1));
  }

  if (window.location.hash) {
    // console.log('Fragment exists');
    var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
    console.log("hash=> " + hash);
    openPage(hash);

  } else {
    // console.log('Fragment not exist');
    openPage("dashboard");
  }


  function remove(event, id, param) {

    alertify.confirm('Remover rec', 'Essa ação resulta em uma <strong>exclusão permanente</strong> da gravação. Após a exclusão, essa ação não poderá ser revertida. <br>Tem certeza disso?', function() {

        //--------------------------------------------------------------------------
        $.ajax({
          type: "POST",
          url: '<?= BASEURL; ?>api/api.php',
          data: {
            event: event,
            id: id,
          },
          success: function(data) {

            if (data['db'] == 'failed') {
              alertify.notify(data['db_message'], 'error', 5, function() {
                // console.log('dismissed');
              });
            }
            if (data['db'] == 'success') {
              if (data['remove'] == "failed") { //failed
                alertify.notify(data['remove_message'], 'error', 5, function() {});
              } else {
                setTimeout(function() { //success
                  alertify.notify(data['remove_message'], 'success', 5, function() {});


                  /*
                  * Para atualizar a página precisamos chamar a função openPage passando o caminho do componente
                  e no final passar um parametro aleatório para que o método window.onhashchange escute as alterações
                  da hash
                  */
                  openPage('analytics/report1/index.php?domain=' + param + "&1=" + Math.floor(Math.random() * 111));


                }, 500);
              }
            }

          },
          dataType: "json"
        });
        //--------------------------------------------------------------------------

      }, function() {
        return
      })
      .set('labels', {
        ok: 'Sim',
        cancel: 'Cancelar'
      });

  }
</script>