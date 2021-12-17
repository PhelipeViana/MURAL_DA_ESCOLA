<?php

$sql = "SELECT *,
(SELECT COUNT(*) FROM `aluno_sala` WHERE `REF_ID_SALA`=SL.id_sala AND status_convite=1) AS MATRICULADOS,
(SELECT count(*) FROM `projetos_sala` WHERE `REF_SALAPROS`=SL.id_sala) as QUIZ
FROM salas as SL 
WHERE 
SL.token_user_sala='$TOKEN_USER' 
AND SL.ativo=1 order by id_sala desc";
$exe = mysqli_query($conn, $sql);

$num = mysqli_num_rows($exe);

while ($row = mysqli_fetch_assoc($exe)) {

    $dados[] = $row;
}

echo json_encode(['st' => 1, 'ret' => $dados, 'num' => $num]);
