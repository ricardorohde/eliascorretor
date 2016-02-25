app.controller('CorpoController', function($scope,$interval,$q) {
      $scope.enviar = function (){
      	$('#formBuscaInicial').submit();
      };
      $scope.limpar = function (link){
      	window.location.href = link;
      };
      
      $scope.imagens = ['bg-casa1.jpg','bg-casa2.jpg','bg-casa3.jpg','bg-casa4.jpg','bg-casa5.jpg'];
      $scope.preload = function(url) {
            var deffered = $q.defer(), image = new Image();
            image.src = baseUrl + '/images/simbolo/' + url;
            if (image.complete) {
                  deffered.resolve(true);
            } else {
                  image.addEventListener('load', function() {
                        deffered.resolve(true);
                  });
                  image.addEventListener('error', function() {
                        deffered.reject(false);
                  });
            }
            return deffered.promise;
      };
      
      $scope.backgroundImage = 'bg1';
      var countImage = 1;
      $scope.setBackground = function(){
            if(countImage == 5) countImage = 0;
            countImage = countImage + 1;
            $scope.backgroundImage = 'bg' + countImage;
      };
      
      $scope.scroll = function (){
		var num = 50;
		var addClass = function (){
			$('div.tela-inicial').addClass('scrolled');
			$('div.busca-titulo-inicial').addClass('scrolled');
			$('div.busca-inicial').addClass('scrolled');
			$('.titulo-inicial').addClass('scrolled');
		};
		var removeClass = function (){
			$('div.tela-inicial').removeClass('scrolled');
			$('div.busca-titulo-inicial').removeClass('scrolled');
			$('div.busca-inicial').removeClass('scrolled');
			$('.titulo-inicial').removeClass('scrolled');
		};
		if ($(window).scrollTop() > num) addClass();
        	$(window).bind('scroll', function () {
	            if ($(window).scrollTop() > num) {
	                addClass();
	            } else {
	                removeClass();
	            }
	      });
	};
	
	$scope.scroll();
      
      var timer = $interval(function(){$scope.setBackground()}, 20000);
      
      $scope.iniciar = function(){
            $scope.preload($scope.imagens[1]);
            $scope.preload($scope.imagens[2]);
            $scope.preload($scope.imagens[3]);
            $scope.preload($scope.imagens[4]);
      };
      
      $scope.iniciar();
});