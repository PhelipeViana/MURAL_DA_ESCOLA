<?php
$email = noInjection($_REQUEST['p1']);

$sql = "SELECT * FROM acesso as AC 
LEFT JOIN dados as DD
ON AC.token_acesso=DD.REF_TOKEN
WHERE AC.login_acesso='$email' and AC.tipo_acesso=2";
$exe = mysqli_query($conn, $sql);
$num = mysqli_num_rows($exe);

if ($num > 0) {

    while ($row = mysqli_fetch_assoc($exe)) {

        $dados[] = $row;
    }
    $TK_PROFESSOR = $dados[0]['token_acesso'];

    $sql_salas = "SELECT 
    *,
    (SELECT COUNT(id_alunosala) FROM `aluno_sala` WHERE `token_aluno_sala`='$TOKEN_USER' AND `REF_ID_SALA`=SL.id_sala) AS PARTICIPA,
    (SELECT status_convite FROM `aluno_sala` WHERE `token_aluno_sala`='$TOKEN_USER' AND `REF_ID_SALA`=SL.id_sala) AS STATUS_CONVITE    
    FROM `salas` as SL WHERE SL.token_user_sala='$TK_PROFESSOR' 
    and SL.tipo_sala=1
    ORDER BY SL.nome_sala";
    $exe_sala = mysqli_query($conn, $sql_salas);
    while ($r = mysqli_fetch_assoc($exe_sala)) {

        $salas[] = $r;
    }


    echo json_encode(['st' => 1, 'ret' => $dados, 'num' => $num, 'salas' => $salas]);
} else {
    echo json_encode(['st' => 0, 'num' => 0, 'msg' => 'Nenhum professor encontrado']);
}
