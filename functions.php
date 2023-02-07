<!-- Functions -->
<script>
  var page = ""; //página atual
  var filter_active = false; //Applyfilter
  var domain = "";

  //Variáveis globais
  var data_in = ""; //applyFilter
  var data_fn = ""; //applyFilter
  var param_ = "";
  var param = "";
  var new_page = "";


  var today = new Date();
          var dd = String(today.getDate()).padStart(2, '0');
          var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
          var yyyy = today.getFullYear();

          today = yyyy + "-" + mm + "-" + dd;//formato americano

  function isDate(date) {
    var format = 'yyyy-MM-dd';


    /**
     * This method gets the year index from the supplied format
     */
    function getYearIndex(format) {

      var tokens = splitDateFormat(format);

      if (tokens[0] === 'YYYY' ||
        tokens[0] === 'yyyy') {
        return 0;
      } else if (tokens[1] === 'YYYY' ||
        tokens[1] === 'yyyy') {
        return 1;
      } else if (tokens[2] === 'YYYY' ||
        tokens[2] === 'yyyy') {
        return 2;
      }
      // Returning the default value as -1
      return -1;
    }

    /**
     * This method returns the year string located at the supplied index
     */
    function getYear(date, index) {

      var tokens = splitDateFormat(date);
      return tokens[index];
    }

    /**
     * This method gets the month index from the supplied format
     */
    function getMonthIndex(format) {

      var tokens = splitDateFormat(format);

      if (tokens[0] === 'MM' ||
        tokens[0] === 'mm') {
        return 0;
      } else if (tokens[1] === 'MM' ||
        tokens[1] === 'mm') {
        return 1;
      } else if (tokens[2] === 'MM' ||
        tokens[2] === 'mm') {
        return 2;
      }
      // Returning the default value as -1
      return -1;
    }

    /**
     * This method returns the month string located at the supplied index
     */
    function getMonth(date, index) {

      var tokens = splitDateFormat(date);
      return tokens[index];
    }

    /**
     * This method gets the date index from the supplied format
     */
    function getDateIndex(format) {

      var tokens = splitDateFormat(format);

      if (tokens[0] === 'DD' ||
        tokens[0] === 'dd') {
        return 0;
      } else if (tokens[1] === 'DD' ||
        tokens[1] === 'dd') {
        return 1;
      } else if (tokens[2] === 'DD' ||
        tokens[2] === 'dd') {
        return 2;
      }
      // Returning the default value as -1
      return -1;
    }

    /**
     * This method returns the date string located at the supplied index
     */
    function getDate(date, index) {

      var tokens = splitDateFormat(date);
      return tokens[index];
    }

    /**
     * This method returns true if date1 is before date2 else return false
     */
    function isBefore(date1, date2, format) {
      // Validating if date1 date is greater than the date2 date
      if (new Date(getYear(date1, getYearIndex(format)),
          getMonth(date1, getMonthIndex(format)) - 1,
          getDate(date1, getDateIndex(format))).getTime() >
        new Date(getYear(date2, getYearIndex(format)),
          getMonth(date2, getMonthIndex(format)) - 1,
          getDate(date2, getDateIndex(format))).getTime()) {
        return true;
      }
      return false;
    }

    /**
     * This method returns true if date1 is after date2 else return false
     */
    function isAfter(date1, date2, format) {
      // Validating if date2 date is less than the date1 date
      if (new Date(getYear(date2, getYearIndex(format)),
          getMonth(date2, getMonthIndex(format)) - 1,
          getDate(date2, getDateIndex(format))).getTime() <
        new Date(getYear(date1, getYearIndex(format)),
          getMonth(date1, getMonthIndex(format)) - 1,
          getDate(date1, getDateIndex(format))).getTime()
      ) {
        return true;
      }
      return false;
    }

    /**
     * This method returns true if date1 is equals to date2 else return false
     */
    function isEquals(date1, date2, format) {
      // Validating if date1 date is equals to the date2 date
      if (new Date(getYear(date1, getYearIndex(format)),
          getMonth(date1, getMonthIndex(format)) - 1,
          getDate(date1, getDateIndex(format))).getTime() ===
        new Date(getYear(date2, getYearIndex(format)),
          getMonth(date2, getMonthIndex(format)) - 1,
          getDate(date2, getDateIndex(format))).getTime()) {
        return true;
      }
      return false;
    }

    /**
     * This method validates and returns true if the supplied date is 
     * equals to the current date.
     */
    function isCurrentDate(date, format) {
      // Validating if the supplied date is the current date
      if (new Date(getYear(date, getYearIndex(format)),
          getMonth(date, getMonthIndex(format)) - 1,
          getDate(date, getDateIndex(format))).getTime() ===
        new Date(new Date().getFullYear(),
          new Date().getMonth(),
          new Date().getDate()).getTime()) {
        return true;
      }
      return false;
    }

    /**
     * This method validates and returns true if the supplied date value 
     * is before the current date.
     */
    function isBeforeCurrentDate(date, format) {
      // Validating if the supplied date is before the current date
      if (new Date(getYear(date, getYearIndex(format)),
          getMonth(date, getMonthIndex(format)) - 1,
          getDate(date, getDateIndex(format))).getTime() <
        new Date(new Date().getFullYear(),
          new Date().getMonth(),
          new Date().getDate()).getTime()) {
        return true;
      }
      return false;
    }

    /**
     * This method validates and returns true if the supplied date value 
     * is after the current date.
     */
    function isAfterCurrentDate(date, format) {
      // Validating if the supplied date is before the current date
      if (new Date(getYear(date, getYearIndex(format)),
          getMonth(date, getMonthIndex(format)) - 1,
          getDate(date, getDateIndex(format))).getTime() >
        new Date(new Date().getFullYear(),
          new Date().getMonth(),
          new Date().getDate()).getTime()) {
        return true;
      }
      return false;
    }

    /**
     * This method splits the supplied date OR format based 
     * on non alpha numeric characters in the supplied string.
     */
    function splitDateFormat(dateFormat) {
      // Spliting the supplied string based on non characters
      return dateFormat.split(/\W/);
    }


    // Validating if the supplied date string is valid and not a NaN (Not a Number)
    if (!isNaN(new Date(getYear(date, getYearIndex(format)),
        getMonth(date, getMonthIndex(format)) - 1,
        getDate(date, getDateIndex(format))))) {
      return true;
    }
    return false;
  }

  /*
   * Pega o Parametro da URL 
   */
  $.urlParam = function(name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results == null) {
      return null;
    }
    return decodeURI(results[1]) || 0;
  }

  function clearFilter() {
    $('form :input').val('');
  }






  function openPage(page) {
    escreverHash(page); //Escrever a hash
    console.log(page);
  }

  /**
   * Escuta alterações na hash da localização actual.
   * @param {Event} e HashChangeEvent object
   */
  window.onhashchange = function(e) {
    // Fazer algo quando existe uma alteração de valor

    page = lerHash();
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


      $("#main").load("components/" + page + "&dt_in="+today);

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

  /**
   * Função responsável por aplicar filtros na tabela de
   * visualização de leads
   */
  function applyFilter() {

    param = "";
    param_ = "";
    new_page = "";

    //Variáveis globais da Fn
    var errors = ""; //responsável por verificar se algum filtro foi aplicado


    filter_active = true; //responsável para fizer a Fn "openPage()" que a página possui filtros

    /*==============================
     *| Data Inicial/Final
     *==============================
     */

    //se a pessoa selecionou algum intervalo de datas
    data_in = $("#collapseFilter #dt_in").val();
    data_fn = $("#collapseFilter #dt_fn").val();

    console.log("data inicial => " + data_in);
    console.log("data final => " + data_fn);

    //quando a pessoa digitar data inicial e data final
    if (data_in.length > 0 && data_fn.length > 0) {
      // console.log("foi digitado data inicial e data final");
      param += "&dtin=" + data_in;
      param += "&dtfn=" + data_fn;
      errors += "0";

    }
    //quando a pessoa só digitar a data inicial
    if (data_in.length > 0 && data_fn.length == 0) {
      console.log("foi digitado só data inicial");
      param += "&dtin=" + data_in;
      errors += "0";

    }
    //quando a pessoa só digitar a data final
    if (data_fn.length > 0 && data_in.length == 0) {
      alert("Preencha a data inicial");
      errors += "1";
    }

    //quando a pessoa não digitar nenhuma data
    if (data_in.length == 0 && data_fn.length == 0) {
      param += "&dtin=&dtfn=";
      errors += "0";
    }

    if (page.length == 0) {
      page = window.location.hash.substr(1);
    }
    // console.log("page: " + page);

    var separators = ['domain=', '&'];
    param_ = page.split(new RegExp(separators.join('|'), 'g'));

    // console.log("***param_1: " + param_[1]);

    new_page = "analytics/report1/index.php?domain=" + param_[1] + "&1=1" + param;
    // console.log("newpage: " + new_page);

    // console.log("domain: " + domain);
    // console.log("openPage(" + new_page + ")");

    if ((parseInt(errors) + 0) === 0) {
      openPage(new_page);
    }


  }


  /**
   * Remover um registro na tabela
   */
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