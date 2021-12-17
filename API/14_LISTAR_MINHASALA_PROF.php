<?php

$sql = "SELECT * FROM `salas` WHERE `token_user_sala`='$TOKEN_USER' AND `ativo`=1 order by id_sala desc";
$exe = mysqli_query($conn, $sql);

$num = mysqli_num_rows($exe);

while ($row = mysqli_fetch_assoc($exe)) {

    $dados[] = $row;
}

echo json_encode(['st' => 1, 'ret' => $dados, 'num' => $num]);
