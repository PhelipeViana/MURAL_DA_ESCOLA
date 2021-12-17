<?php

$NOME_SALA = noInjection($_REQUEST['nome_da_sala']);
$NOME_ESCOLA = noInjection($_REQUEST['escola_da_sala']);
$TIPO_SALA = noInjection($_REQUEST['tipo_da_sala']);
$ID = noInjection($_REQUEST['id']);


$sql = "UPDATE `salas` SET 
`nome_sala`='$NOME_SALA',
`escola_sala`='$NOME_ESCOLA',
`tipo_sala`='$TIPO_SALA' WHERE `id_sala`='$ID' and 
`token_user_sala`='$TOKEN_USER'";
$exe = mysqli_query($conn, $sql);

if ($exe) {
    echo json_encode(['msg' => 'editado com sucesso!', 'st' => 1]);
} else {
    echo json_encode(['msg' => 'erro ao editar sala', 'st' => 0]);
}
