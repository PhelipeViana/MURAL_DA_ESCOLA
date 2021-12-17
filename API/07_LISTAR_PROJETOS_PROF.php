<?php

$sql = "SELECT * FROM projeto where token_gestor_projeto='$TOKEN_USER' order by id_projeto DESC";

$exe = mysqli_query($conn, $sql);
$num = mysqli_num_rows($exe);

while ($row = mysqli_fetch_assoc($exe)) {

    $dados[] = $row;
}

echo json_encode(['st' => 1, 'ret' => $dados, 'num' => $num]);
