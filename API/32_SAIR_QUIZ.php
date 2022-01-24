<?php
//a logica está como se houvesse apenas 1 projeto por vez
$sql_verifica = "SELECT `PROJETO_INICIADO` FROM `acesso` WHERE `token_acesso`='$TOKEN_USER'";
$exe_verifica = mysqli_query($conn, $sql_verifica);
$row = mysqli_fetch_assoc($exe_verifica);
$ID_PROJETO_FINALIZADO = $row['PROJETO_INICIADO'];

if ($ID_PROJETO_FINALIZADO > 0) {

    /*DADOS DO PROJETO*/
    $sql_projeto = "SELECT * FROM `resultado_projeto_aluno` WHERE `idresprojaluno`='$ID_PROJETO_FINALIZADO'";
    $exe_proj = mysqli_query($conn, $sql_projeto);
    $r = mysqli_fetch_assoc($exe_proj);
    $ID_PROJETO_ATIVO = $r['REF_PROJ'];

    /*DEFINIÇÃO DE NOTA */
    $NOTA = "SELECT SUM(NOTA) as TOTAL FROM `gabarito_quiz` WHERE 
`REF_PROJETO`='$ID_PROJETO_ATIVO'
AND
`REF_ALUNO`='$TOKEN_USER'";
    $exe_nota = mysqli_query($conn, $NOTA);
    $n = mysqli_fetch_assoc($exe_nota);
    $nota_final = $n['TOTAL'];

    /*finalizar nota*/
    $sql_final = "UPDATE 
    `resultado_projeto_aluno` SET `nota`=$nota_final,
    `status_finalizado`=1 WHERE `idresprojaluno`='$ID_PROJETO_FINALIZADO'";
    $exe_final = mysqli_query($conn, $sql_final);
    /*retirar do acesso */
    $sql_acesso = "UPDATE `acesso` SET `PROJETO_INICIADO`=0 WHERE `token_acesso`='$TOKEN_USER'";
    $exe_acesso = mysqli_query($conn, $sql_acesso);
    if ($exe_acesso) {
        $exe_acesso = true;
    } else {
        $exe_acesso = false;
    }


    echo json_encode(['st' =>$exe_acesso, 'msg' => 'Finalizado com sucesso!']);
} else {
    echo json_encode(['msg' => 'Quiz já finalizado']);
}
