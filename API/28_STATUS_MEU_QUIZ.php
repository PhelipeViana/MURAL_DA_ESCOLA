<?php
$subquery = "SELECT REF_ID_SALA FROM aluno_sala WHERE `token_aluno_sala`='$TOKEN_USER' and status_convite=1 order by REF_ID_SALA";


$sub_diferentes = "SELECT distinct(REF_PROSALAS) FROM `projetos_sala` WHERE `REF_SALAPROS` in ($subquery)";

$sql = "SELECT *,
(SELECT count(*) FROM `resultado_projeto_aluno` 
WHERE `REF_ALUNO_RES`='$TOKEN_USER'
AND REF_PROJ=PJ.id_projeto) AS STATUS_FEITO,
(SELECT nota FROM `resultado_projeto_aluno` 
WHERE `REF_ALUNO_RES`='$TOKEN_USER'
AND REF_PROJ=PJ.id_projeto) AS NOTA

FROM projeto AS PJ
WHERE PJ.id_projeto in ($sub_diferentes)";




$exe = mysqli_query($conn, $sql);
$num = mysqli_num_rows($exe);

while ($row = mysqli_fetch_assoc($exe)) {

    $dados[] = $row;
}

echo json_encode(['ret'=>$dados]);
