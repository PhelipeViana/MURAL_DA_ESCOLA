<?php
$ID_SALA = noInjection($_REQUEST['p1']);

$sql_verifica = "SELECT * FROM `aluno_sala` WHERE 
`token_aluno_sala`='$TOKEN_USER' AND `REF_ID_SALA`='$ID_SALA'";
$exe_verifica = mysqli_query($conn, $sql_verifica);
$num_verifica = mysqli_num_rows($exe_verifica);
/*VERIFICA O TIPO DE SALA*/
$sql_tipo = "SELECT * FROM `salas` WHERE `id_sala`='$ID_SALA'";
$exe_tipo = mysqli_query($conn, $sql_tipo);
$LINHA = mysqli_fetch_assoc($exe_tipo);
$TIPO_SALA = $LINHA['tipo_sala'];
//1 publico 2 privado

if ($num_verifica > 0) {
    //verifica o status da participação
    echo json_encode(['msg' => 'já participa da sala', 'st' => 2]);
} else {
    if ($TIPO_SALA == 1) {
        //sala publica
        $sql = "INSERT INTO `aluno_sala` (`token_aluno_sala`, `REF_ID_SALA`, `status_convite`) VALUES ('$TOKEN_USER','$ID_SALA',1)";
        $exe = mysqli_query($conn, $sql);
        if ($exe) {
            echo json_encode(['msg' => 'entrou com sucesso', 'st' => 1]);
        } else {
            echo json_encode(['msg' => 'Erro ao entrar na sala', 'st' => 0]);
        }
    } else {
        //sala privada
        echo json_encode(['msg' => 'SALA PRIVADA', 'st' => 0]);
    }
}
