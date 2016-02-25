<?php
	
	include_once 'camposBusca.php';
	
?>

<!-- CORPO DA PÁGINA -->
<div class="container" ng-controller='BuscaController'>
	<div class="row">
		<div class="col-xs-12 col-md-8">
			<h2 style="margin-top:0px;"><small>Resultado da busca</small></h2>
		</div>
		<?php
	
			include_once 'opcaoTopCorpo.php';
	
		?>
	</div>
	<?php
		
		$params = array();
		$condition = " 1=1 ";
		if(isset($this->tpnegocio) && $this->tpnegocio != ''){
			$condition = $condition.' AND tpnegocio=:tpnegocio';
			$params[':tpnegocio'] = $this->tpnegocio; 
		}
		if(isset($this->tpimovel) && $this->tpimovel != ''){
			$condition = $condition.' AND tpimovel=:tpimovel';
			$params[':tpimovel'] = $this->tpimovel;
		}
		if(isset($this->cidade) && $this->cidade != ''){
			$condition = $condition.' AND cidade=:cidade';
			$params[':cidade'] = $this->cidade;
		}
		if(isset($this->valor) && $this->valor != ''){
			$condition = $condition.' AND valor <= :valor';
			$params[':valor'] = $this->valor;
		}
		if(isset($this->qtdquarto) && $this->qtdquarto != ''){
			$condition = $condition.' AND qtdquarto >=:qtdquarto';
			$params[':qtdquarto'] = $this->qtdquarto;
		}
		if(isset($this->qtdbanheiro) && $this->qtdbanheiro != ''){
			$condition = $condition.' AND qtdbanheiro >=:qtdbanheiro';
			$params[':qtdbanheiro'] = $this->qtdbanheiro;
		}
		if(isset($this->qtdgaragem) && $this->qtdgaragem != ''){
			$condition = $condition.' AND qtdgaragem >=:qtdgaragem';
			$params[':qtdgaragem'] = $this->qtdgaragem;
		}
		if(isset($this->quintal) && $this->quintal != ''){
			$condition = $condition.' AND quintal >=:quintal';
			$params[':quintal'] = $this->quintal;
		}
			
		
		$anuncios = Anuncio::model()->findAll(array('condition'=>$condition,'params'=>$params,'order' => 'data desc'));
		$count = 0;
		echo "<div class='row'>";
		foreach ($anuncios as $key => $anuncio) {
			if(($count % 4) === 0) echo "</div><div class='row'>";
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
			echo "<div class='col-xs-12 col-md-12'><p>Nenhum imóvel disponível para a sua busca.</p></div>";
		}
		echo "</div>";
	?>
	<?php
	
		include_once 'opcoesBottom.php';
	
	?>
</div>