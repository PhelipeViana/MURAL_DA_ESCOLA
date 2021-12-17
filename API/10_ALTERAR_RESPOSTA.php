<?php
$ID_QUIZ = noInjection($_REQUEST['p1']);
$PERGUNTA = noInjection($_REQUEST['p2']);
$INDICE='r_'.noInjection($_REQUEST['p3']);


$PERMISSAO = quizProjetoVerificate($ID_QUIZ, $TOKEN_USER);

if ($PERMISSAO) {
    $sql = "UPDATE `quiz` SET $INDICE='$PERGUNTA' WHERE `id_quiz`='$ID_QUIZ'";
    $exe = mysqli_query($conn, $sql);
    if ($exe) {
        $st = 1;
        $msg = "Sucesso";
    } else {
        $st = 0;
        $msg = "erro ao tentar alterar";
    }
    echo json_encode(['msg' =>   $msg , 'st' => $st]);
} else {
    echo json_encode(['msg' => 'usuario sem permissão', 'st' => 0]);
}
