<?php
	
	include_once 'slideImageTopSemBusca.php';
	
?>

<!-- CORPO DA PÁGINA -->
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<h2><small>Trabalhe conosco</small></h2>
		</div>
		<?php
	
			include_once 'opcaoTopCorpo.php';
	
		?>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="nome">Nome completo</label>
				<input type="text" class="form-control" id="nome" placeholder="Nome completo">
			</div>
			<div class="form-group">
				<label for="experiencia">Experiência profissional <small>(500 caracteres)</small></label>
				<textarea class="form-control" id="experiencia" placeholder="Experiência profissional"></textarea>
			</div>
			<div class="form-group">
				<label for="contato">Contato <small>(100 caracteres)</small></label>
				<textarea class="form-control" id="contato" placeholder="Contato"></textarea>
			</div>
			<div class="form-group">
				<label for="salario">Pretenção salarial</label>
				<input type="text" class="form-control" id="salario" placeholder="Pretenção salarial">
			</div>
		</div>
	</div>
		
	<div class="row">
		<div class="col-xs-12 col-md-12 centered espacoTopBottom">
			<p><a class="btn btn-primary btn-lg" href="#" role="button">Enviar para Avaliação</a></p>
		</div>
	</div>
	<?php
	
		include_once 'opcoesBottom.php';
	
	?>
</div>