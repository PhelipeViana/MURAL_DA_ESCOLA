<?php
include "../_conect.php";
include "EMAIL/index.php";
$AUTH = isset($_REQUEST['auth']) ? $_REQUEST['auth'] : "";
$TOKEN_USER = isset($_REQUEST['TOKEN_USER']) ? $_REQUEST['TOKEN_USER'] : "";
switch ($AUTH) {

    case 1:
        include "01_LOGIN.php";

        break;
    case 2:
        include "02_CADASTRO.php";

        break;
    case 3:
        include "03_ALTERAR_COR.php";

        break;
    case 4:
        include "04_ALTERAR_FOTO.php";

        break;
    case 5:
        include "05_ALTERAR_DADOS.php";

        break;
    case 6:
        include "06_CRIAR_QUIZ.php";

        break;
    case 7:
        include "07_LISTAR_PROJETOS_PROF.php";

        break;
    case 8:
        include "08_QUIZ_ID_PROF.php";

        break;
    case 9:
        include "09_ALTERAR_PERGUNTAS_PROF.php";

        break;
    case 10:
        include "10_ALTERAR_RESPOSTA.php";

        break;
    case 11:
        include "11_ALTERAR_GABARITO.php";

        break;
    case 12:
        include "12_ALTERAR_NOME_QUIZ.php";

        break;

    case 13:
        include "13_CRIAR_SALA_PROF.php";

        break;

    case 14:
        include "14_LISTAR_MINHASALA_PROF.php";

        break;

    case 15:
        include "15_EDITAR_SALA_PROF.php";

        break;
    case 16:
        include "16_PROCURA_ALUNO_SALA.php";

        break;

    case 17:
        include "17_ADD_ALUNO_SALA.php";

        break;
    case 18:
        include "18_PROCURAR_PROF.php";

        break;
    case 19:
        include "19_ALUNO_ENTRAR_SALA.php";

        break;
    case 20:
        include "20_CONFIRMA_CONVITE_ALUNO.php";

        break;


    default:
        echo json_encode(['msg' => 'Error404']);
        break;
}
