<!-- Functions -->
<script>
  function openPage(page) {
    escreverHash(page); //Escrever a hash
  }

  /**
   * Escuta alterações na hash da localização actual.
   * @param {Event} e HashChangeEvent object
   */
  window.onhashchange = function(e, page) {

    var page = lerHash();

    if (page.length == 0) {
      openPage("dashboard");
            
    } else

    if (page == 'admin') {
      //carregar pagina
      $("#main").load("components/admin/index.php");

    }

    if (page == 'dashboard') {
      //carregar pagina
      $("#main").load("components/dashboard/dashboard.php");
    }

    if (page == 'users') {
      $("#main").load("components/users/users.php");
    }

    if ( page.includes('domains') == true ) {

      $("#main").load("components/" + page);
    }

    if ( page.includes('analytics/report1') == true ) {

      $("#main").load("components/" + page);
    }

  };

  /**
   * Actualiza a hash da localização actual com o valor facultado
   * @param {string} str
   */
  function escreverHash(str) {

    window.location.hash = str;
  }

  /**
   * Devolve a hash da localização actual
   * @return {string} Valor da Hash com prefixo '#' ignorado.
   */
  function lerHash() {
    return window.location.hash.substr(1);
  }
</script>