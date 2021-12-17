 <div class="sidebar" data-color="purple" data-background-color="white" data-image="ALUNOS/img/sidebar-1.jpg">
  <div class="logo"><a href="#" class="simple-text logo-normal">
    <img src="ALUNOS/img/logo_oficinal.png" style="width: 200px;">
  </a></div>
  <div class="sidebar-wrapper">
   <ul class="nav">
    <?php
    $index = 0;
    $ICONES_DO_MENU=['dashboard','chrome_reader_mode','account_circle','checklist','forum','app_registration',
    'chrome_reader_mode'];
    foreach ($INDICES_DAS_PAGINAS as $key => $value) {
      if($MENU_ATIVO==$key){
        $ativo='active';
      }else{
        $ativo='';
      }
      ?> 
      <li class="nav-item <?=$ativo?>">
        <a class="nav-link" href="?pagina=<?=$key?>">
          <i class="material-icons"><?=$ICONES_DO_MENU[$index]?></i>
          <p><?=$key?></p>
        </a>
      </li>
      <?php
      $index ++;
    }

    ?>




  </ul>
</div>
</div>
<script>
  $(".nav-item").on('click',function(e){
    $(this).addClass('active')
  })
</script>


