<?php

$NOME = noInjection($_REQUEST['p1']);
$NOME = strtolower($NOME);
$SALA = noInjection($_REQUEST['p2']);

if (isEmail($NOME)) {
    //procura por email
    $sql = "SELECT 
    REF_TOKEN,
    avatar,
    nome,
    email,
    (SELECT COUNT(ALS.id_alunosala) FROM `aluno_sala` as ALS WHERE  ALS.token_aluno_sala=AC.token_acesso AND ALS.REF_ID_SALA='$SALA') AS SITUACAO,
    (SELECT ALS.status_convite FROM `aluno_sala` as ALS WHERE  
    ALS.token_aluno_sala=AC.token_acesso AND ALS.REF_ID_SALA='$SALA' ) AS STATUS_CONVITE  
    FROM acesso AS AC
    left join dados as DD
    ON AC.token_acesso=DD.REF_TOKEN 
    
    where AC.login_acesso='$NOME' and AC.tipo_acesso=1";
    $exe = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($exe);
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($exe)) {
            $dados[] = $row;
        }

        echo json_encode(['st' => 1, 'ret' => $dados, 'num' => $num]);
    } else {
        echo json_encode(['msg' => 'Nenhum aluno encontrado', 'st' => 0, 'num' => 0]);
    }
} else {
    //procura por ID do Aluno
    $sql = "SELECT 
    REF_TOKEN,
    avatar,
    nome,
    email,
    (SELECT COUNT(ALS.id_alunosala) FROM `aluno_sala` as ALS WHERE  ALS.token_aluno_sala=AC.token_acesso AND ALS.REF_ID_SALA='$SALA') AS SITUACAO,
    (SELECT ALS.status_convite FROM `aluno_sala` as ALS WHERE  
    ALS.token_aluno_sala=AC.token_acesso AND ALS.REF_ID_SALA='$SALA' ) AS STATUS_CONVITE  
    FROM acesso AS AC
    left join dados as DD
    ON AC.token_acesso=DD.REF_TOKEN 
    
    where AC.id_acesso='$NOME' and AC.tipo_acesso=1";
    $exe = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($exe);
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($exe)) {
            $dados[] = $row;
        }

        echo json_encode(['st' => 1, 'ret' => $dados, 'num' => $num]);
    } else {
        echo json_encode(['msg' => 'Nenhum aluno encontrado', 'st' => 0, 'num' => 0]);
    }
}
