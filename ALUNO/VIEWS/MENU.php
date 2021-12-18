<div class="sidebar" data-color="purple" data-background-color="white" data-image="https://dadosmobile.com/dadosmobileIcon.png">
  <div class="logo"><a href="#" class="simple-text logo-normal">
      <img src="https://dadosmobile.com/dadosmobileIcon.png" style="width: 200px;">
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <?php
      $ICON = ['dashboard','account_circle'];
      for ($i = 0; $i < count($ARRAY_PAGINAS); $i++) {
        if ($ARRAY_PAGINAS[$i] == $PAGINA) {
          $menu_ativo = 'active';
        } else {
          $menu_ativo = '';
        }
      ?>
        <li class='<?= $menu_ativo ?>'>
          <a class="nav-link" href="<?= $SITE . "/" . $ARRAY_PAGINAS[$i] ?>"><i class="material-icons"><?= $ICON[$i] ?></i>
            <p><?= $ARRAY_PAGINAS[$i] ?></p>
          </a>
        </li>

      <?php
      }
      ?>

      <li>
        <a class="nav-link" href="_deslogar.php">
          <i class="material-icons"><span class="material-icons">
              logout
            </span></i>
          <p>SAIR</p>
        </a>
      </li>
    </ul>

  </div>
</div>

<div class="main-panel">
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand float-right" href="javascript:;" data-toggle="modal" data-target="#edit_informacao">
          <span class="material-icons">
            account_circle
          </span><?=$DADOS[0]['login_acesso']?>
         
            
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
    </div>
  </nav>