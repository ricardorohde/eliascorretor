<?php
 	
 	$config = Config::model()->findByPK(1);
 	
?>
<nav class="navbar navbar-default navbar-fixed-top" ng-controller="MenuController" id='menu' ng-class='classMenu'>
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand text-center" href="<?php echo Yii::app()->baseUrl.'/index.php'; ?>">
				<!-- img src='<?php echo Yii::app()->baseUrl.'/assets/images/icones/Elias Transparente Logo.png'; ?>' class='esconder-celular' /> -->
				<p><?php echo $config->nomesite; ?></p>
				<?php if(isset($config->exibircreci) && $config->exibircreci == "true"){ ?>
				<h5 class='text-right esconder-celular'>CRECI-F <?php echo $config->creci; ?></h5>
				<?php }?>
				
			</a>
		</div>
			
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<!--li><a href="<?php echo $this->createUrl('busca/3'); ?>">ALUGAR</a></li-->
				<li><a href="<?php echo $this->createUrl('busca/2'); ?>">COMPRAR</a></li>
				<li><a href="<?php echo $this->createUrl('busca'); ?>">LANÇAMENTOS</a></li>
				<li><a href="<?php echo $this->createUrl('busca'); ?>">PARCEIROS</a></li>
			</ul>
				
			<ul class="nav navbar-nav navbar-right">
				<li>
					
				</li>
				<li class="dropdown" ng-show="logado">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{nome}}<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#" ng-click='linkar("admin/1")'>Configurações</a></li>
						<li><a href="#" ng-click='linkar("admin/6")'>Minha Conta</a></li>
						<li><a href="#" ng-click='linkar("admin/2")'>Minhas Promoções</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo $this->createUrl('deslogarUsuario'); ?>">Sair</a></li>
					</ul>
				</li>
				<li ng-show="!logado"><a href="<?php echo $this->createUrl('abrirLogin'); ?>">Login</a></li>
			</ul>				
		</div>
	</div>
</nav>