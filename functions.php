<!-- Functions -->
<script>
  function openPage(page, param, param2) {

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

    if (page == 'domains') {
      $("#main").load("components/domains/domains.php?id=" + param);
    }

    if (page == 'analytics/report1') {
      $("#main").load("components/analytics/report1/index.php?domain_id=" + param + "&domain=" + param2);
    }



  }
</script>