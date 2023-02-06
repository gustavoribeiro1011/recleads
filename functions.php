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


  function validationReport1() {

    /** Preenchers os inputs caso tenha parametros na url */

    var getUrlParameter = function getUrlParameter(sParam) {
      var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

      for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
          return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
          console.log("aqui: " + sParameterName[1]);
        }
      }
      console.log(getUrlParameter('1'));




    };



  }

  validationReport1();



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



      $("#main").load("components/" + page);




    }

    if (page.includes('relatorios') == true) {
      validationReport1();


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
    var validation = ""; //responsável por verificar se algum filtro foi aplicado


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

    }
    //quando a pessoa só digitar a data inicial
    if (data_in.length > 0 && data_fn.length == 0) {
      console.log("foi digitado só data inicial");
      param += "&dtin=" + data_in;

    }
    //quando a pessoa só digitar a data final
    if (data_fn.length > 0 && data_in.length == 0) {
      alert("Preencha a data inicial");
    }

    //quando a pessoa não digitar nenhuma data
    if (data_in.length == 0 && data_fn.length == 0) {
      param += "&dtin=&dtfn=";
    }

    if (page.length == 0) {
      page = window.location.hash.substr(1);
    }
    console.log("page: " + page);

    var separators = ['domain=', '&'];
    param_ = page.split(new RegExp(separators.join('|'), 'g'));

    console.log("***param_1: " + param_[1]);

    new_page = "analytics/report1/index.php?domain=" + param_[1] + "&1=1" + param;
    console.log("newpage: " + new_page);

    console.log("domain: " + domain);
    console.log("openPage(" + new_page + ")");


    openPage(new_page);

    validationReport1();



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