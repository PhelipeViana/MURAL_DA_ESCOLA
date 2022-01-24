<?php
$ID = noInjection($_REQUEST['p1']);

$sql_verica = "SELECT id_acesso FROM `acesso` WHERE 
token_acesso='$TOKEN_USER' and `PROJETO_INICIADO`=0";
$exe_verica = mysqli_query($conn, $sql_verica);
$num = mysqli_num_rows($exe_verica);

$sql_feito="SELECT * FROM `resultado_projeto_aluno` WHERE `REF_ALUNO_RES`='$TOKEN_USER' and `REF_PROJ`='$ID'";
$exe_feito = mysqli_query($conn, $sql_feito);
$num_feito = mysqli_num_rows($exe_feito);


if ($num > 0 && $num_feito < 1) {
    //montar a prova
    $sql_prova = "SELECT * FROM `quiz` WHERE `REF_PROJETO_QUIZ`=$ID ORDER BY RAND()";
    $exe_prova = mysqli_query($conn, $sql_prova);
    while ($r = mysqli_fetch_assoc($exe_prova)) {
        $prova[] = $r;
    }
    //outros dados da prova
    $sql_dados_prova = "SELECT * FROM projeto as P
    left join dados as D
    ON P.token_gestor_projeto=D.REF_TOKEN
    left join acesso as AC
    ON AC.token_acesso=P.token_gestor_projeto 
    WHERE P.id_projeto='$ID'";
    $exe_dados_prova=mysqli_query($conn,$sql_dados_prova);
    $ROW=mysqli_fetch_assoc($exe_dados_prova);
    $DATA['NOME']=$ROW['nome'];
    $DATA['EMAIL']=$ROW['email'];
    $DATA['PROJETO']=$ROW['nome_projeto'];
    $DATA['VIDEO']=$ROW['url_video'];
    $DATA['FOTO']=$ROW['avatar'];
    
    

    $caderno = json_encode(['QUESTOES'=>$prova,'DADOS'=>$DATA]);

    $sql_inicio = "INSERT INTO `resultado_projeto_aluno` 
    (`REF_ALUNO_RES`, `REF_PROJ`, `nota`, `caderno_de_prova`) 
    VALUES ('$TOKEN_USER','$ID',0,'$caderno')";

    $exe_inicio = mysqli_query($conn, $sql_inicio);
    $NEW_ID=mysqli_insert_id($conn);
    if ($exe_inicio) {
        //seta o quiz no acesso
        $sql = "UPDATE `acesso` SET `PROJETO_INICIADO`='$NEW_ID' WHERE token_acesso='$TOKEN_USER'";
        $exe = mysqli_query($conn, $sql);
        if ($exe) {
            echo json_encode(['msg' => 'sucesso', 'st' => 1]);
        } else {
            echo json_encode(['msg' => 'ops! Tente novamente mais tarde', 'st' => 0]);
        }
    } else {
        echo json_encode(['st' => 0]);
    }
} else {
    //já tem projeto em andamento
    echo json_encode(['msg' => 'USUÁRIO JÁ POSSUI PROJETO EM ANDAMENTO', 'st' => 0]);
}
