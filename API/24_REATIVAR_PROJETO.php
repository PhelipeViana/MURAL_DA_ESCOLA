<?php
$IDPROJETO = noInjection($_REQUEST['p1']);
$IDSALA = noInjection($_REQUEST['p2']);

$sql = "UPDATE `projetos_sala` SET 
`STATUS_PROJETO`=1 
WHERE `REF_PROSALAS`='$IDPROJETO' and `REF_SALAPROS`='$IDSALA'";
$exe = mysqli_query($conn, $sql);
if ($exe) {
    echo json_encode(['msg' => 'sucesso', 'st' => 1]);
} else {
    echo json_encode(['msg' => 'erro ao adicionar', 'st' => 0]);
}
