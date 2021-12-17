<?php
$data = date('Y-m-d H:i:s');
$sql_projeto = "INSERT INTO `projeto`(token_gestor_projeto,`nome_projeto`) VALUES ('$TOKEN_USER','NOVO PROJETO $data')";

$exe_projeto = mysqli_query($conn, $sql_projeto);
$ID_PROJETO = mysqli_insert_id($conn);


for ($i = 1; $i < 11; $i++) {
    $PERGUNTA = "PERGUNTA " . $i;
    $sql_quiz = "INSERT INTO quiz (
    REF_PROJETO_QUIZ,
    pergunta_quiz,
    r_1,
    r_2,
    r_3,
    r_4,
    r_5,
    data_criacao_quiz) VALUES (
    '$ID_PROJETO',
    '$PERGUNTA',
    'ALTERNATIVA A',
    'ALTERNATIVA B',
    'ALTERNATIVA C',
    'ALTERNATIVA D',
    'ALTERNATIVA E',
        
    '$data')";
    $exe_quiz = mysqli_query($conn, $sql_quiz);
}

echo json_encode(['msg' => 'sucesso', 'id' => $ID_PROJETO, 'st' => 1]);
