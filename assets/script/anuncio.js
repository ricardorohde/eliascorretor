app.controller('AnuncioController', function($scope,$http) {
	$scope.anuncio = {};
	$scope.mensagem = {};
	$scope.comentario = {};
	$scope.isNullOrBlanck = function(valor,mensagem){
		if(valor == undefined || valor == ""){
			alert(mensagem);
			return true;
		}
		return false;
	};
	$scope.mudarPath = function (path){
		$scope.path = path;
	};
	$scope.enviarMensagem = function (){
		if($scope.isNullOrBlanck($scope.mensagem.mensagem,"Preencha a mensagem.")) return;
		if($scope.isNullOrBlanck($scope.mensagem.nome,"Preencha o nome.")) return;
		if($scope.isNullOrBlanck($scope.mensagem.email,"Preencha o e-mail.")) return;
		if($scope.isNullOrBlanck($scope.mensagem.celular,"Preencha o celular.")) return;
		console.log($scope.mensagem);
		$('#formMensagemAnuncio').submit();
	};
	$scope.enviarComentario = function (){
		if($scope.isNullOrBlanck($scope.comentario.comentario,"Escreva seu comentário.")) return;
		$('#formComentarioAnuncio').submit();
	};
	
	$scope.enviarEstatistica = function (){
		var parametros = {};
		parametros.anuncio = anuncioid;
		$http.post(baseUrlAction+"setEstatisticaAnuncio", parametros).success(
			function(data, status, headers, config) {
				
			}
		).error(
			function(data, status, headers, config) {
				console.log('Erro ao enviar estatística.');
			}
		);
	};
	
	$scope.iniciar = function(){
		$scope.mensagem.mensagem = '';
		$scope.mensagem.nome = '';
		$scope.mensagem.email = '';
		$scope.mensagem.celular = '';
		$scope.comentario.comentario = '';
		$scope.enviarEstatistica();
	};
	$scope.iniciar();
});

angular.module('ng').filter('tel', function () {
    return function (tel) {
        if (!tel) { return ''; }

        var value = tel.toString().trim().replace(/^\+/, '');

        if (value.match(/[^0-9]/)) {
            return tel;
        }

        var country, city, number;

        switch (value.length) {
            case 10: // +1PPP####### -> C (PPP) ###-####
                country = 1;
                city = value.slice(0,2);
                number = value.slice(2);
                break;

            case 11: // +CPPP####### -> CCC (PP) ###-####
                country = 1;
                city = value.slice(0,2);
                number = value.slice(2);
                break;

            case 12: // +CCCPP####### -> CCC (PP) ###-####
                country = value.slice(0, 3);
                city = value.slice(3, 5);
                number = value.slice(5);
                break;

            default:
                return tel;
        }
        
		if (country == 1) {
            country = "";
        }

        number = number.slice(0, 4) + '-' + number.slice(4);

        return (country + " (" + city + ") " + number).trim();
    };
});