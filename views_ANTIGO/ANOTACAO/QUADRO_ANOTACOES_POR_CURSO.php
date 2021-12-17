
<div class="row">
	<?php 
	for($i=1;$i<6;$i++){
		?>
		<div class="col-md-4 col-xs-6">
			<div class="card" style="margin: 9px;">
				<h3 class="text-center">ANOTAÇÃO CURSO <?=$i?></h3>
				<img class="card-img-top" src="https://media.istockphoto.com/vectors/note-pad-vector-id899619970?s=612x612" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">Tarefas</h5>
					<table class="table table-hover table-striped table-hover">
						<tbody>
							<tr>
								<td>
									14/05/2021 18:03:43
								</td>

								<td>
									Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, culpa ipsum nisi? Sequi consequuntur enim
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
			</div>
		</div>

		<?php
	}

	?>
</div>