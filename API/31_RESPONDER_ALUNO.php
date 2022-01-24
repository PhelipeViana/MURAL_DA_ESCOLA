<?php
$ESCOLHA = noInjection($_REQUEST['p1']);
$ID_QUIZ = noInjection($_REQUEST['p2']);
$PROJETO = noInjection($_REQUEST['p3']);

$sql_busca = "SELECT `gabarito` FROM `quiz` WHERE `id_quiz`='$ID_QUIZ'";
$exe_busca = mysqli_query($conn, $sql_busca);
$ROW = mysqli_fetch_assoc($exe_busca);
$GABARITO = $ROW['gabarito'];

if ($GABARITO == $ESCOLHA) {
    $NOTA_FINAL = 1;
} else {
    $NOTA_FINAL = 0;
}

//VERIFICAR SE A RESPOSTA JÁ EXISTE
$sql_verificar = "SELECT * FROM `gabarito_quiz` WHERE 
`REF_ALUNO`='$TOKEN_USER' AND `REF_ID_QUIZ`='$ID_QUIZ'";
$exe_verificar = mysqli_query($conn, $sql_verificar);
$EXISTE = mysqli_num_rows($exe_verificar);

if ($EXISTE > 0) {
    //atualiza resposta existente
    $sql="UPDATE `gabarito_quiz` 
    SET REF_ESCOLHA='$ESCOLHA', 
    REF_GABARITO='$GABARITO',
    NOTA='$NOTA_FINAL'
    where `REF_ALUNO`='$TOKEN_USER' AND `REF_ID_QUIZ`='$ID_QUIZ'";
} else {
//cria a resposta se nao existe
    $sql = "INSERT INTO `gabarito_quiz`(
        `REF_PROJETO`,
        `REF_ALUNO`,
        `REF_ID_QUIZ`,
        `REF_ESCOLHA`,
        `REF_GABARITO`,
        `NOTA`) VALUES ('$PROJETO','$TOKEN_USER','$ID_QUIZ','$ESCOLHA','$GABARITO','$NOTA_FINAL')";
}



$exe = mysqli_query($conn, $sql);
if ($exe) {
    $exe = true;
} else {
    $exe = false;
}



echo json_encode(['exe' => $exe]);
