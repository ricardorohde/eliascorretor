	<?php
		$controller = Yii::app()->getController();
		$default_controller = Yii::app()->defaultController;
		$isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction || $controller->action->id === 'deslogarUsuario')) ? true : false;
	
	?>
	<!-- CSS's -->
	<?php 
		echo CHtml::cssFile(Yii::app()->baseUrl."/assets/bootstrap/css/bootstrap.min.css");
		echo CHtml::cssFile(Yii::app()->baseUrl."/assets/bootstrap-social/bootstrap-social.css");
	
		echo CHtml::cssFile(Yii::app()->baseUrl."/assets/css/css.php");
		echo CHtml::cssFile(Yii::app()->baseUrl."/assets/css/menu/menu1.css");
		if($isHome){
			echo CHtml::cssFile(Yii::app()->baseUrl."/assets/css/aberturas/cssAberturaSite1.css");
		}
		
	?>
<!-- SCRIPT's -->
	<!-- JQuery -->
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/jquery/jquery.min.js"); ?>
	<!-- Bootstrap core javascript -->
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/bootstrap/js/bootstrap.min.js"); ?>
	<!-- Angular -->
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/angular/angular.min.js"); ?>
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/angular/angular-locale_pt-br.js"); ?>
	<!-- Ui-mask core javascript -->
	<?php
		if(!$isHome){
			echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/ui-utils/ui-utils-ieshiv.min.js");
			echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/ui-utils/ui-utils.min.js");
			echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/ui-utils/masks.min.js"); 
			echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/d3/d3.min.js");
			echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/angular-chart/dist/angular-charts.js");
		}
	?>