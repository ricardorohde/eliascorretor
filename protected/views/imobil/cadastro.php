<?php
	
	include_once 'slideImageTopSemBusca.php';
	
?>

<!-- CORPO DA PÁGINA -->
<div class="container" ng-controller="CadastroUsuarioController">
	<div class="row">
		<div class="col-xs-12 col-md-4">
			<h2><small>Cadastro de usuário</small></h2>
		</div>
		<?php
	
			include_once 'opcaoTopCorpo.php';
	
		?>
	</div>
	<br />
	
	
	<?php
		// cria um html form com a action correta  
		echo CHtml::statefulForm( $this->createUrl('cadastroUsuario') , "post" , array('id' => 'formCadastrarUsuario')); 
	?>
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" ng-model="usuario.nome" maxlength="15">
			</div>
			<div class="form-group">
				<label for="sobrenome">Sobrenome</label>
				<input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="sobrenome" ng-model="usuario.sobrenome" maxlength="20">
			</div>
			<div class="form-group">
				<label for="data">Data de nascimento</label>
				<input type="text" class="form-control" id="data" name="data" ui-mask="99/99/9999" ng-model="usuario.nascimento">
			</div>
			<div class="form-class">
				<label for="data">Sexo</label>
				<br />
				<label class="radio-inline">
					<input type="radio" name="sexo" id="masculino" value="masculino" ng-model="usuario.sexo"> Masculino
				</label>
				<label class="radio-inline">
					<input type="radio" name="sexo" id="feminino" value="feminino" ng-model="usuario.sexo"> Feminino
				</label>
			</div>			
			<br />
			<div class="form-group">
				<label for="celular">Celular</label>
				<input type="text" class="form-control" id="celular" name="celular" ui-mask="(99) 9999-9999?9" ng-model="usuario.celular">
			</div>
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" ng-model="usuario.email" maxlength="30">
			</div>
			<div class="form-group">
				<label for="senha">Senha</label>
				<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" ng-model="usuario.senha" maxlength="20">
			</div>
		</div>
	</div>
		
	<div class="row">
		<div class="col-xs-12 col-md-12 centered espacoTopBottom">
			<?php
				echo CHtml::button("Cadastrar", array('ng-click'=>'validar()','id' => 'btCadastrar', 'class' => 'btn btn-primary btn-lg', 'name' => 'formUsuario', 'title' => 'Salvar as informacoes do usuario'));
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