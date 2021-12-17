<?php

$TK_ALUNO = noInjection($_REQUEST['p1']);
$SALA = noInjection($_REQUEST['p2']);

$sql_verificar = "SELECT * FROM `aluno_sala` WHERE 
`token_aluno_sala`='$TK_ALUNO ' and `REF_ID_SALA`='$SALA'";
$exe_verificar = mysqli_query($conn, $sql_verificar);
$num_verificar = mysqli_num_rows($exe_verificar);

if ($num_verificar > 0) {
    echo json_encode(['msg' => 'Aluno já convidado', 'st' => 2]);
    die();
} else {
    $sql = "INSERT INTO `aluno_sala`(`token_aluno_sala`, `REF_ID_SALA`) 
    VALUES ('$TK_ALUNO','$SALA')";
    $exe = mysqli_query($conn, $sql);
    if ($exe) {
        echo json_encode(['msg' => 'Sucesso ao adicionar', 'st' => 1]);
    } else {
        echo json_encode(['msg' => 'erro ao adicionar', 'st' => 0]);
    }
}
