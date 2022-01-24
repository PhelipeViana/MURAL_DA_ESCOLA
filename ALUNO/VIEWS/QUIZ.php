<style>
    @media only screen and (max-width: 988px) {
        #caderno {
            padding-top: 40px !important;


        }
    }

    #caderno {
        margin-top: 20px !important;
        padding-left: 25px !important;

    }

    .questoes {
        color: blue;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
    }

    .form-control[type=radio] {
        cursor: pointer;
    }

    .text-user {
        font-size: 12px !important;
    }

    .icone_menu {
        font-size: 15px;
        font-weight: bold;
    }

    #menu_tabs li a:hover {
        background-color: black;
        color: #fff;

    }
</style>


<div class="sidebar" data-color="white" data-background-color="black" style="overflow:scroll !important">
    <div class="logo">
        <a href="#" class="simple-text logo-normal">
            <img src="" style="width: 150px;" id="foto_prof">
        </a>
        <a id="nome_prof" class="simple-text text-user"></a>
        <a id="nome_projeto" class="simple-text text-user"></a>
        <a id="email_prof" class="simple-text text-user"></a>

    </div>
    <div class="sidebar-wrapper">

        <ul class="nav nav-pills" data-tabs="tabs" id="menu_tabs">
            <?php
            for ($a = 0; $a < 10; $a++) {
                if ($a == 0) {
                    $ativo = "active show";
                } else {
                    $ativo = "";
                }
            ?>
                <li>
                    <a class="nav-link  <?= $ativo ?> icone_menu" href="#quiz_<?= $a ?>" data-toggle="tab">
                        <?= $a + 1 ?>
                        <div class="pull-right" id='status_<?= $a ?>'>

                            <i class="fa fa-question-circle" aria-hidden="true" style="color: red !important;"></i>

                        </div>
                    </a>

                </li>

            <?php
            }
            ?>
            <li id="sair">
                <a class="nav-link icone_menu text-danger" href="#" data-toggle="tab">
                    SAIR
                    <div class="pull-right">
                        <i class="fa fa-sign-out" aria-hidden="true" style="color: red !important;"></i>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
        </div>
    </nav>
    <div class="navbar-wrapper" id="caderno">
        <div class="tab-content">
            <?php
            for ($num = 0; $num < 10; $num++) {
                if ($num == 0) {
                    $ativo = "active";
                } else {
                    $ativo = "";
                }
            ?>
                <div class="tab-pane <?= $ativo ?> menu_questao" id="quiz_<?= $num ?>">
                    <div class="card-body">
                        <h3 class="text-center">PERGUNTA <?= $num + 1 ?></h3>
                        <div class="card-header">
                            <div id="p_<?= $num ?>"></div>

                        </div>

                        <table class="table table-hover table-bordered">
                            <tbody>
                                <?php
                                for ($k = 0; $k < 5; $k++) {
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <input class="form-control escolha" type="radio" name="p<?= $num ?>" id='<?= 'p_' . $num . 'q_' . $k ?>' data-indice='<?= $num ?>'>
                                        </td>
                                        <td for='<?= 'p_' . $num . 'q_' . $k ?>'>
                                            <label class='questoes' for='<?= 'p_' . $num . 'q_' . $k ?>' id="<?= 'p' . $num . 'q' . $k ?>"></label>


                                        </td>

                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

</div>



<script>
    let respondido = ` 
    <i class="fa fa-check-circle" aria-hidden="true"
    style="color: green !important;"></i>
    `
    let pendente = ` 
    <i class="fa fa-question-circle" aria-hidden="true" style="color: red !important;"></i>
    `
    QuizEscolhido();

    function QuizEscolhido() {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('30', '<?= $PROJETO_INICIADO ?>'),
            })
            .done(function(response) {
                montarTelaQuestoes(response);
            })
    }

    function montarTelaQuestoes(response) {
        let corpo_quiz = "";
        let indice = response[0].caderno_de_prova.QUESTOES;
        let dados = response[0].caderno_de_prova.DADOS;
        let foto = dados.FOTO;
        let preenchido = response.RESPOSTAS;

        for (let i = 0; i < indice.length; i++) {
            $("#p_" + i).html(indice[i].pergunta_quiz)

            $("#p" + i + 'q' + 0).html(indice[i].r_1)
                .data('check', 1)

            $("#p" + i + 'q' + 1).html(indice[i].r_2)
                .data('check', 2)

            $("#p" + i + 'q' + 2).html(indice[i].r_3)
                .data('check', 3)

            $("#p" + i + 'q' + 3).html(indice[i].r_4)
                .data('check', 4)

            $("#p" + i + 'q' + 4).html(indice[i].r_5)
                .data('check', 5)

            //indice
            $("#p_" + i + 'q_' + 0)
                .val(1).data('q', indice[i].id_quiz).data('p', indice[i].REF_PROJETO_QUIZ)
                .addClass('q_' + indice[i].id_quiz)


            $("#p_" + i + 'q_' + 1).val(2).data('q', indice[i].id_quiz).data('p', indice[i].REF_PROJETO_QUIZ)
                .addClass('q_' + indice[i].id_quiz)

            $("#p_" + i + 'q_' + 2).val(3).data('q', indice[i].id_quiz).data('p', indice[i].REF_PROJETO_QUIZ)
                .addClass('q_' + indice[i].id_quiz)


            $("#p_" + i + 'q_' + 3).val(4).data('q', indice[i].id_quiz).data('p', indice[i].REF_PROJETO_QUIZ)
                .addClass('q_' + indice[i].id_quiz)


            $("#p_" + i + 'q_' + 4).val(5).data('q', indice[i].id_quiz).data('p', indice[i].REF_PROJETO_QUIZ)
                .addClass('q_' + indice[i].id_quiz)

            $("#status_" + i).addClass('st_' + indice[i].id_quiz)


        }
        $("#foto_prof").attr('src', foto);
        $("#nome_prof").html(dados.NOME);
        $("#nome_projeto").html(dados.PROJETO);
        $("#email_prof").text(dados.EMAIL)
        $(".escolha").change(function(e) {
            let c = $(this).val();
            let q = $(this).data('q');
            let p = $(this).data('p');
            let indice = $(this).data('indice');

            responder(c, q, p, indice);
        })

        for (let x = 0; x < preenchido.length; x++) {
            $(".q_" + preenchido[x].REF_ID_QUIZ).each(function(e) {
                let valor = $(this).val();
                if (valor == preenchido[x].REF_ESCOLHA) {
                    let id = $(this).attr('id')
                    $("#" + id).prop('checked', true);

                }

            })
            $(".st_" + preenchido[x].REF_ID_QUIZ).html(respondido)

        }

    }
    $("#sair").click(function(e) {
        let ok = confirm('Deseja finalizar o quiz?');
        if (ok) {
            sair();
        }

    })

    function responder(c, q, p, indice) {
        $("#status_" + indice).html(respondido);
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('31', c, q, p),
            })
            .done(function(response) {
                console.log(response);
            })
    }

    function sair() {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('32'),
            })
            .done(function(response) {
                alert(response.msg);
                window.location.assign('index.php');
            })
    }
</script>