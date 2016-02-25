<?php
 /**
 * Esse arquivo contém as opçoes padrão para fazer a busca dos imóveis.
 * @author jonas franco kreling
 *   
 */
?>

<!-- TOPO DA PÁGINA -->
<div class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12" ng-controller="CorpoController">
				<br />
				<?php
					echo CHtml::statefulForm( $this->createUrl('busca') , "post" , array('id'=>'formBuscaInicial', 'class'=>'form-horizontal')); 
				?>
					<div class="form-group">
						<div class="col-xs-6 col-sm-2">
							<?php
								echo CHtml::dropDownList('tpnegocio', $this->tpnegocio, 
              									CHtml::listData(Tpnegocio::model()->findAll(),'id', 'tpnegocio'),
              									array('empty' => 'Todos negócio', 'class'=>'form-control','require'=>''));  
							?>
						</div>
						<div class="col-xs-6 col-sm-2">
							<?php
								echo CHtml::dropDownList('tpimovel', $this->tpimovel, 
              								CHtml::listData(Tpimovel::model()->findAll(),'id', 'tpimovel'),
              								array('empty' => 'Todos imóveis', 'class'=>'form-control','require'=>''));  
							?>
						</div>
						<div class="col-xs-6 col-sm-2">
							<?php
								echo CHtml::dropDownList('cidade', $this->cidade, 
              									CHtml::listData(Cidade::model()->findAll(),'id', 'cidade'),
              									array('empty' => 'Todas cidades', 'class'=>'form-control','require'=>''));  
							?>
						</div>
						<div class="col-xs-6 col-sm-2">
							<?php
								$valores = array(
											'50000'=>'50.000,00',
											'100000'=>'100.000,00',
											'200000'=>'200.000,00',
											'500000'=>'500.000,00',
											'2000000'=>'2.000.000,00',
											'1000000000'=>'sem limites'
											);
								echo CHtml::dropDownList('valor', $this->valor, $valores,
              									array('empty' => 'Todos valores', 'class'=>'form-control','require'=>''));  
							?>
						</div>
						<div class="col-xs-12 col-sm-4 text-right esconder-celular">
							<button type='button' class='btn btn-default btn-block' ng-click="limpar('<?php echo $this->createUrl('busca'); ?>')">
								<span class='glyphicon glyphicon-refresh' aria-hidden='true'></span>&nbsp;Limpar busca
							</button>
						</div>
					</div>
					<div class='form-group'>
						<div class="col-xs-6 col-sm-2">
							<?php
								$valores = array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5);
								echo CHtml::dropDownList('qtdgaragem', $this->qtdgaragem, $valores,
              									array('empty' => 'Garagem', 'class'=>'form-control input-sm','require'=>''));  
							?>
						</div>
						<div class="col-xs-6 col-sm-2">
							<?php
								$valores = array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7);
								echo CHtml::dropDownList('qtdquarto', $this->qtdquarto, $valores,
              									array('empty' => 'Quartos', 'class'=>'form-control input-sm','require'=>''));  
							?>
						</div>
						<div class="col-xs-6 col-sm-2">
							<?php
								$valores = array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5);
								echo CHtml::dropDownList('qtdbanheiro', $this->qtdbanheiro, $valores,
              									array('empty' => 'Banheiros', 'class'=>'form-control input-sm','require'=>''));  
							?>
						</div>
						<div class="col-xs-6 col-sm-2">
							<?php
								$valores = array('S'=>'Sim','N'=>'Não');
								echo CHtml::dropDownList('quintal', $this->quintal, $valores,
              									array('empty' => 'Área de lazer', 'class'=>'form-control input-sm','require'=>''));  
							?>
						</div>
						<div class="col-xs-12 col-sm-4 text-right">
							<button type='button' class='btn btn-primary btn-block' ng-click='enviar()'>
								 <span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Buscar seu imóvel
							</button>
						</div>
					</div>
				<?php
					echo CHtml::endForm();  
				?>
			</div>
		</div>
	</div>
</div>