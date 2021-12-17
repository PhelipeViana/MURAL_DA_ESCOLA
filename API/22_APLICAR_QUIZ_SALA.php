<?php
$IDPROJETO = noInjection($_REQUEST['p1']);
$IDSALA = noInjection($_REQUEST['p2']);

$sql = "INSERT INTO `projetos_sala`(`REF_PROSALAS`, `REF_SALAPROS`) 
VALUES ('$IDPROJETO','$IDSALA')";
$exe = mysqli_query($conn, $sql);
if ($exe) {
    echo json_encode(['msg' => 'sucesso', 'st' => 1]);
} else {
    echo json_encode(['msg' => 'erro ao adicionar', 'st' => 0]);
}
