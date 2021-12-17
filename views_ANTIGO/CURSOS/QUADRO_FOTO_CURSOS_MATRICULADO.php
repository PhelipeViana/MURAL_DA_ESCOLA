<div class="row">
	<?php 
	for($i=1;$i<2;$i++){
		?>
		<div class="col-md-3 col-xs-6">
			<div class="card" style="width: 18rem; margin: 15px;">
				<h3>MATEMATICA</h3>
				<img class="card-img-top" src="https://i2.wp.com/www.sabra.org.br/site/wp-content/uploads/2019/05/matematica-e-musica-como-relacionar-os-dois-20181024171547.jpg.jpg?fit=800%2C533&ssl=1" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">Prof° Ribeiro Santos</h5>
					<div class="progress">
						<div class="progress-bar bg-primary" role="progressbar" style="width: 10%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">10%</div>
					</div>
					<a href="?pagina=CURSOS&id=<?=$i?>">
						<button class="btn btn-outline-danger">Assistir</button>
					</a>
				</div>
			</div>
		</div>

		<?php
	}

	?>
</div>