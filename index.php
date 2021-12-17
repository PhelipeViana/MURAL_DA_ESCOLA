<?php


include "_conect.php";

if (isset($_POST['acesso'])) {
  if ($_POST['acesso'] == 1) {
    $_SESSION['acesso'] = 'ALUNO'; //acesso a pagina
  }
  if ($_POST['acesso'] == 2) {
    $_SESSION['acesso'] = 'PROFESSOR'; //acesso a pagina
  }
  $_SESSION['token'] = $_POST['token']; //token do usuario logado
}


if (!isset($_SESSION['acesso'])) {
  require_once "INDEX/INDEX.php";
} else {
  switch ($_SESSION['acesso']) {

    case 'ALUNO':
      require_once "ALUNO/INDEX.php";
      break;
    case 'PROFESSOR':
      require_once "PROFESSOR/INDEX.php";
      break;

    default:
      require_once "INDEX/INDEX.php";
     
      break;
  }
}
