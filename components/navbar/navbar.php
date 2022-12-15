<div class="fixed-top">
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" type="button" href="javascript:void(0);" onClick="openPage('dashboard')">
        <?= $app_name ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="menuContent">

          <!-- @import menu -->
          <?php if ($_SESSION['level_' . $app_token] == 'admin') { ?>
            <li class="nav-item">
              <a class="nav-link active" 
              type="button" 
              aria-current="page" 
              href="javascript:void(0)"
              onClick="openPage('admin')">Painel do Administrador</a>
            </li>
          <?php } ?>


        </ul>

        <!-- DropDown (LogOut)-->
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle no-border" href="#" id="navbarDropdownLogOut" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle"></i> <?= $_SESSION['username_' . $app_token]; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownLogOut">
              <li><a class="dropdown-item" href="<?= BASEURL; ?>api/login/logout.php"><i class="bi bi-arrow-right-square"></i> Sair</a></li>
            </ul>
          </li>
        </ul>
        <!--./DropDown (LogOut)-->

      </div>
    </div>
  </nav>

  <div class="progress" style="height:1.7px;width:100%;display:none;" id="progress">
    <div class="progress-bar" role="progressbar" id="progress-bar" style="width: 20%;height:3px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
</div>