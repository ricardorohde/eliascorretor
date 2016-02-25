app.controller('AnuncieController', function($scope) {
	$scope.anuncio = {};
	$scope.valor = function(valor,mensagem){
		if(valor == undefined || valor == ""){
			alert(mensagem);
			return true;
		}
		return false;
	};
	$scope.validar = function() {
		console.log($scope.anuncio);
		if($scope.valor($scope.anuncio.tpnegocio,"Preencha o tipo de negócio.")) return;
		if($scope.valor($scope.anuncio.tpimovel,"Preencha o tipo de imóvel.")) return;
		if($scope.valor($scope.anuncio.cidade,"Preencha a cidade do imóvel.")) return;
		if($scope.valor($scope.anuncio.valor,"Preencha o valor do imóvel.")) return;
		if($scope.valor($scope.anuncio.descricao,"Preencha a descrição do imóvel.")) return;
		$('#formCadastrarAnuncio').submit();
	};
	$scope.iniciar = function(){
		
	};
	$scope.iniciar();
});

try{
	var canvas = document.getElementById('imageCanvas');
	var ctx = canvas.getContext('2d');
	var imagens = [];
	var countImages = 0;
	var countImagesCarregadas = 0;
	var imagemCarregando = baseUrl + "/images/simbolo/loader.gif";
}catch(e){}

function carregar(e){
    var reader = new FileReader();
    reader.onload = function(event){
        var img = new Image();
        img.onload = function(){
            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img,0,0);
            upload();
        };
        img.src = event.target.result;
    };
    reader.readAsDataURL(e.target.files[0]);
}

function upload(){
    var img;
    try {
        img = canvas.toDataURL('image/', 1).split(',')[1];
    } catch(e) {
        img = canvas.toDataURL().split(',')[1];
    }
    countImages += 1; 
    document.getElementById("imagem"+countImages).src = imagemCarregando;
    $.ajax({
            url: 'https://api.imgur.com/3/image',
            headers: {
                  'Authorization': 'Client-ID e7279b18509b697'
            },
            type: 'POST',
            data: {
                type: 'base64',
                image: img
            },
            dataType: 'json'
    }).success(function(data) {
          console.log(data);
          countImagesCarregadas += 1;
          document.getElementById("imagem"+countImagesCarregadas).src = data.data.link;
          document.getElementById("enderecoImagem"+countImagesCarregadas).value = data.data.link;
          imagens[countImagesCarregadas] = data.data.link;
    }).error(function() {
        alert('Erro ao enviar essa imagem.');
    });
}