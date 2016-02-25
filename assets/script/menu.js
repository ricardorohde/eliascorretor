app.controller('MenuController', function($scope,$location) {
	$scope.logado = logado;
	$scope.nome = nome;
	
	$scope.scroll = function (){
		var num = 50;
		var path = $location.absUrl();
		var index = $location.protocol()+'://'+$location.host();
		var isIndex = (index+'/' == path || index+'/index.php' == path || index+'/index.php/' == path || index == path || index+'/index.php/deslogarUsuario' == path);
		var addClass = function (){
			$('nav').addClass('scrolled');
            $('.navbar-header').addClass('scrolled');
            $('.navbar-brand').addClass('scrolled');
            $('.nav.navbar-nav').addClass('scrolled');
		};
		var removeClass = function (){
			$('nav').removeClass('scrolled');
            $('.navbar-header').removeClass('scrolled');
            $('.navbar-brand').removeClass('scrolled');
            $('.nav.navbar-nav').removeClass('scrolled');
		};
		if(isIndex){
			if ($(window).scrollTop() > num) addClass();
        	$(window).bind('scroll', function () {
	            if ($(window).scrollTop() > num) {
	                addClass();
	            } else {
	                removeClass();
	            }
	        });
		}else{
			addClass();
		}
	};
	
	$scope.scroll();
	
	$scope.linkar = function (link){
		window.location.href = baseUrlAction+link;
	};
});