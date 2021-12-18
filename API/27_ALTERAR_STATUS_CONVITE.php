<?php
$IDVINCULO = nomeCase($_REQUEST['p1']);
$TIPO = nomeCase($_REQUEST['p2']);

if ($TIPO == 1) {
    $sql = "UPDATE `aluno_sala` SET `status_convite`=1 WHERE `id_alunosala`='$IDVINCULO' AND `token_aluno_sala`='$TOKEN_USER'";
    $e = mysqli_query($conn, $sql);
    if ($e) {
        echo json_encode(['msg' => 'aceito com sucesso', 'st' => 1]);
    } else {
        echo json_encode(['msg' => 'erro ao aceitar', 'st' => 0]);
    }
} else {
    $sql = "DELETE FROM `aluno_sala` WHERE `id_alunosala`='$IDVINCULO' AND `token_aluno_sala`='$TOKEN_USER'";
    $e = mysqli_query($conn, $sql);
    if ($e) {
        echo json_encode(['msg' => 'recusado com sucesso', 'st' => 1]);
    } else {
        echo json_encode(['msg' => 'recusado ao aceitar', 'st' => 0]);
    }
}
