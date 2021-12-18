<?php 

$sql="SELECT login_acesso FROM `acesso` WHERE `tipo_acesso`=2";

$exe=mysqli_query($conn,$sql);
$num=mysqli_num_rows($exe);

while($row=mysqli_fetch_assoc($exe)){

$dados[]=$row;

}

echo json_encode(['st'=>1,'ret'=>$dados,'num'=>$num]);