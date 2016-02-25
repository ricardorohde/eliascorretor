<?php
 /**
 * Esse arquivo contém o slide rotativo que aparece na maioria das páginas do site.
 * @author jonas franco kreling
 *   
 */
?>

<!-- TOPO DA PÁGINA -->
<div class="jumbotron tela-inicial bg1" >
	<div class="container" ng-controller='CorpoController'>
		<div class="row">
			<div class='col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9 conte-inicial busca-inicial esconder-celular'>
				<span class="glyphicon glyphicon-flag" aria-hidden="true"></span>&nbsp;&nbsp;Creci-F 25.401<br />
				<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;&nbsp;(48) 9964-2796<br />
				<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>&nbsp;&nbsp;Rua pedro taffarel, n° 1000<br />
				<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;&nbsp;eliascunha@gmail.com<br />
			</div>
			
			<div class="col-xs-12 col-md-12 busca-titulo-inicial">
				<h1 class="titulo-inicial">EliasCunha qualidade imobiliária</h1>
				<div class='col-xs-12 col-md-offset-2 col-md-8 busca-inicial'>
					<?php
						echo CHtml::statefulForm( $this->createUrl('buscainicial') , "post" , array('id' => 'formBuscaInicial')); 
					?>
						<div class='input-group'>
							<select name='buscainicial' id='buscainicial' class='form-control input-lg ' ng-model='item' ng-change='enviar()' >
								<option value=''>Encontre o imóvel de sua preferência</option>
								<optgroup label="Alugar">
    								<option value="alugar.casa">Casas</option>
    								<option value="alugar.apartamento">Apartamentos</option>
    								<option value="alugar.chácara">Chácaras</option>
    								<option value="alugar.sala comercial">Salas comerciais</option>
    								<option value="alugar.galpão">Galpões</option>
    								<option value="alugar.terreno">Terrenos</option>
  								</optgroup>
  								<optgroup label="Comprar">
    								<option value="comprar.casa">Casas</option>
    								<option value="comprar.apartamento">Apartamentos</option>
    								<option value="comprar.chácara">Chácaras</option>
    								<option value="comprar.sala comercial">Salas comerciais</option>
    								<option value="comprar.galpão">Galpões</option>
    								<option value="comprar.terreno">Terrenos</option>
  								</optgroup>
  								<optgroup label="Lançamentos">
    								<option value="lancamento.casa">Casas</option>
    								<option value="lancamento.apartamento">Apartamentos</option>
    								<option value="lancamento.chácara">Chácaras</option>
    								<option value="lancamento.sala comercial">Salas comerciais</option>
    								<option value="lancamento.terreno">Terrenos</option>
  								</optgroup>
							</select>
							<div class="input-group-btn">
								<button type='button' class="btn btn-primary btn-lg btn-celular">
									<span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
									<span class='esconder-celular'>Buscar</span>
								</button>
							</div>
						</div>
					<?php
						echo CHtml::endForm();  
					?>
				</div>
				<div class='col-md-12'>
					<a href='<?php echo $this->createUrl('admin/2');  ?>'><h5 class='titulo-inicial'>Anuncie seu imóvel</h5></a>
				</div>
			</div>
		</div>
	</div>
</div>