<!-- TELA DE LOGIN DO SITE -->
<div class="container" ng-controller="LoginController">
	<?php
		// cria um html form com a action correta  
		echo CHtml::statefulForm( $this->createUrl('logarUsuario') , "post" , array('id' => 'formLoginUsuario','class'=>'form-signin centered')); 
	?>
	<h4 class="form-signin-heading">Faça login para conectar</h4>
		
	<label for="inputEmail" class="sr-only">E-mail</label>
	<input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail" required="" autofocus="" ng-model="login.email">
		
	<label for="senha" class="sr-only">Senha</label>
	<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required="" ng-model="login.senha">
		
	<br />
	<?php
		echo CHtml::button("Fazer login", array('ng-click'=>'validar()','id' => 'btLogin', 'class' => 'btn btn-lg btn-primary btn-block', 'name' => 'formLogin', 'title' => 'Faça o login no site.'));
	?>
	<div class="checkbox">
		<label>
			<input type="checkbox" name="lembrar" value="Lembrar-me" ng-model="login.lembrar"> Lembrar-me
		</label>
	</div>
	<div class="form-group">
		<a href="<?php echo $this->createUrl('page/cadastro'); ?>">Cadastrar-se</a></li>
	</div>
	<input type="hidden" name="action" id="action" ng-model="login.action" value="<?php echo (isset($this->acao) ? $this->acao : ""); ?>" />
	<?php
	
		echo CHtml::endForm();
	
	?>
</div>