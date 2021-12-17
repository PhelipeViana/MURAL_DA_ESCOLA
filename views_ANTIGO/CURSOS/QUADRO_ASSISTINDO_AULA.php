<div class="row">
	<a href="?pagina=CURSOS">
		<button class="btn btn-danger">VOLTAR</button>
	</a>
</div>
<h1 class="text-center">CURSO <?=$ID_AULA?></h1>

<div class="row">
	<div class="col-md-8">
		<div id="<?=$var?>_semvideo">
			<h1 class="text-center">Seja bem vindo(a)</h1>
			<p class="text-danger text-center">Escolha um video clicando na lateral direita. BOA AULA!</p>
			
		</div>
		<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="" allowfullscreen id="<?=$var?>_video_principal"></iframe>
		</div>	
	</div>
	<div class="col-md-4">
		<div class="card"  style="width: 18rem">
			<table class="table table-hover table-responsive-md">
				<thead class="text-warning">
					<th colspan="2" class="text-right">
						<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#<?=$var?>_modal_anotacoes">
							FAZER ANOTAÇÕES 
							<i class="material-icons">drive_file_rename_outline</i>	
						</button>

					</th>
				</thead>
				<tbody>
					<?php 
					$VIDEOS_TESTE=[
						'zrf6_UJlK-0',
						'6BAypTlvWQM',
						'8SunmLyTfbQ',
						'OwPHCtsZ5Tw',
						'aw_lZ6uTYtE'
					];
					for($i=1;$i < count($VIDEOS_TESTE);$i++){

						?>
						<tr>
							<td class="<?=$var?>linha_escolha_video" data-url='<?=$VIDEOS_TESTE[$i]?>'>
								<i class="fa fa-video-camera" aria-hidden="true"></i> AULA <?=$i?>
								
							</td>

							<td>
								<button type="button" rel="tooltip" title="Baixar Arquivo" class="btn btn-primary btn-link btn-sm">
									<i class="material-icons">file_download</i>
								</button>
							</td>

							
						</tr>
						<?php
					}
					?>					
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="card">
	<div class="card-header card-header-tabs card-header-primary">
		<div class="nav-tabs-navigation">
			<div class="nav-tabs-wrapper">
				<span class="nav-tabs-title"></span>
				<!-- INCIO LISTA TAREFAS -->
				<ul class="nav nav-tabs" data-tabs="tabs">
					<li class="nav-item">
						<a class="nav-link active" href="#<?=$var?>lista_minhas_anotacoes" data-toggle="tab">
							<i class="material-icons">drive_file_rename_outline</i>MINHAS ANOTAÇÕES
							<div class="ripple-container"></div>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#<?=$var?>lista_perguntas_resposta" data-toggle="tab">
							<i class="material-icons">contact_support</i>PERGUNTAS E RESPOSTA
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
			<div class="tab-pane active" id="<?=$var?>lista_minhas_anotacoes">
				<table class="table">
					<tbody>
						<tr>
							<td>
								14/05/2021 18:03:43
							</td>

							<td>
								Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, culpa ipsum nisi? Sequi consequuntur enim unde, aperiam, molestias quo dolore quam ipsum odio, rem, placeat. Porro esse beatae illo est?
							</td>
							<td class="td-actions text-right">
								<button type="button" rel="tooltip" title="CORRIGIR ANOTAÇÃO" class="btn btn-primary btn-link btn-sm">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" rel="tooltip" title="DELETAR ANOTAÇÃO" class="btn btn-danger btn-link btn-sm">
									<i class="material-icons">close</i>
								</button>

							</td>
						</tr>
						<tr>
							<td>
								14/05/2021 23:45:12
							</td>

							<td>
								Lorem ipsum dolor sit
							</td>
							<td class="td-actions text-right">
								<button type="button" rel="tooltip" title="CORRIGIR ANOTAÇÃO" class="btn btn-primary btn-link btn-sm">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" rel="tooltip" title="DELETAR ANOTAÇÃO" class="btn btn-danger btn-link btn-sm">
									<i class="material-icons">close</i>
								</button>

							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="tab-pane" id="<?=$var?>lista_perguntas_resposta">
				<h1>PERGUNTAS E RESPOSTAS</h1>
			</div>


			
		</div>
	</div>
</div>







<div class="modal fade" id="<?=$var?>_modal_anotacoes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style='margin-top: -30% !important;'>
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center">FAZER ANOTAÇÕES</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<textarea name="anotacao" id="" cols="10" rows="1" class="form-control" 
				placeholder="O que deseja anotar?"></textarea>
				
			</div>
			<div class="modal-footer">
				<button class="btn-primary btn">Salvar</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>

			</div>
		</div>
	</div>
</div>

<script>
	$(".<?=$var?>linha_escolha_video").css('cursor','pointer')
	$(".<?=$var?>linha_escolha_video").on('click',function(e){
		$(".<?=$var?>linha_escolha_video").removeClass('text-danger')
		$(this).addClass('text-danger')
		let video=$(this).data('url');
		let url='https://www.youtube.com/embed/'+video+'?rel=0'
		$("#<?=$var?>_video_principal").attr('src',url);
		$("#<?=$var?>_semvideo").hide()
	})
</script>