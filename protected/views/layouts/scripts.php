<!-- SCRIPTS USADOS NA APLICAÇÃO -->
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/script/app.js"); ?>
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/script/menu.js"); ?>
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/script/corpo.js"); ?>
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/script/usuario.js"); ?>
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/script/login.js"); ?>
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/script/anuncio.js"); ?>
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/script/index.js"); ?>
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/script/busca.js"); ?>
	<?php echo CHtml::scriptFile(Yii::app()->baseUrl."/assets/script/admin.js"); ?>
	
	<script>
		angular.bootstrap(document, ['app']);
	</script>