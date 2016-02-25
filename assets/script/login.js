app.controller('LoginController', function($scope) {
	$scope.login = {};
	$scope.valor = function(valor,mensagem){
		if(valor == undefined || valor == ""){
			alert(mensagem);
			return true;
		}
		return false;
	};
	$scope.validar = function() {
		if($scope.valor($scope.login.email,"Preencha o e-mail.")) return;
		if($scope.valor($scope.login.senha,"Preencha a senha.")) return;
		$('#formLoginUsuario').submit();
	};
	$scope.iniciar = function(){
		$scope.login.email = '';
		$scope.login.senha = '';
		$(document.body).on('keypress',function(e){
			var keyCode = (event.keyCode ? event.keyCode : event.which);   
    		if (keyCode == 13) {
				$scope.validar();
    		}
		});
	};
	$scope.iniciar();
});