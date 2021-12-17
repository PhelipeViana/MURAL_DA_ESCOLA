<?php
protect('ALUNO');
include_once "ALUNO/VIEWS/_HEADER.php";
?>

<div class="wrapper ">
  <?php include "ALUNO/VIEWS/MENU.php"; ?>
  <div class="content">
    <?php include   "ALUNO/VIEWS/" . $PAGINA . ".php"; ?>
  </div>
  <footer class="footer">
    <div class="container-fluid">
      <nav class="float-left">
        <ul>
          <li>
            <a href="#">
              Phelipe Viana
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>
      </div>
    </div>
  </footer>
</div>
<?php include "ALUNO/VIEWS/_FOOTER.php"; ?>
<?php include "ALUNO/VIEWS/_GLOBAL.php"; ?>
