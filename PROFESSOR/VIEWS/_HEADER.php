<?php
// ROTAS NA HEADER
$CAPTACAO_PAGINA = isset($_GET['url']) ? urlInjection($_GET['url']) : 'HOME';
$PAGINA = explode('/', $CAPTACAO_PAGINA);
$PAGINA_VALIDAR = strtoupper($PAGINA[0]);

$ARRAY_PAGINAS = ['HOME','MINHASALA','QUIZ','PREFERENCIAS'];

if (in_array($PAGINA_VALIDAR, $ARRAY_PAGINAS)) {
  $PAGINA = $PAGINA_VALIDAR;
} else {
  $PAGINA = 'HOME';
}
//DEPENDENCIAS DO LOGADO
$TOKEN_USER = $_SESSION['token'];
$SQL = "SELECT * FROM `acesso` AS AC 
inner join dados as DD
ON AC.token_acesso=DD.REF_TOKEN
WHERE 
AC.token_acesso='$TOKEN_USER'";
$EXE = mysqli_query($conn, $SQL);
$VALIDOR = mysqli_num_rows($EXE);
if ($VALIDOR < 1) {
  header('location:_deslogar.php');
}
while ($row = mysqli_fetch_assoc($EXE)) {

  $DADOS[] = $row;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="ALUNO/img/apple-icon.png">
  <link rel="icon" type="image/png" href="ALUNO/img/logo_oficinal.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    PROFESSOR
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="<?= $SITE ?>/ALUNO/demo/demo.css" rel="stylesheet" />
  <script src="<?= $SITE ?>/ALUNO/js/core/jquery.min.js"></script>
  <script src="<?= $SITE ?>/ALUNO/js/cpf.js"></script>
  <script src="<?= $SITE ?>/ALUNO/js/locais.js"></script>
  <script src="<?= $SITE ?>/ALUNO/js/mascara.js"></script>
  <?php include "ALUNO/VIEWS/_CSS.php"; ?>
  <script>
    const DADOS = {
      PARS: function(auth, p1 = 0, p2 = 0, p3 = 0, p4 = 0, p5 = 0) {
        let obj = {
          auth: auth,
          TOKEN_USER: "<?=$TOKEN_USER?>",
          p1: p1,
          p2: p2,
          p3: p3,
          p4: p4,
          p5: p5
        }
        return obj;
      },
      OBJ: function(auth, obj) {
        obj['TOKEN_USER'] = "<?=$TOKEN_USER?>";
        obj['auth'] = auth;


        return obj;
      },
      CLASSE: function(auth, cl) {
        let classe = document.getElementsByClassName(cl);
        let json = {};
        for (let i = 0; i < classe.length; i++) {
          json[classe[i].getAttribute("name")] = classe[i].value;
        }
        json['TOKEN_USER'] = "<?=$TOKEN_USER?>";
        json['auth'] = auth;

        return json;
      },
      CLASSE_JSON: function(auth, cl, p1 = 0, p2 = 0) {
        let classe = document.getElementsByClassName(cl);
        let json = {};
        let obj = [];
        for (let i = 0; i < classe.length; i++) {
          obj.push(classe[i].value);
        }
        json['TOKEN_USER'] = "<?=$TOKEN_USER?>";
        json['auth'] = auth;
        json['JSON'] = obj;
        json['p1'] = p1;
        json['p2'] = p2;



        return json;
      },
      FORM: function(auth, formulario, p1 = 0) {
        let int = $("#" + formulario).serialize();
        let usuario = "<?=$TOKEN_USER?>";
        int += "&auth=" + auth + "&TOKEN_USER=" + usuario + "&p1=" + p1;
        return int
      },
      FORM_ARRAY: function(auth, formulario, cl) {
        let form = $("#" + formulario).serializeArray();
        let json = {};
        let array = [];
        for (let i = 0; i < form.length; i++) {
          json[form[i].name] = form[i].value

        }
        //POVOA O ARRAY MEDIANTE A CLASSE
        let classe = document.getElementsByClassName(cl);
        for (let i = 0; i < classe.length; i++) {
          array.push(classe[i].value);
        }


        json['auth'] = auth;
        json['TOKEN_USER'] = "<?=$TOKEN_USER?>";
        json['ARRAY'] = array;




        return json;

      }

    }
    jQuery(document).ready(function($) {
      initializeMasks();

    });

    function initializeMasks() {
      $(".mask-credit-card").mask("9999 9999 9999 99999");
      $(".mask-month-year").mask("99/9999");
      $(".mask-date").mask("99/99/9999");
      $(".mask-cep").mask("99999-999");
      $(".mask-cpf").mask("999.999.999-99");
      $(".mask-cnpj").mask("99.999.999/9999-99");
      $(".mask-cellphone").mask("99999-9999");
      $(".mask-onlyphone").mask("99999-9999");
      $(".mask-phone").mask("(99) 99999-9999");
      $(".mask-numhab").mask("99999999999");
      $(".mask-placa").mask("999-999");



    }
  </script>


</head>

<body>