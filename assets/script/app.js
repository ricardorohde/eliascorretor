var isIndex = function(){
    var urlI = window.location.protocol+'//'+window.location.host + '/eliascorretor';
    var url = document.URL.replace(urlI,'');
    if(url == '/' || url == '/index.php' || url == '' || url == '/index.php/' || url == '/index.php/deslogarUsuario' || url == 'index.php/deslogarUsuario'){
        return true;
    }
    return false;
};

var app = undefined;
if(isIndex()){
    app = angular.module('app', []);
}else{
    app = angular.module('app', ['ui.utils','ui.mask','ui.utils.masks','angularCharts']);
}
