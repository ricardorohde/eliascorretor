<?php
	include_once 'aberturaSite1.php';
	//include_once 'slideImagensTop.php';
	
	$config = Config::model()->findByPK(1);
	
?>

<!-- CORPO DA PÁGINA -->
<div class="container" ng-controller="IndexController">
	
	<div class='row'>
		<div class="col-xs-12 text-center">
			<h1>Imóveis em destaque</h1>
		</div>
	</div>
	
	<br />
	<!-- IMÓVEIS EM DESTAQUE -->
	<?php
			
		$anuncios = Anuncio::model()->findAll(array('limit'=>intval($config->qtdanuncio),'order' => 'data desc'));
		$count = 0;
		echo "<div class='row'>";
		foreach ($anuncios as $key => $anuncio) {
			if($count == 4 || $count == 8) echo "</div><div class='row'>";
			$imagem = isset($anuncio->Imagemanuncio[0]->url)?$anuncio->Imagemanuncio[0]->url:Yii::app()->baseUrl."/assets/images/simbolo/thumbnail-default.jpg"; 
			echo "<div class='col-xs-12 col-sm-6 col-md-3' ng-click='clickLink(\"".($this->createUrl('verAnuncio/'.$anuncio->id))."\")'>".
				 	"<div class='thumbnail'>".
				 		"<div class='indexImage' style='background:url(\"".$imagem."\")' ></div>".
   				 		"<div class='caption'>".
        					"<h4><span class='text-capitalize'>".$anuncio->Tpnegocio->tpnegocio."</span> - <span class='text-capitalize'>".$anuncio->Tpimovel->tpimovel."</span></h4>".
        					"<h4 ng-init='teste".$count." = ".$anuncio->valor."' ng-model='teste".$count."' >{{teste".$count." | currency}}</h4>".
        					"<p class='descricao-inicial'>".((strlen($anuncio->descricao) >= 100) ? substr($anuncio->descricao, 0, 100).'...':$anuncio->descricao)."</p>".
        					"<div class='btn-group btn-group-justified' role='group' aria-label=''>".
        						"<div class='btn-group' role='group'><button type='button' ng-click='clickLink(\"".($this->createUrl('verAnuncio/'.$anuncio->id))."\")' class='btn btn-primary' role='button'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>&nbsp;&nbsp;Visualizar</button></div>".
        						"<div class='btn-group' role='group'><button type='button' ng-click='clickLink(\"".($this->createUrl('verAnuncio/'.$anuncio->id))."\")' class='btn btn-default' role='button'><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>&nbsp;&nbsp;Informação</button></div>".
        					"</div>".
      			  		"</div>".
    				"</div>".
				"</div>";
			$count++;	
		}  
		if($count === 0){
			echo "<div class='col-xs-12 col-md-12'><p>Nenhum imóvel em destaque.</p></div>";
		}
		echo "</div>";
	?>
	
	<!-- BOTÃO PARA VISUALIZAR TODOS OS IMÓVEIS -->
	<div class="row">
		<div class="col-xs-12 col-md-12 centered espacoTopBottom">
			<p><a class="btn btn-primary btn-lg" href="<?php echo $this->createUrl('busca'); ?>" role="button">Ver todos os imóveis...</a></p>
		</div>
	</div>
	<?php
	
		include_once 'opcoesBottom.php';
	
	?>
</div>