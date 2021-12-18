<div id="area_notify"></div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <div class="row">
                    <div class="col-9">
                        <div class="ui-widget">
                            <input type="text" class="form-control" placeholder="Digite email do professor" id="input_buscar_prof">
                        </div>
                    </div>
                    <button class="btn" id="btn_buscar">
                        <span class="material-icons">
                            search
                        </span>
                    </button>
                </div>


            </div>
            <div class="card-body" id="area_resultado_professor"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">

                        <!-- INCIO LISTA TAREFAS -->
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#<?= $var ?>tarefas_pendentes" data-toggle="tab">
                                    <i class="material-icons">pending_actions</i> PENDENTES
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#<?= $var ?>tarefas_realizadas" data-toggle="tab">
                                    <i class="material-icons">check_circle</i>FEITOS
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#<?= $var ?>tarefas_corrigidas" data-toggle="tab">
                                    <i class="material-icons">done_all</i> CORRIGIDO
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                        </ul>
                        <!-- FIM LISTA TAREFAS -->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <!-- CORPO TAREFAS PENDENTES -->
                    <div class="tab-pane active" id="<?= $var ?>tarefas_pendentes">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        MICROBIOLOGIA TESTE 4
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Fazer" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--FIM  CORPO TAREFAS PENDENTES -->
                    <div class="tab-pane" id="<?= $var ?>tarefas_realizadas">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>FISIOLOGIA TESTE 7</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Refazer" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="<?= $var ?>tarefas_corrigidas">
                        <table class="table">
                            <tbody>

                                <tr>
                                    <td>GRAMÁTICA INSTRUMENTAL</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="VER CORREÇÃO" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>MATEMÁTICA INSTRUMENTAL</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="VER CORREÇÃO" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    verificandoConvitePendente()
    setInterval(verificandoConvitePendente, 60000);


    function verificandoConvitePendente() {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('26'),
            })
            .done(function(response) {
                montarNotificadorConvite(response)
            })
    }

    function montarNotificadorConvite(response) {
        let indice = response.ret;
        let corpo = "";
        if (indice != null) {
            for (let i = 0; i < indice.length; i++) {
                corpo += ` 
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                ${indice[i].nome} está te convidando para participar da sala
                <strong>${indice[i].nome_sala}</strong>
                <strong>${indice[i].escola_sala}</strong>
                <button type="button" class="btn btn-success aceita_convite" data-id='${indice[i].id_alunosala}'>
                ACEITAR
                <span class="material-icons">
                check_circle
                </span>
                </button>
                <button type="button" class="btn btn-danger recusar_convite" 
                data-id='${indice[i].id_alunosala}'>
                RECUSAR
                <span class="material-icons">
                cancel
                </span>
                </button>
                </div>   
                `
            }
        } else {
            corpo = "";
        }
        $("#area_notify").html(corpo)
        $(".aceita_convite").click(function(e) {
            let id = $(this).data('id');
            alterarStatusConvite(id, 1)
        })
        $(".recusar_convite").click(function(e) {
            let id = $(this).data('id');
            alterarStatusConvite(id, 0)
        })
     

    }

    function alterarStatusConvite(id, status) {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('27', id, status),
            })
            .done(function(response) {
                console.log(response)
                verificandoConvitePendente();
            })
    }



    $("#btn_buscar").click(function(e) {
        let valor = $("#input_buscar_prof").val();
        let email = isEmail(valor);
        if (email) {
            BuscaProfessor(valor);

        } else {
            alert('ops! Email inválido')
            $("#input_buscar_prof")
                .focus()
        }

    })

    function BuscaProfessor(email) {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('18', email),
            })
            .done(function(response) {
                montarListaProf(response)
            })
    }

    function montarListaProf(response) {
        let corpo = "";
        let indice = response.ret;
        let salas = response.salas;
        let qtde = response.num;
        if (qtde > 0) {
            corpo += ` 
            <button class='btn btn-danger btn-block' id='limpar_pesquisa'>
            LIMPAR PESQUISA 
            </button>
            <div class='row'>
            <div class='col-6'><img src='${indice[0].avatar}' class='img-fluid'></div>
            <div class='col-6'>
            <p><strong>${indice[0].nome}</strong></p>
            <p><strong>${indice[0].email}</strong></p>            
            </div>
            </div>
            <hr>     
            `
            if (salas !== null) {
                corpo += ` 
                  
                    <table class='table table-striped table-sm-responsive'>
                    <thead>
                    <tr>
                    <th>SALA</th>
                    <th>ESCOLA</th>
                    <th>STATUS</th>
                    </tr>
                    </thead>
                    <tbody>
                `
                for (let i = 0; i < salas.length; i++) {
                    let status_sala = salas[i].PARTICIPA;
                    let status_convite = salas[i].STATUS_CONVITE;
                    let btn_entrar = "";
                    if (status_sala > 0) {
                        if (status_convite == 0) {
                            btn_entrar = `<button class='btn btn-secondary'>
                            CONVITE PENDENTE
                            </button>`;
                        } else {
                            btn_entrar = `<button class='btn btn-primary'>
                            JÁ PARTICIPO
                            </button>`;
                        }

                    } else {
                        btn_entrar = `<button class='btn btn-danger entrar_sala'
                        data-sala='${salas[i].id_sala}'
                        data-indice='${i}'
                        >ENTRAR 
                        <span class="material-icons">login</span>
                        </button>`;
                    }

                    corpo += ` 
                    <tr>
                    <td>${salas[i].nome_sala}</td>
                    <td>${salas[i].escola_sala}</td>
                    <td id='area_btn_${i}'>${btn_entrar}</td>
                    </tr>                 
                `
                }
                corpo += ` 
                </tbody>
                </table>
                `
            } else {
                corpo += `<h1 class='text-center'>NENHUMA SALA CADASTRADA</h1>`
            }


        } else {
            alert('Nenhum professor encontrado');
            corpo = "";
        }

        $("#area_resultado_professor").html(corpo)
        $(".entrar_sala").click(function(e) {
            let sala = $(this).data('sala');
            let indice = $(this).data('indice');


            let ok = confirm('Deseja fazer parte dessa sala?');
            if (ok) {
                entrarNaSala(sala, indice)
            }

        })
        $("#limpar_pesquisa").click(function(e) {
            $("#area_resultado_professor").html('')
            $("#input_buscar_prof")
                .val('')
                .focus()


        })

    }

    function entrarNaSala(sala, indice) {
        $("#area_btn_" + indice).html('.....')
        let btn = `<button class='btn btn-primary'>
        JÁ PARTICIPO
        </button>`;

        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('19', sala),
            })
            .done(function(response) {
                let status = response.st;
                if (status == 1) {
                    $("#area_btn_" + indice).html(btn)
                } else {
                    $("#area_btn_" + indice).html(btn)
                }


            })

    }

    function isEmail(email) {
        const res = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return res.test(String(email).toLowerCase());
    }
    //autocomplete dos professores
    $.ajax({
            url: '<?= $ENDPOINT; ?>',
            type: 'POST',
            dataType: 'json',
            data: DADOS.PARS('25'),

        })
        .done(function(response) {
            preencher(response);

        })

    function preencher(response) {
        let data = new Array();
        let indice = response.ret
        for (let i = 0; i < indice.length; i++) {
            data.push(indice[i].login_acesso); //indice do banco
        }
        $("#input_buscar_prof").autocomplete({
            source: data,
            autoFocus: true
        });
    }
</script>