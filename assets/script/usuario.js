app.controller('CadastroUsuarioController', function($scope) {
	$scope.usuario = {};
	$scope.valor = function(valor,mensagem){
		if(valor == undefined || valor == ""){
			alert(mensagem);
			return true;
		}
		return false;
	};
	$scope.validar = function() {
		if($scope.valor($scope.usuario.nome,"Preencha o nome.")) return;
		if($scope.valor($scope.usuario.sobrenome,"Preencha o sobrenome.")) return;
		if($scope.valor($scope.usuario.nascimento,"Preencha a data de nascimento.")) return;
		if($scope.valor($scope.usuario.sexo,"Preencha o sexo.")) return;
		if($scope.valor($scope.usuario.celular,"Preencha o celular.")) return;
		if($scope.valor($scope.usuario.email,"Preencha o email.")) return;
		if($scope.valor($scope.usuario.senha,"Preencha a senha.")) return;
		$('#formCadastrarUsuario').submit();
	};
	$scope.iniciar = function(){
		$scope.usuario.sexo = 'masculino';
	};
	$scope.iniciar();
});