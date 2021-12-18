<?php

$sql = "SELECT * 
FROM aluno_sala AS AL
left join  salas as SL
ON AL.REF_ID_SALA=SL.id_sala
left join dados as DD
ON SL.token_user_sala=DD.REF_TOKEN
WHERE 
AL.token_aluno_sala='$TOKEN_USER' AND AL.status_convite=0";

$exe = mysqli_query($conn, $sql);
$num = mysqli_num_rows($exe);
while ($row = mysqli_fetch_assoc($exe)) {

    $dados[] = $row;
}

echo json_encode(['ret' => $dados, 'num' => $num]);
