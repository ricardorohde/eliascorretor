<?php

	$config = Config::model()->findByPK(1);
	
	$pattern = '/(\d{2})(\d{4})(\d+)/i';
	$replacement = '($1) $2-$3';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="imobiliaria vilmar kreling, compra de terrenos">
	<meta name="keywords" content="compra, casa, terrenos, foz do iguaçu">
	<meta name="author" content="Jonas Franco Kreling (jonasfrancokreling@gmail.com)">
	
	<!-- IMPORTS EXTERNOS -->
	<?php include_once 'imports.php'; ?>
	
	<!-- INICIALIZADOR DE VARIAVEIS -->
	<script>
		var baseUrlAction = "<?php echo Yii::app()->baseUrl."/index.php/"; ?>";
		var baseUrl = "<?php echo Yii::app()->baseUrl."/assets"; ?>";
		var nome    = "<?php echo (!Yii::app()->user->isGuest) ? Yii::app()->user->nome." ".Yii::app()->user->sobrenome : ""; ?>";
		var logado  =  <?php echo (!Yii::app()->user->isGuest) ? 'true' : 'false'; ?>;
		var admin  =  <?php echo (!Yii::app()->user->isGuest && Yii::app()->user->tipoUsuario != 0) ? 'true' : 'false'; ?>;
	</script>
	
	<!-- FAVICON -->
		<link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl."/assets" ?>/images/icones/favicon.ico">
	
	<!-- TITLE's PAGE -->
		<title><?php echo $config->nomesite; ?></title>
	
</head>
<body>
	<!-- MENU DA PÁGINA -->
	<?php include_once 'menu.php'; ?>
	
	<!-- CORPO DA PÁGINA -->
	<?php echo $content; ?>

	
	<!-- RODAPÉ -->
	<footer class="footer programador">
		<div class="container">
			
		</div>
	</footer>
	<footer class="footer">
		<div class="container">
			<div class='row'>
				<div class='col-sm-4 col-sm-offset-4 conte-inicial esconder-celular text-center'>
					<p>Copyright © <?php echo date("Y"); ?> Company, Inc. All Right Reserved.</p>
					<p>Theme : JonasKreling 1.0 Designed by jonaskreling.</p>
					<p><b>jonasfrancokreling@gmail.com</b></p>		
				</div>
				<div class='col-sm-4 conte-inicial esconder-celular text-right'>
					<?php if(isset($config->exibircreci) && $config->exibircreci == "true"){ ?>
					<span class="glyphicon glyphicon-flag" aria-hidden="true"></span>&nbsp;&nbsp;
						Creci-F <?php echo $config->creci;?>
					<br />
					<?php }?>
					<?php if(isset($config->celular1) && $config->celular1 != ""){ ?>
					<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo preg_replace($pattern, $replacement, $config->celular1); ?><br />
					<?php }?>
					<?php if(isset($config->celular2) && $config->celular2 != ""){ ?>
					<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo preg_replace($pattern, $replacement, $config->celular2); ?><br />
					<?php }?>
					<?php if(isset($config->celular3) && $config->celular3 != ""){ ?>
					<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo preg_replace($pattern, $replacement, $config->celular3); ?><br />
					<?php }?>
					<?php if(isset($config->celular4) && $config->celular4 != ""){ ?>
					<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo preg_replace($pattern, $replacement, $config->celular4); ?><br />
					<?php }?>
					<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $config->endereco;?><br />
					<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $config->email;?><br />
				</div>
			</div>
		</div>
	</footer>

	<!-- IMPORTS INTERNOS -->
	<?php include_once 'scripts.php'; ?>
	
	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '1549132362003323',
				xfbml      : true,
				version    : 'v2.2'
			});
		};

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	
</body>
</html>