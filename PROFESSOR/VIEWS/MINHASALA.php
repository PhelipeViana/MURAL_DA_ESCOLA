<div class="card">
    <div class="text-center">
        <button class="btn btn-primary" id="criar_sala" data-toggle="modal" data-target="#modal_criar_sala">CRIAR MINHA SALA</button>
    </div>

</div>

<div class="row" id="area_salas"></div>

<!-- Modal -->
<div class="modal fade" id="modal_criar_sala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CRIAR SALA DE AULA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_criar_sala">
                    <label for="">Nome da Sala</label>
                    <input type="text" name="nome_da_sala" class="form-control nova_sala" required>
                    <label for="">Escola da Sala</label>
                    <input type="text" name="escola_da_sala" class="form-control nova_sala" required>
                    <label for="">Tipo de Sala</label>
                    <select name="tipo_da_sala" id="" class="form-control" required>
                        <option value="1">PÚBLICA</option>
                        <option value="2">PARTICULAR</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">CRIAR</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_editar_sala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR SALA DE AULA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_editar_sala">
                    <label for="">Nome da Sala</label>
                    <input type="text" name="nome_da_sala" id="nome_da_sala" class="form-control " required>
                    <label for="">Escola da Sala</label>
                    <input type="text" id="escola_da_sala" name="escola_da_sala" class="form-control " required>
                    <label for="">Tipo de Sala</label>
                    <select id="tipo_da_sala" name="tipo_da_sala" class="form-control" required>
                        <option value="1">PÚBLICA</option>
                        <option value="2">PARTICULAR</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                    EDITAR <i class="material-icons">edit</i>

                </button>
                <input type="hidden" name="id" id="id_sala">
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_adicionar_aluno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADICIONAR ALUNO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <table class="table table-stripe table-bordered">
                        <thead>
                            <tr>
                                <th>ID / EMAIL</th>
                                <th>
                                    <input type="text" placeholder="Digite o ID ou Email" id="input_pesquisa_aluno">
                                    <input type="hidden" id="ref_sala">
                                </th>
                                <th>
                                    <button class="btn btn-primary" id="btn_pesquisa_aluno">
                                        <span class="material-icons">
                                            search
                                        </span>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="alunos_pesquisa"></tbody>

                    </table>
                </div>


            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_add_quiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADICIONAR QUIZ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="corpo_quiz_sala">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
            </div>
        </div>
    </div>
</div>



