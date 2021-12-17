<div class="card">
    <div class="text-center">
        <button class="btn btn-primary" id="criar_quiz">CRIAR NOVO QUIZ</button>
    </div>
    <div class="card-body text-center" id="area_projetos" style="display: none;">
        <label for="">EDITAR QUIZ</label>
        <select id="lista_projetos" class="form-control"></select>
    </div>
</div>
<hr>

<div class="col-md-12" id="area_criacao_quiz" style="display: none;">
    <nav aria-label="Paginação dos itens" class="pull-center">
        <ul class="pagination">
            <?php
            for ($k = 0; $k < 10; $k++) {
            ?>
                <li class="page-item"><a class="page-link" href="#indice_pergunta_<?= $k ?>"><?= $k + 1 ?></a></li>
            <?php
            }
            ?>

        </ul>
    </nav>
    <div class="card">
        <div class="card-header card-header-primary text-center">
            <label for="" style="color: black !important;">Qual o nome do quiz?</label>
            <input type="text" class="form-control" id="form_nome_quiz" style="color: black !important;">

        </div>
        <div class="card-body">
            <?php
            for ($num = 0; $num < 10; $num++) {
            ?>
                <h3 class="text-center" id='indice_pergunta_<?= $num ?>'>PERGUNTA <?= $num + 1  ?>
                    <div id="ret_pergunta_<?= $num ?>"></div>
                </h3>
                <textarea class="form-control perguntas" id="p_<?= $num ?>" cols="30" rows="10" data-indice='<?= $num ?>'></textarea>
                <table class="table table-hover table-bordered">
                    <tbody>
                        <?php
                        for ($k = 1; $k < 6; $k++) {
                        ?>
                            <tr>
                                <td class="text-center">
                                    <input class="form-control sel_<?= $num ?>" type="radio" value="<?= $k ?>" name="p<?= $num ?>">
                                </td>
                                <td class='click_privacidade'>
                                    <input type="text" class="form-control respostas_<?= $num ?>" id='<?= 'p_' . $num . 'r_' . $k ?>' data-indice="<?= $k ?>">
                                </td>

                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                </table>


            <?php
            }
            ?>

        </div>
    </div>
</div>

<script>
    ListandoProjetos();
    $("#criar_quiz").click(function(e) {
        let ok = confirm('REGRAS\n São 10 perguntas\nCada Pergunta Contem 5 alternativas\nO Quiz só será publicado se estiver completo!\nSE CONCORDAR CLICK ABAIXO');
        if (ok) {
            criarQuiz()
            $("#area_criacao_quiz").hide();
        }
    })

    function criarQuiz() {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('6'),
            })
            .done(function(response) {
                alert('Projeto criado com sucesso!');
                ListandoProjetos();
            })
    }

    function ListandoProjetos() {

        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('7'),
            })
            .done(function(response) {
                let qtde = response.num;
                if (qtde > 0) {
                    $("#area_projetos").show();
                }
                montarListaProjeto(response);
            })

    }

    function montarListaProjeto(response) {
        let corpo = `<option value="0">SELECIONE O QUIZ</option>`;
        let indice = response.ret;
        for (let i = 0; i < indice.length; i++) {
            corpo += `<option value='${indice[i].id_projeto}'>
            PROJETO ${indice[i].id_projeto}</option>`
        }
        $("#lista_projetos").html(corpo);
    }
    $("#lista_projetos").change(function(e) {
        let valor = $(this).val();
        if (valor > 0) {
            $("#area_criacao_quiz").show()
            DadosQuiz(valor);
        } else {
            $("#area_criacao_quiz").hide()
        }
    })

    function DadosQuiz(id) {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('8', id),
            })
            .done(function(response) {

                montarQuiz(response)
            })
    }

    function montarQuiz(response) {
        let indice = response.ret;

        for (let i = 0; i < indice.length; i++) {

            $("#p_" + i)
                .html(indice[i].pergunta_quiz)
                .data('id_quiz', indice[i].id_quiz)
            $("#p_" + i + "r_1")
                .val(indice[i].r_1)
                .data('id_quiz', indice[i].id_quiz)
            $("#p_" + i + "r_2")
                .val(indice[i].r_2)
                .data('id_quiz', indice[i].id_quiz)
            $("#p_" + i + "r_3")
                .val(indice[i].r_3)
                .data('id_quiz', indice[i].id_quiz)
            $("#p_" + i + "r_4")
                .val(indice[i].r_4)
                .data('id_quiz', indice[i].id_quiz)
            $("#p_" + i + "r_5")
                .val(indice[i].r_5)
                .data('id_quiz', indice[i].id_quiz)
            $(".sel_" + i).attr('checked', false)
            $(".sel_" + i).each(function(e) {
                let valor = $(this).val();
                if (valor == indice[i].gabarito) {
                    $(this).attr('checked', true)
                }
                $(this).data('id_quiz', indice[i].id_quiz);
            }).change(function(e) {
                let valor = $(this).val();
                let id = $(this).data('id_quiz');

                AlterarGabarito(id, valor)
            })
            $(".respostas_" + i).change(function(e) {
                let id = $(this).data('id_quiz');
                let indice = $(this).data('indice');
                let valor = $(this).val();
                AlterarAlternativas(id, valor, indice)
            }) 


        }
      


        $(".perguntas")
            .change(function(e) {
                let id = $(this).data('id_quiz');
                let nova_pergunta = $(this).val()
                let indice = $(this).data('indice');
                AlterarPerguntas(id, nova_pergunta, indice)
            }).click(function(e) {
                let indice = $(this).data('indice');
                $("#ret_pergunta_" + indice).hide()
            })

    }

    function AlterarNome(id, nome) {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('12', id, nome),
            })
            .done(function(response) {
                alert('Alterado com sucesso!')
            })

    }

    function AlterarGabarito(id, pergunta) {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('11', id, pergunta),
            })
            .done(function(response) {
                console.log(response)
            })

    }

    function AlterarAlternativas(id, pergunta, indice) {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('10', id, pergunta, indice),
            })
            .done(function(response) {
                //console.log(response)
            })

    }

    function AlterarPerguntas(id, pergunta, indice) {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('9', id, pergunta),
            })
            .done(function(response) {
                retornoAlteracaoPerguntas(response, indice)
            })

    }

    function retornoAlteracaoPerguntas(response, indice) {
        let status = response.st;
        let corpo_erro = `<span class="badge badge-danger">Erro</span>`
        let corpo_sucesso = `<span class="badge badge-success">Alterado com sucesso</span>`
        $("#ret_pergunta_" + indice).show()
        if (status == 1) {
            $("#ret_pergunta_" + indice).html(corpo_sucesso)
        } else {
            $("#ret_pergunta_" + indice).html(corpo_erro)
        }

    }
</script>