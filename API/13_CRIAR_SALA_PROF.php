<?php

$NOME_SALA = noInjection($_REQUEST['nome_da_sala']);
$NOME_ESCOLA = noInjection($_REQUEST['escola_da_sala']);
$TIPO_SALA = noInjection($_REQUEST['tipo_da_sala']);

$sql = "INSERT INTO `salas`(
`nome_sala`,
`escola_sala`,
`token_user_sala`,
`tipo_sala`) VALUES ('$NOME_SALA','$NOME_ESCOLA','$TOKEN_USER','$TIPO_SALA')";

$exe = mysqli_query($conn, $sql);

if ($exe) {
    echo json_encode(['msg' => 'criado com sucesso!', 'st' => 1]);
} else {
    echo json_encode(['msg' => 'erro ao criar nova sala', 'st' => 0]);
}
