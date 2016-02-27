<?php
 /**
 * Esse arquivo contém o slide rotativo que aparece na maioria das páginas do site.
 * @author jonas franco kreling
 *   
 */
 	$config = Config::model()->findByPK(1);
 	
 	$pattern = '/(\d{2})(\d{4})(\d+)/i';
	$replacement = '($1) $2-$3';
	
?>

<!-- TOPO DA PÁGINA -->
<div  ng-controller='CorpoController'>
<div class="jumbotron tela-inicial bg1" ng-class='backgroundImage'>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 busca-titulo-inicial">
				<h1 class="titulo-inicial"><?php echo $config->nomesite;?> seu corretor de imóveis</h1>
				<div class='col-xs-12 col-md-offset-2 col-md-8 busca-inicial'>
					<?php
						echo CHtml::statefulForm( $this->createUrl('buscainicial') , "post" , array('id' => 'formBuscaInicial')); 
					?>
						<div class='input-group'>
							<select name='buscainicial' id='buscainicial' class='form-control input-lg ' ng-model='item' ng-change='enviar()' >
								<option value=''>Encontre o imóvel de sua preferência</option>
								<!-- optgroup label="Alugar">
    								<option value="alugar.casa">Casas</option>
    								<option value="alugar.apartamento">Apartamentos</option>
    								<option value="alugar.chácara">Chácaras</option>
    								<option value="alugar.sala comercial">Salas comerciais</option>
    								<option value="alugar.galpão">Galpões</option>
    								<option value="alugar.terreno">Terrenos</option>
  								</optgroup> -->
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
					<h5 class='titulo-inicial telefones esconder-celular'>
						<span class='left-inicial'><?php echo preg_replace($pattern, $replacement, $config->celular1); ?></span>
						<span class='left-inicial'><?php echo preg_replace($pattern, $replacement, $config->celular2); ?></span>
						<span class='left-inicial'><?php echo preg_replace($pattern, $replacement, $config->celular3); ?></span>
						<span class='left-inicial'><?php echo preg_replace($pattern, $replacement, $config->celular4); ?></span>
					</h5>
				</div>
				
			</div>
		</div>
	</div>
</div>
</div>