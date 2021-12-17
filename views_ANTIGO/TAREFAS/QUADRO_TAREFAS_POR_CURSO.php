<div class="row">
	<?php 
	for($i=1;$i<6;$i++){
		?>
		<div class="col-md-3 col-xs-6">
			<div class="card" style="width: 18rem; margin: 15px;">
				<h3>MATEMATICA <?=$i?></h3>
				<img class="card-img-top" src="https://blog.seguridade.com.br/wp-content/uploads/2017/04/como-gerenciar-tarefas-da-minha-equipe-de-forma-efetiva.jpeg.webp" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">Tarefas</h5>
					<table class="table table-hover table-striped">
						<tbody>
							<tr>
								<td><a href="#">EXERCICIO 1</a></td>
								<td>PENDENTE</td>
								<td class="td-actions text-right">
									<button type="button" rel="tooltip" title="Fazer" class="btn btn-primary btn-link btn-sm">
										<i class="material-icons">edit</i>
									</button>

								</td>
							</tr>
							<tr>
								<td><a href="#">EXERCICIO 2</a></td>
								<td>FEITO</td>
								<td class="td-actions text-right">
									<button type="button" rel="tooltip" title="Refazer" class="btn btn-primary btn-link btn-sm">
										<i class="material-icons">edit</i>
									</button>

								</td>
							</tr>
							<tr>
								<td><a href="#">EXERCICIO 3</a></td>
								<td>CORRIGIDO</td>
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

		<?php
	}

	?>
</div>