<?php
$ID_PROJETO = noInjection($_REQUEST['p1']);
$NOME = noInjection($_REQUEST['p2']);

$sql = "UPDATE `projeto` SET nome_projeto='$NOME' WHERE `id_projeto`='$ID_PROJETO'";
$exe = mysqli_query($conn, $sql);
if ($exe) {
    $st = 1;
    $msg = "Nome alterado com sucesso!";
} else {
    $st = 0;
    $msg = "erro ao tentar alterar";
}
echo json_encode(['msg' =>   $msg , 'st' => $st]);