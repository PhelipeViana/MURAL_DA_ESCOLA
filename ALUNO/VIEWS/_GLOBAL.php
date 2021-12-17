      <!-- Modal -->
      <div class="modal fade" id="edit_informacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">PREFERÊNCIAS</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form id="form_edit_user">
                          <div class="form-group">
                              <label>Nome Completo</label>
                              <input type="text" class="form-control" autocomplete="off" name="nome" value="<?= $DADOS[0]['nome'] ?>">
                          </div>
                          <div class="form-group">
                              <label>Email (Login)</label>
                              <input type="email" class="form-control" autocomplete="off" name="email" value="<?= $DADOS[0]['email'] ?>" id='email'>
                          </div>
                          <div class="form-group">
                              <label>Cpf</label>
                              <input type="text" class="form-control mask-cpf" autocomplete="off" name="cpf" value="<?= $DADOS[0]['cpf'] ?>">
                          </div>
                          <label for="">Telefone</label>
                          <input type="text" class="form-control mask-phone" name="telefone" required value="<?= $DADOS[0]['telefone'] ?>">

                          <label for="">Estado</label>
                          <select class="form-control" id='estado' name="estado" required></select>
                          <label for="">Cidade</label>
                          <select class="form-control" id='cidade' name="cidade" required></select>
                          <label for="">SEXO</label>
                          <select class="form-control" name="sexo" required>
                              <?php
                                if ($DADOS[0]['sexo'] == 1) {
                                    $mas = "selected";
                                    $fem = "";
                                } else {
                                    $mas = "";
                                    $fem = "selected";
                                }
                                ?>
                              <option value="1" <?=$mas?>>Masculino</option>
                              <option value="2" <?=$fem?>>Feminino</option>
                          </select>

                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                      </form>

                      <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
                  </div>
              </div>
          </div>
      </div>

      <script>
          editar.cidade("estado", "cidade", "<?= $DADOS[0]['estado'] ?>", "<?= $DADOS[0]['cidade'] ?>");
          $(".mask-phone").mask("(99) 99999-9999");
          $("#form_edit_user").submit(function(e) {
              e.preventDefault();

              editarDados("form_edit_user")
          });

          function editarDados(form) {
              $.ajax({
                      url: '<?= $ENDPOINT; ?>',
                      type: 'POST',
                      dataType: 'json',
                      data: DADOS.FORM('5', form),
                  })
                  .done(function(response) {
                      let status = response.st;
                      if (status == 1) {
                          alert('Sucesso!');
                          $("#edit_informacao").modal('hide');
                          $("#email")
                              .css('color', 'black')
                      } else {
                          alert('Ops! email já existe');
                          $("#email")
                              .css('color', 'red')
                              .focus()
                      }

                  })

          }
      </script>