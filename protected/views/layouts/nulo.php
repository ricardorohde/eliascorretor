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
	
	<!-- MENU DA PÁGINA -->
	<?php include_once 'imports.php'; ?>
	
	<!-- INICIALIZADOR DE VARIAVEIS -->
	<script>
		var baseUrl = "<?php echo Yii::app()->baseUrl."/assets"; ?>";
		var nome    = "<?php echo (!Yii::app()->user->isGuest) ? Yii::app()->user->nome." ".Yii::app()->user->sobrenome : ""; ?>";
		var logado  =  <?php echo (!Yii::app()->user->isGuest) ? 'true' : 'false'; ?>;
	</script>
	
	<!-- FAVICON -->
		<link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl."/assets" ?>/images/simbolo/favicon.ico">
	
	<!-- TITLE's PAGE -->
		<title><?php echo $this->pageTitle; ?></title>
	
</head>
<body>
	<!-- MENU DA PÁGINA -->
	<?php include_once 'menu.php'; ?>
	
	<!-- CORPO DA PÁGINA -->
	<?php echo $content; ?>

	<!-- IMPORTS INTERNOS -->
	<?php include_once 'scripts.php'; ?>
	
</body>
</html>