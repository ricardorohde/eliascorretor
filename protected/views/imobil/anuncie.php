<?php
	
	include_once 'slideImageTopSemBusca.php';
	
?>

<!-- CORPO DA PÁGINA -->
<div class="container" ng-controller="AnuncieController">
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<h2><small>Formulário de Anúncio</small></h2>
		</div>
		<?php
	
			include_once 'opcaoTopCorpo.php';
	
		?>
	</div>
	<?php
		echo CHtml::statefulForm( $this->createUrl('salvarAnuncio') , "post" , array('id' => 'formCadastrarAnuncio')); 
	?>
	<div class="row">
		<br />
		<div class="col-xs-12 col-md-6">
			<div class="form-class col-md-6">
				<label for="descricao" required>Tipo de negócio*</label>
				<?php
					echo CHtml::dropDownList('tpnegocio', '', 
              									CHtml::listData(Tpnegocio::model()->findAll(),'id', 'tpnegocio'),
              									array('empty' => '-- Selecione --', 'class'=>'form-control','require'=>'','ng-model'=>'anuncio.tpnegocio'));  
				?>
				
			</div>
			<div class="form-group col-md-6">
				<label for="descricao">Tipo de imóvel*</label>
				<?php
					echo CHtml::dropDownList('tpimovel', '', 
              									CHtml::listData(Tpimovel::model()->findAll(),'id', 'tpimovel'),
              									array('empty' => '-- Selecione --', 'class'=>'form-control','require'=>'','ng-model'=>'anuncio.tpimovel'));  
				?>
			</div>
			<div class="form-group col-md-6">
				<label for="endereco">Endereço do anúncio</label>
				<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço/Localização" maxlength="100" require='' ng-model='anuncio.endereco' />
			</div>
			<div class="form-group col-md-6">
				<label for="descricao">Cidade*</label>
				<?php
					echo CHtml::dropDownList('cidade', '', 
              									CHtml::listData(Cidade::model()->findAll(),'id', 'cidade'),
              									array('empty' => '-- Selecione --', 'class'=>'form-control','require'=>'','ng-model'=>'anuncio.cidade'));  
				?>
			</div>
			<div class="form-group col-md-6">
				<label for="valor">Valor* <small>(R$)</small></label>
				<input type="text" class="form-control text-right bold-font" id="valor" require='' ng-model='anuncio.valor' ui-money-mask maxlength='17' />
				<input type="hidden" value='{{anuncio.valor}}' name='valor' />
			</div>
			<div class="form-group col-md-6">
				<label for="valor">Tempo</label>
				<select class='form-control' name='qtdcomodo'>
					<option value='0'></option>
  					<option value='1'>Dia</option>
  					<option value='2'>Semana</option>
  					<option value='3'>Quinzena</option>
  					<option value='4'>Mês</option>
  					<option value='5'>Trimestre</option>
  					<option value='6'>Semestre</option>
  					<option value='7'>Anual</option>
  					<option value='8'>Bienal</option>
				</select>
			</div>
			<div class="form-group col-md-12">
				<label for="descricao">Descrição* <small>(5000 caracteres)</small></label>
				<textarea class="form-control" rows='8' name='descricao' id="descricao" placeholder="Descrição do anúncio" maxlength='5000' require='' ng-model='anuncio.descricao' ></textarea>
			</div>
		</div>
		
		<div class="col-xs-12 col-md-5 col-md-offset-1">
			<div class="form-group col-md-6">
				<label for="descricao">Qt. de comodos</label>
				<select class='form-control' name='qtdcomodo'>
					<option value='0'>Não tem comodos</option>
					<?php  
						for($i=0;$i<20;$i++)
  							echo "<option value='1'>".$i."</option>";
					?>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label for="descricao">Qt. de quartos</label>
				<select class='form-control' name='qtdquarto'>
					<option value='0'>Não tem quarto</option>
  					<option value='1'>1</option>
  					<option value='2'>2</option>
  					<option value='3'>3</option>
  					<option value='4'>4</option>
  					<option value='5'>5</option>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label for="descricao">Qt. de banheiros</label>
				<select class='form-control' name='qtdbanheiro'>
					<option value='0'>Não tem banheiro</option>
  					<option value='1'>1</option>
  					<option value='2'>2</option>
  					<option value='3'>3</option>
  					<option value='4'>4</option>
  					<option value='5'>5</option>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label for="descricao">Qt. de garagens</label>
				<select class='form-control' name='qtdgaragem'>
					<option value='0'>Não tem garagem</option>
  					<option value='1'>1</option>
  					<option value='2'>2</option>
  					<option value='3'>3</option>
  					<option value='4'>4</option>
  					<option value='5'>5</option>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label for="descricao">Área do terreno</label>
				<input type="text" class="form-control text-right bold-font" id="areaterreno" require='' ng-model='anuncio.areaterreno' ui-number-mask maxlength='17' />
			</div>
			<div class="form-group col-md-6">
				<label for="descricao">Área construída</label>
				<input type="text" class="form-control text-right bold-font" id="areaconstrucao" require='' ng-model='anuncio.areaconstrucao' ui-number-mask maxlength='17' />
			</div>
			<div class="form-group col-md-6">
				<label for="descricao">Área da piscina</label>
				<input type="text" class="form-control text-right bold-font" id="areapiscina" require='' ng-model='anuncio.areapiscina' ui-number-mask maxlength='17' />
			</div>
			<div class="form-group col-md-6">
				<label for="descricao">Qt. andares</label>
				<select class='form-control' name='andar'>
  					<?php  
						for($i=0;$i<40;$i++)
  							echo "<option value='1'>".$i."</option>";
					?>
				</select>
			</div>
			<div class="form-group col-sm-6">
				<div class="col-sm-12">
      				<div class="checkbox">
        				<label>
          					<input type="checkbox" name="quintal" id="quintal1"> Quintal/Área de lazer
        				</label>
      				</div>
    			</div>
			</div>
			<div class="form-group col-sm-6">
				<div class="col-sm-12">
      				<div class="checkbox">
        				<label>
          					<input type="checkbox" name="areaservico" id="areaservico1"> Área de Serviço
        				</label>
      				</div>
    			</div>
			</div>
			<div class="form-group col-sm-6">
				<div class="col-sm-12">
      				<div class="checkbox">
        				<label>
          					<input type="checkbox" name="piscina" id="piscina1"> Piscina
        				</label>
      				</div>
    			</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="imageFile">Imagem <small>(Você pode adicionar até 8 imagens do seu imóvel)</small></label>
				<input type="file" id="imageFile" onchange="carregar(event)" />
				<canvas id="imageCanvas" style="display:none;"></canvas>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 text-right">
			<a class="btn btn-default btn-lg" href="<?php echo Yii::app()->baseUrl; ?>">Cancelar anuncio</a>
			<?php
				echo CHtml::button("Publicar anuncio", array('ng-click'=>'validar()','id' => 'btCadastrar', 'class' => 'btn btn-primary btn-lg', 'name' => 'formAnuncio', 'title' => 'Salvar as informacoes do anuncio.'));
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-3">
			<a href="#" class="thumbnail">
				<img src="<?php echo Yii::app()->baseUrl."/assets"; ?>/images/simbolo/thumbnail-default.jpg" id="imagem1">
			</a>
			<h5 class="centered">Imagem 1</h5>
		</div>
		<div class="col-xs-12 col-md-3">
			<a href="#" class="thumbnail">
				<img src="<?php echo Yii::app()->baseUrl."/assets"; ?>/images/simbolo/thumbnail-default.jpg" id="imagem2">
			</a>
			<h5 class="centered">Imagem 2</h5>
		</div>
		<div class="col-xs-12 col-md-3">
			<a href="#" class="thumbnail">
				<img src="<?php echo Yii::app()->baseUrl."/assets"; ?>/images/simbolo/thumbnail-default.jpg" id="imagem3">
			</a>
			<h5 class="centered">Imagem 3</h5>
		</div>
		<div class="col-xs-12 col-md-3">
			<a href="#" class="thumbnail">
				<img src="<?php echo Yii::app()->baseUrl."/assets"; ?>/images/simbolo/thumbnail-default.jpg" id="imagem4">
			</a>
			<h5 class="centered">Imagem 4</h5>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-3">
			<a href="#" class="thumbnail">
				<img src="<?php echo Yii::app()->baseUrl."/assets"; ?>/images/simbolo/thumbnail-default.jpg" id="imagem5">
			</a>
			<h5 class="centered">Imagem 5</h5>
		</div>
		<div class="col-xs-12 col-md-3">
			<a href="#" class="thumbnail">
				<img src="<?php echo Yii::app()->baseUrl."/assets"; ?>/images/simbolo/thumbnail-default.jpg" id="imagem6">
			</a>
			<h5 class="centered">Imagem 6</h5>
		</div>
		<div class="col-xs-12 col-md-3">
			<a href="#" class="thumbnail">
				<img src="<?php echo Yii::app()->baseUrl."/assets"; ?>/images/simbolo/thumbnail-default.jpg" id="imagem7">
			</a>
			<h5 class="centered">Imagem 7</h5>
		</div>
		<div class="col-xs-12 col-md-3">
			<a href="#" class="thumbnail">
				<img src="<?php echo Yii::app()->baseUrl."/assets"; ?>/images/simbolo/thumbnail-default.jpg" id="imagem8">
			</a>
			<h5 class="centered">Imagem 8</h5>
		</div>
	</div>
	<input type='hidden' value='' name='enderecoImagem1' id='enderecoImagem1' />
	<input type='hidden' value='' name='enderecoImagem2' id='enderecoImagem2' />
	<input type='hidden' value='' name='enderecoImagem3' id='enderecoImagem3' />
	<input type='hidden' value='' name='enderecoImagem4' id='enderecoImagem4' />
	<input type='hidden' value='' name='enderecoImagem5' id='enderecoImagem5' />
	<input type='hidden' value='' name='enderecoImagem6' id='enderecoImagem6' />
	<input type='hidden' value='' name='enderecoImagem7' id='enderecoImagem7' />
	<input type='hidden' value='' name='enderecoImagem8' id='enderecoImagem8' />
	<div class="row">
		<div class="col-xs-12 col-md-12 text-right espacoTopBottom">
			<a class="btn btn-default btn-lg" href="<?php echo Yii::app()->baseUrl; ?>">Cancelar anuncio</a>
			<?php
				echo CHtml::button("Publicar anuncio", array('ng-click'=>'validar()','id' => 'btCadastrar', 'class' => 'btn btn-primary btn-lg', 'name' => 'formAnuncio', 'title' => 'Salvar as informacoes do anuncio.'));
			?>
		</div>
	</div>
	<?php
		echo CHtml::endForm();  
	?>
	<?php
	
		include_once 'opcoesBottom.php';
	
	?>
</div>