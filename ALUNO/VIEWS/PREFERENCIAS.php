<div class="row">
    <div class="col-md-4">
        <div class="card card-profile">
            <div class="card-avatar">
                <form method="post" action="" enctype="multipart/form-data" id="myform">
                    <div class='preview'>
                        <img class="img" id="avatar" src='<?= $DADOS[0]['avatar'] ?>'>
                    </div>

            </div>
            <div>
                <input hidden type="file" id="file" name="file" />
            </div>
            </form>
            <div class="card-body">
                <h6 class="card-category text-gray"><?= $DADOS[0]['nome'] ?></h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_informacao">
                    EDITAR <i class="material-icons">create</i>
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">PREFERÊNCIAS DO SISTEMA</h4>
                <p class="card-category">Escolha pessoal</p>
            </div>
            <div class="card-body">
                <h1>PRIVACIDADE</h1>
                <table class="table table-hover table-bordered">
                    <tbody>

                        <tr>
                            <td>COR DO MEU PERFIL</td>
                            <td>
                                <input type="color" class='form-control' value="<?= $DADOS[0]['cor_sistema'] ?>" id="escolhar_cor_sistema">
                            </td>
                        </tr>
                        <tr>
                            <td>REDEFINIR SENHA</td>
                            <td>
                                <button data-toggle="modal" data-target="#modal_senha" class='btn btn-danger btn-block'>NOVA SENHA</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            $(".click_privacidade")
                .css('cursor', 'pointer')
        </script>
    </div>
</div>
<div class="modal fade" id="modal_senha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Redefinir Senha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="form_senha">
                    <label for="">Email</label>
                    <input type="text" class="form-control nv" id="input_email_esqueci" value="" name="email">
                    <label for="">Telefone Cadastrado</label>
                    <input type="text" class="form-control mask-phone nv" name="telefone" required>
                    <label for="">Nova Senha</label>
                    <input type="password" class="form-control nv" id="input_senha1" value="" name="senha1" required>
                    <label for="">Digite Novamente</label>
                    <input type="password" class="form-control nv" id="input_senha2" value="" name="senha2" required>
                    <input type="hidden" name="auth" value="33">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">REDEFINIR</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#form_senha").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= $ENDPOINT ?>",
            data: $(this).serialize(),
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                let status = response.st;
                if (status > 0) {
                    alert('Entre com a nova senha!');
                    $(".nv").val('');
                    window.location.assign('_deslogar.php');
                } else {
                    alert(response.msg)
                    $(".nv").css('color', 'red');
                }

            }
        });
    })


    $("#escolhar_cor_sistema").change(function(e) {
        let cor = $(this).val();
        mudarCor(cor);
    })

    function mudarCor(cor) {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('3', cor),
            })
            .done(function(response) {
                let status = response.st;
                if (status == 0) {
                    alert('Ops! Tente novamente mais tarde!')
                } else {
                    document.location.reload(true);
                }

            })

    }
    $("#avatar").click(function(e) {
        $("#file").trigger('click')
    })

    $("#file").change(function() {
        var fd = new FormData();
        var files = $('#file')[0].files;
        if (files.length > 0) {
            fd.append('file', files[0]);
            fd.append('auth', 4);
            fd.append('TOKEN_USER', "<?= $TOKEN_USER ?>");

            $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response != 0) {
                        $("#avatar").attr("src", response);
                        //$('.preview img').show();
                    } else {
                        alert('Ops! Imagem inválida');
                    }
                }
            });
        } else {
            alert("Selecione uma imagem");
        }
    });
</script>