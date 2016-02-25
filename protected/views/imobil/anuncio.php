<?php
	
	include_once 'camposBusca.php';
	
?>
<!-- CORPO DA PÁGINA -->
<?php
	$anuncio = Anuncio::model()->findByPk($this->anuncio);  
?>
<script>var anuncioid = <?php echo $anuncio->id; ?>; var anuncio = <?php echo CJSON::encode($anuncio); ?>;console.log(anuncio);</script>
<div class="container" ng-controller="AnuncioController">
	
	<div class='row'>
		<div class="form-group bottom">
			<div class="col-xs-3 col-sm-1">
				<h4 class="titulo-anuncio text-center">
					<?php echo $anuncio->id; ?>
				</h4>
			</div>
			<div class="col-xs-9 col-sm-5">
				<h4 class="titulo-anuncio">
					<span class='text-capitalize'><?php echo $anuncio->Tpimovel->tpimovel.'</span> para '.$anuncio->Tpnegocio->tpnegocio; ?>
				</h4>
			</div>
			<div class='col-xs-12 col-sm-4'>
				<h4 class="titulo-anuncio text-right">
					<small>
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
						<?php
							$endereco = $anuncio->Cidade->cidade.' - '.$anuncio->endereco;
						 	echo (strlen($endereco) >= 55)? substr($endereco, 0, 55).'...':$endereco; 
						?>
					</small>
				</h4>
			</div>
			<div class="col-xs-12 col-sm-2">
				<h4 class="titulo-anuncio text-right">
					<small>
						<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
						<?php echo strftime('%d de %b, %G',strtotime($anuncio->data)); ?>
					</small>
				</h4>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-1">
			<?php
				$inicio = 'true';
				$count = 0;
				foreach ($anuncio->Imagemanuncio as $key => $value) {
					if($inicio === 'true'){
						echo "<input type='hidden' ng-init='path = \"".$value->url."\"' />";
						$inicio = 'false';
					}
					echo "<div class='col-xs-3 col-sm-12 thumbnail hand margin-right'><img ng-click='mudarPath(\"".$value->url."\")' src='".$value->url."'></div>";
					$count += 1;
				}
				if($count === 0){
					echo "<p ng-init='path = \"".(Yii::app()->baseUrl."/assets/images/simbolo/thumbnail-default.jpg")."\"'>Não possue imagem disponível</p>";
				}
			?>
		</div>
		<div class='col-xs-12 col-sm-5'>
			<div class='thumbnail col-sm-12 shadow-image'>
				<div class='valor-image'  ng-init="valor = <?php echo $anuncio->valor; ?>">
					<h4>{{valor | currency}}</h4>
				</div>
				<div class='metros-image' ng-init="metros = <?php echo $anuncio->areaterreno; ?>">
					<h1>{{metros | number:0}}&nbsp;M²</h1>
				</div>
				<img ng-src='{{path}}'>
			</div>
			<h2><small><?php echo nl2br($anuncio->titulo); ?></small></h2>
			<h4 class='titulo-anuncio'>
				<small><?php echo nl2br($anuncio->descricao); ?></small>
			</h4>
		</div>
		<div class="col-xs-12 col-sm-2 form-horizontal esconder-celular">
			
			<div class="col-md-12 top border-bottom-gray padding-left">
				<div class="col-md-3 bottom padding-left">
					<img class="img-thumbnail" src='<?php echo Yii::app()->baseUrl."/assets/images/simbolo/area.png"; ?>' />
				</div>
				<div class='col-md-9 bottom padding-left'>
					<h4 class='bottom'>
						<small>
							Área:&nbsp;&nbsp;&nbsp;<?php echo $anuncio->areaterreno; ?>&nbsp;M&sup2;
						</small>
					</h4>
				</div>
			</div>
			
			<div class='col-md-12 top border-bottom-gray padding-left'>
				<div class="col-md-3 bottom padding-left">
					<img class="img-thumbnail" src='<?php echo Yii::app()->baseUrl."/assets/images/simbolo/comodos.png"; ?>' />
				</div>
				<div class='col-md-9 bottom padding-left'>
					<h4 class='bottom'>
						<small>
							Comodos:&nbsp;&nbsp;&nbsp;<?php echo $anuncio->qtdcomodo; ?>
						</small>
					</h4>
				</div>
			</div>
			
			<div class='col-md-12 top border-bottom-gray padding-left'>
				<div class="col-md-3 bottom padding-left">
					<img class="img-thumbnail" src='<?php echo Yii::app()->baseUrl."/assets/images/simbolo/banheiro.png"; ?>' />
				</div>
				<div class='col-md-9 bottom padding-left'>
					<h4 class='bottom'>
						<small>
							Banheiros:&nbsp;&nbsp;&nbsp;<?php echo $anuncio->qtdbanheiro; ?>
						</small>
					</h4>
				</div>
			</div>
			
			<div class='col-md-12 top border-bottom-gray padding-left'>
				<div class="col-md-3 bottom padding-left">
					<img class="img-thumbnail" src='<?php echo Yii::app()->baseUrl."/assets/images/simbolo/quarto.png"; ?>' />
				</div>
				<div class='col-md-9 bottom padding-left'>
					<h4 class='bottom'>
						<small>
							Quartos:&nbsp;&nbsp;&nbsp;<?php echo $anuncio->qtdquarto; ?>
						</small>
					</h4>
				</div>
			</div>
			
			<div class='col-md-12 top border-bottom-gray padding-left'>
				<div class="col-md-3 bottom padding-left">
					<img class="img-thumbnail" src='<?php echo Yii::app()->baseUrl."/assets/images/simbolo/garagem.png"; ?>' />
				</div>
				<div class='col-md-9 bottom padding-left'>
					<h4 class='bottom'>
						<small>
							Garagem:&nbsp;&nbsp;&nbsp;<?php echo $anuncio->qtdgaragem; ?>
						</small>
					</h4>
				</div>
			</div>
			
			<div class='col-md-12 top border-bottom-gray padding-left'>
				<div class="col-md-3 bottom padding-left">
					<img class="img-thumbnail" src='<?php echo Yii::app()->baseUrl."/assets/images/simbolo/quintal.png"; ?>' />
				</div>
				<div class='col-md-9 bottom padding-left'>
					<h4 class='bottom'>
						<small>
							Quintal:&nbsp;&nbsp;&nbsp;<?php echo ($anuncio->quintal == 'S')?'Sim':'Não'; ?>
						</small>
					</h4>
				</div>
			</div>
			
			<div class='col-md-12 top border-bottom-gray padding-left'>
				<div class="col-md-3 bottom padding-left">
					<img class="img-thumbnail" src='<?php echo Yii::app()->baseUrl."/assets/images/simbolo/piscina.png"; ?>' />
				</div>
				<div class='col-md-9 bottom padding-left'>
					<h4 class='bottom'>
						<small>
							Piscina:&nbsp;&nbsp;&nbsp;<?php echo ($anuncio->piscina == 'S')?'Sim':'Não'; ?>
						</small>
					</h4>
				</div>
			</div>
			
			<div class='col-md-12 top border-bottom-gray padding-left'>
				<div class="col-md-3 bottom padding-left">
					<img class="img-thumbnail" src='<?php echo Yii::app()->baseUrl."/assets/images/simbolo/areaservico.png"; ?>' />
				</div>
				<div class='col-md-9 bottom padding-left'>
					<h4 class='bottom'>
						<small>
							Área/Serviço:&nbsp;&nbsp;&nbsp;<?php echo ($anuncio->areaservico == 'S')?'Sim':'Não'; ?>
						</small>
					</h4>
				</div>
			</div>
			
		</div>
		<div class='col-xs-12 col-sm-4 anuncio'>
			<div class="panel panel-default">
				<div class="panel-heading"><center>Contatar o anunciante</center></div>
				<div class="panel-body">
					<h4 class='text-capitalize text-center'><?php echo $anuncio->Usuario->nome.'&nbsp;'.$anuncio->Usuario->sobrenome; ?></h4>
					<br />
					<h4 class='text-success text-center hand' ng-init='telefone = "<?php echo $anuncio->Usuario->celular; ?>"'>
						<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
						{{telefone | tel}}
					</h4>
					<br />
					<?php
						echo CHtml::statefulForm( $this->createUrl('salvarMensagem') , "post" , array('id' => 'formMensagemAnuncio')); 
					?>
					<div class="form-group">
						<textarea class="form-control" name='mensagem' ng-model='mensagem.mensagem' id='mensagem' placeholder='Escreva sua mensagem...' maxlength='200'></textarea>
					</div>
					<div class="form-group">
						<input type='text' class="form-control" name='nome' ng-model='mensagem.nome' id='nome' placeholder='Seu nome completo' maxlength='50' />
					</div>
					<div class="form-group">
						<input type='text' class="form-control" name='email' ng-model='mensagem.email' id='email' placeholder='Seu e-mail' maxlength='50' />
					</div>
					<div class="form-group">
						<input type='text' class="form-control" name='celular' ng-model='mensagem.celular' id='celular' ui-mask='(99) 9999-9999?9' maxlength='20' />
					</div>
					<div class="form-group">
						<button type='button' class='btn btn-primary btn-lg btn-block' ng-click='enviarMensagem()'>Enviar sua proposta</button>
					</div>
					<input type='hidden' value='<?php echo $anuncio->Usuario->id; ?>' name='usuario' />
					<input type='hidden' value='<?php echo $this->anuncio; ?>' name='anuncio' />
					<?php
						echo CHtml::endForm();  
					?>
				</div>
			</div>
		</div>
	</div>
	<br />
	<br />
	<div class="row">
		<div class="col-xs-12 col-md-7">
			<?php
				echo CHtml::statefulForm( $this->createUrl('salvarComentario') , "post" , array('id' => 'formComentarioAnuncio'));
				
				$params = array();
				$condition = " 1=1 ";
				if(isset($this->anuncio) && $this->anuncio != ''){
					$condition = $condition.' AND anuncio=:anuncio';
					$params[':anuncio'] = $this->anuncio; 
				}  
				$comentarios = Comentario::model()->findAll(array('condition'=>$condition, 'params'=>$params, 'order'=>'data desc'));
				$ultimoComentario = new Comentario;
				if(count($comentarios) > 0){
					$ultimoComentario = end($comentarios);
				} 
			?>
			<div class="form-group">
				<div class='col-md-6'><label for="descricao">Comentários (<?php echo count($comentarios); ?>) </label></div><div class="col-md-6 text-right"><h5><small><?php echo (count($comentarios) > 0)? 'Último comentário&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>&nbsp;'.(Date('d/m/Y H:i',strtotime($ultimoComentario->data))) : ''; ?> </small></h5></div>
				<textarea class='form-control' name='comentario' id='comentario' ng-model='comentario.comentario' placeholder='Deixe seu comentário aqui.' maxlength='200'></textarea>
			</div>
			<div class="text-right">
				<button type="button" class="btn btn-primary" ng-click='enviarComentario()'>Publicar comentário</button>
			</div>
			<input type='hidden' value='<?php echo (Yii::app()->user->isGuest)? 2 : Yii::app()->user->id; ?>' name='usuario' />
			<input type='hidden' value='<?php echo $this->anuncio; ?>' name='anuncio' />
			<?php
				echo CHtml::endForm();  
			?>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-xs-12 col-md-7">
			<?php
				
				foreach ($comentarios as $key => $comentario) {
					if(!isset($comentario->Usuario)){
						$comentario->Usuario = new Usuario;
						$comentario->Usuario->nome = 'Usuário anônimo';
						$comentario->Usuario->sobrenome = '';
					}
					echo "<div class='panel panel-default'>".
						 	"<div class='panel-body'><div class='col-md-6'><h4><small class='text-capitalize'>".$comentario->Usuario->nome.' '.$comentario->Usuario->sobrenome."</small></h4></div><div class='col-md-6'>".
						 		"<h5 class='text-right'><small>".
						 			"Postado em&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-calendar' aria-hidden='true'></span>&nbsp;".(Date('d/m/Y H:i',strtotime($comentario->data))).
						 		"</small></h5></div>".
						 		"<div class='col-md-12'><h4><small class='text-capitalize'>".
						 			$comentario->comentario.
						 		"</small></h4></div>".
						 	"</div>".
						 "</div>";
				}
			?>
		</div>
	</div>
	<?php
	
		include_once 'opcoesBottom.php';
	
	?>
</div>