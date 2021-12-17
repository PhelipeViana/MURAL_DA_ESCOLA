<?php
protect('PROFESSOR');
include_once "PROFESSOR/VIEWS/_HEADER.php";
?>

<div class="wrapper ">
  <?php include "PROFESSOR/VIEWS/MENU.php"; ?>
  <div class="content">
    <?php include   "PROFESSOR/VIEWS/" . $PAGINA . ".php"; ?>
  </div>
  <!-- <footer class="footer">
    <div class="container-fluid">
      <nav class="float-left">
        <ul>
          <li>
            <a href="#">
              PROFESSOR
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
  </footer> -->
</div>
<?php include "PROFESSOR/VIEWS/_FOOTER.php"; ?>
<?php include "PROFESSOR/VIEWS/_GLOBAL.php"; ?>
