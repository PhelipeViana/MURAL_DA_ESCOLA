 <?php 
 $var='page_cursos';
 ?> 

 <?php 
 if(isset($ID_AULA) && $ID_AULA > 0){
  include 'ALUNOS/views/CURSOS/QUADRO_ASSISTINDO_AULA.php';
}else{
  ?>
  <div class="row">
    <div class="col-lg-12 col-md-12">
     <?php include 'ALUNOS/views/CURSOS/QUADRO_FOTO_CURSOS_MATRICULADO.php'; ?>
   </div>
 </div>


 <?php 
}
?>