<?php 
$ID_PROJETO=noInjection($_REQUEST['p1']); 

$sql="SELECT * FROM quiz Q 
LEFT JOIN projeto as P
ON Q.REF_PROJETO_QUIZ=P.id_projeto
where Q.REF_PROJETO_QUIZ='$ID_PROJETO'";

$exe=mysqli_query($conn,$sql);
$num=mysqli_num_rows($exe);

while($row=mysqli_fetch_assoc($exe)){

$dados[]=$row;

}

echo json_encode(['st'=>1,'ret'=>$dados,'num'=>$num]);
?>