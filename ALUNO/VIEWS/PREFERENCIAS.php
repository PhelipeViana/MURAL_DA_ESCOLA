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

                        <!-- <tr>
                            <td>
                                <label for='pref_mostrar_not_prof' class='click_privacidade'>
                                    ANÚNCIO DOS INSTRUTORES EM QUE ESTOU INSCRITO
                                </label>
                            </td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" checked id='pref_mostrar_not_prof'>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr> -->
                        <tr>
                            <td>COR DO MEU PERFIL</td>
                            <td>
                                <input type="color"  class='form-control' value="<?= $DADOS[0]['cor_sistema'] ?>" id="escolhar_cor_sistema">
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
<script>
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