<script>
    ListarSala();

    $("#btn_pesquisa_aluno").click(function(e) {
        let valor = $("#input_pesquisa_aluno").val()
        let sala = $("#ref_sala").val();
        if (valor > 0 || valor != "") {
            ProcurarAlunoSala(valor, sala);
        } else {
            alert('Ops! Pesquisa vazia');
            $("#input_pesquisa_aluno").focus();
        }

    })




    function projetosPorSala(sala) {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('21', sala),
            })
            .done(function(response) {
                montarProjetoSala(response, sala);
            })
    }

    function montarProjetoSala(response, sala) {
        let qtde = response.num;
        let indice = response.ret;
        let corpo = "";
        if (qtde == 0) {
            corpo += `<a href='<? $SITE ?>/QUIZ'><h3 class='text-center'>DESEJA CRIAR UM QUIZ?</a></h3>`;
        } else {
            corpo += `<table class='table table-striped table-bordered'>
            <thead>
                <tr>
                    <th>NOME</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>`;
            for (let i = 0; i < indice.length; i++) {
                let stadd = indice[i].ADICIONADO;
                let stproj = indice[i].STATUS_PROJETO;
                let btn_comando = "";
                if (stadd == 0) {
                    btn_comando = `<button class='btn btn-primary aplicar_quiz'
                    data-indice='${i}'
                    data-projeto='${indice[i].id_projeto}'
                    data-sala='${sala}'
                    >APLICAR</button>`
                } else {
                    if (stproj == 1) {
                        btn_comando = `<button class='btn btn-success retirar_quiz'
                    data-indice='${i}'
                    data-projeto='${indice[i].id_projeto}'
                    data-sala='${sala}'
                    >DISPONIVEL</button>`
                    } else {

                        btn_comando = `<button class='btn btn-danger ativar_quiz'
                    data-indice='${i}'
                    data-projeto='${indice[i].id_projeto}'
                    data-sala='${sala}'
                    >INDISPONÍVEL</button>`
                    }

                }
                corpo += `<tr>
                <td>${indice[i].nome_projeto}</td>
                <td id='area_${i}'>${btn_comando}</td>
                
                </tr>`;
            }
            corpo += `</tbody></table>`;

        }
        $("#corpo_quiz_sala").html(corpo);
        $(".aplicar_quiz").click(function(e) {
            let projeto = $(this).data('projeto');
            let sala = $(this).data('sala');
            let indice = $(this).data('indice');
            let ok = confirm('O quiz ficará disponivel para a SALA REALIZAR-LO\nTem certeza disso?');
            if (ok) {
                AplicarProjeto(projeto, sala, indice)
            }
        })
        $(".retirar_quiz").click(function(e) {
            let projeto = $(this).data('projeto');
            let sala = $(this).data('sala');
            let indice = $(this).data('indice');
            let ok = confirm('O QUIZ FICARÁ INDISPONIVEL TEMPORARIAMENTE\nTEM CERTEZA DESSA AÇÃO?');
            if (ok) {
                RetirarProjeto(projeto, sala, indice);
            }
        })
        $(".ativar_quiz").click(function(e) {
            let projeto = $(this).data('projeto');
            let sala = $(this).data('sala');
            let indice = $(this).data('indice');
            let ok = confirm('O QUIZ VOLTARÁ A FICAR DISPONIVEL\nTEM CERTEZA DISSO?');
            if (ok) {
                ReativarProjeto(projeto, sala, indice);
            }
        })


    }

    function ReativarProjeto(proj, sala, indice) {
        $("#area_" + indice).html('...')
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('24', proj, sala),
            })
            .done(function(response) {
                projetosPorSala(sala)
            })
    }

    function RetirarProjeto(proj, sala, indice) {
        $("#area_" + indice).html('...')
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('23', proj, sala),
            })
            .done(function(response) {
                projetosPorSala(sala)
            })
    }

    function AplicarProjeto(proj, sala, indice) {
        $("#area_" + indice).html('...')
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('22', proj, sala),
            })
            .done(function(response) {
                projetosPorSala(sala)
                ListarSala();
            })
    }


    function AdicionarAlunoSala(aluno, sala) {
        $("#btn_add_aluno").html('...');
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('17', aluno, sala),
            })
            .done(function(response) {
                let status = response.st;
                if (status == 0) {
                    alert('Erro ao adicionar na sala');
                } else if (status == 1) {
                    $("#area_convite").html('CONVITE ENVIADO!')
                    $("#input_pesquisa_aluno")
                        .val('')
                        .focus();
                } else {
                    alert("CONVITE ENVIADO!")
                }


            })
    }

    function ProcurarAlunoSala(nome, sala) {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('16', nome, sala),
            })
            .done(function(response) {
                montarAlunoEncontrado(response)

            })
    }

    function montarAlunoEncontrado(response) {
        let indice = response.ret;
        let NUM = response.num;
        let corpo = "";
        if (NUM > 0) {
            for (let i = 0; i < indice.length; i++) {
                //verificador de situaçã
                let situacao = indice[i].SITUACAO;
                let status_convite = indice[i].STATUS_CONVITE;
                let btn_situacao = "";
                if (situacao > 0) {
                    if (status_convite == 0) {
                        btn_situacao = `<button 
                    class='btn btn-secondary'>
                    CONVITE JÁ ENVIADO!
                    </button>`;
                    } else {
                        btn_situacao = `<button 
                    class='btn btn-success'>
                    CONVITE ACEITO
                    </button>`;
                    }

                } else {
                    btn_situacao = `<button 
                    class='btn btn-primary' 
                    data-aluno='${indice[i].REF_TOKEN}' id='btn_add_aluno'>
                    <span class="material-icons">group_add</span>
                    </button>`;
                }
                corpo += ` 
                <tr>
                <td>
                <img src='${indice[i].avatar}' class='img-fluid' style="border-radius:25px; max-height:500px">
                </td>
                <td class='text-center'>
                <p>${indice[i].nome}<p>
                <p><a href='mailto:${indice[i].email}'>${indice[i].email}</a><p>
                 
                </td>
                <td id='area_convite'>${btn_situacao}</td>
                </tr>
                
                `

            }

        } else {
            alert('NENHUM ALUNO ENCONTRADO!');
            corpo = "";
        }
        $("#alunos_pesquisa").html(corpo)
      
        $("#btn_add_aluno").click(function(e) {
            let aluno = $(this).data('aluno');
            let sala = $("#ref_sala").val();

            AdicionarAlunoSala(aluno, sala)
        })



    }

    function ListarSala() {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.PARS('14'),
            })
            .done(function(response) {
                montarSalas(response);

            })
    }

    function montarSalas(response) {
        
        let indice = response.ret;
        let corpo = "";

        if (indice !== null) {
            for (let i = 0; i < indice.length; i++) {
                corpo += ` 
                <div class="col-md-3 col-xs-6">
                <div class="card">
                
                <h3 class="text-center">${indice[i].nome_sala}
                <button type="button" rel="tooltip" title="EDITAR SALA" class="btn btn-danger btn-link btn-sm pull-left editar_sala"
                data-sala='${indice[i].nome_sala}'
                data-escola='${indice[i].escola_sala}'
                data-tipo='${indice[i].tipo_sala}'
                data-id='${indice[i].id_sala}'
                
                ><i class="material-icons">edit</i>
                </button>
                </h3>
            <img class="card-img-top" src="https://blog.seguridade.com.br/wp-content/uploads/2017/04/como-gerenciar-tarefas-da-minha-equipe-de-forma-efetiva.jpeg.webp" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-center">${indice[i].escola_sala}</h5>

                <table class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td><a href="#">ALUNOS</a></td>
                            <td>${indice[i].MATRICULADOS}</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="Adicionar" class="btn btn-primary btn-link btn-sm adiciona_aluno" data-sala='${indice[i].id_sala}'>
                                    <i class="material-icons">add_circle_outline</i>
                                </button>

                            </td>
                        </tr>
                        <tr>
                            <td><a href="#">QUIZ</a></td>
                            <td>${indice[i].QUIZ}</td>
                            <td class="td-actions text-right">
                                <button type="button" rel="tooltip" title="Adicionar Quiz" class="btn btn-primary btn-link btn-sm add_quiz"
                                data-sala='${indice[i].id_sala}'>
                                    <i class="material-icons">add_circle_outline</i>
                                </button>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>  `

            }


        } else {
            corpo = `NENHUMA SALA CRIADA!`;
        }
        $("#area_salas").html(corpo);

        $(".add_quiz").click(function(e) {
            let sala = $(this).data('sala')

            projetosPorSala(sala);
            $("#modal_add_quiz").modal('show');
        })
        $(".editar_sala").click(function(e) {
            let sala = $(this).data('sala');
            let escola = $(this).data('escola');
            let tipo = $(this).data('tipo');
            let id = $(this).data('id');

            $("#nome_da_sala").val(sala);
            $("#escola_da_sala").val(escola);
            $("#tipo_da_sala").val(tipo)
            $("#id_sala").val(id)


            $("#modal_editar_sala").modal('show');
        })
        $(".adiciona_aluno").click(function(e) {
            let idsala = $(this).data('sala');
            $("#modal_adicionar_aluno").modal('show');
            //LIMPAR O MODAL
            $("#input_pesquisa_aluno").val('');
            $("#alunos_pesquisa").html('');

            //setar a referencia da sala
            $("#ref_sala").val(idsala)

        })

    }
    $("#form_editar_sala").submit(function(e) {
        e.preventDefault();
       
        EditarSala("form_editar_sala");
    })

    //
    $("#form_criar_sala").submit(function(e) {
        e.preventDefault();
      
        CriarSala("form_criar_sala")
    })

    function CriarSala(form) {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.FORM('13', form),
            })
            .done(function(response) {
                let status = response.st;
                if (status == 1) {
                    alert('Nova sala criada com sucesso!');
                    ListarSala();

                    $("#modal_criar_sala").modal('hide');
                    $(".nova_sala").val('');
                } else {
                    alert('Ops! Erro ao deletar sala');
                }


            })

    }

    function EditarSala(form) {
        $.ajax({
                url: '<?= $ENDPOINT; ?>',
                type: 'POST',
                dataType: 'json',
                data: DADOS.FORM('15', form),
            })
            .done(function(response) {
                let status = response.st;
              
                if (status == 1) {
                    alert('Editada sala criada com sucesso!');
                    $("#modal_editar_sala").modal('hide');
                    ListarSala();

                } else {
                    alert('Ops! Erro ao editar sala');
                }


            })
    }
</script>