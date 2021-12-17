<?php
$id=noInjection($_REQUEST['p1']);
$sql = "SELECT *,
(SELECT COUNT(*) FROM `projetos_sala` WHERE `REF_PROSALAS`=PJ.id_projeto and REF_SALAPROS='$id') as ADICIONADO,
(SELECT STATUS_PROJETO FROM `projetos_sala` WHERE `REF_PROSALAS`=PJ.id_projeto and REF_SALAPROS='$id') as STATUS_PROJETO
FROM `projeto` AS PJ 
WHERE 
PJ.token_gestor_projeto='$TOKEN_USER' 
AND PJ.projeto_disponivel=1";

$exe = mysqli_query($conn, $sql);
$num = mysqli_num_rows($exe);
if ($num > 0) {
    while ($row = mysqli_fetch_assoc($exe)) {

        $dados[] = $row;
    }

    echo json_encode(['st' => 1, 'ret' => $dados, 'num' => $num]);
} else {
    echo json_encode(['st' => 1, 'num' => 0]);
}
