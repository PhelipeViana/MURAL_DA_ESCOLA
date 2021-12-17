  <div class="card card-profile">
    <div class="card-avatar">
      <a href="javascript:;">
        <img class="img" src="ALUNOS/img/faces/avatar.jpg" />
      </a>
    </div>
    <div class="card-body">
      <h6 class="card-category text-gray">Alessandra Viana</h6>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?$var?>edit_informacao">
        EDITAR <i class="material-icons">create</i>
      </button>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="<?$var?>edit_informacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">EDITAR INFORMAÇÕES</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form id="<?$var?>form_edit_user">
          <div class="form-group">
            <label>Nome Completo</label>
            <input type="text" class="form-control" autocomplete="off" name="nome">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" autocomplete="off" name="email">
          </div>

          <div class="form-group">
            <label>Senha</label>
            <input type="password" class="form-control" autocomplete="off" name="senha">
          </div>

          <div class="form-group">
            <label>Cpf</label>
            <input type="text" class="form-control" autocomplete="off" name="cpf">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Salvar</button>
        </form>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
      </div>
    </div>
  </div>
</div>
<script>



</script>