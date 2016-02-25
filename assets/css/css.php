<?php

header("Content-type: text/css");

$urlImages = dirname(__FILE__).'/..';

function image_to_base64($path_to_image){ 
    $type = pathinfo($path_to_image, PATHINFO_EXTENSION);
    $image = file_get_contents($path_to_image);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($image);
    return $base64;
}

?>

@media (max-width: 768px) {
	.esconder-celular{
		display: none !important;
		visibility : hidden;
		width: 0px;
		height: 0px;
	}
	
	h1 {
		font-size: 20px;
	}
	
	.navbar-default .navbar-nav>.open>a,.nav>li>a:hover, .nav>li>a:focus {
		background-color: transparent;
	}

	.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus {
		color: #fff; background-color: transparent;
	}
	
	.navbar-default {
		background-color: rgba(0,0,0,0.5);
		border-color: rgba(0,0,0,0.5);
	}
	
	.navbar-default .navbar-brand {
		color: #fff;
		font-size: 20px;
	}
	
	.navbar-default .navbar-brand:hover {
		color: #fff;
		text-shadow: 0px 0px 15px rgba(249, 249, 249, 0.8);
	}
	
	.navbar-default .navbar-nav>li>a {
		color: #fff;
		font-size: 18px;
	}
	
	.navbar-default .navbar-nav>li>a:hover {
		color: #fff;
		text-shadow: 0px 0px 15px rgba(249, 249, 249, 0.8);
	}
}
@media (min-width: 769px) and (max-width: 992px) {
	/* MENU */
	.navbar-default {
		background-color: rgba(255,255,255,0);
		border-color: transparent;
		box-shadow: 1px 1px 15px rgba(0,0,0,0);
		-webkit-transition: 0.7s;
    	transition: 0.7s;
	}
	
	.navbar-default.scrolled {
		background-color: rgba(255,255,255,1);
		border-color: rgba(255,255,255,1);
		box-shadow: 1px 1px 15px rgba(0,0,0,0.5);
		-webkit-transition: 0.7s;
    	transition: 0.7s;
	}
	
	.nav.navbar-nav {
		padding-top: 60px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
	}
	
	.navbar-header {
		padding-top: 0px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
	}
	
	.navbar-header > a > img{
		width: 230px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
	}
	
	.navbar-header.scrolled > a > img{
		width: 0px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
	}
	
	.navbar-header > a > h5{
		font-size: 14px;
		margin-top:0px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
	}
	
	.navbar-header.scrolled > a > h5{
		font-size: 10px;
		margin-top:-10px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
	}
	
	.navbar-header.scrolled , .nav.navbar-nav.scrolled{
		padding-top: 0px;
		font-weight: normal;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
	}
	
	.navbar-default .navbar-brand{
		text-shadow: 0px 0px 10px rgba(0,0,0,0.7);
		font-size: 40px;
		color: #fff;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
	}
	
	.navbar-default .navbar-brand.scrolled {
		text-shadow: 0px 0px 5px rgba(0,0,0,0.5);
		font-size: 20px;
		color: #fff;
		background: #FF4500;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
	}
	
	.navbar-default .navbar-nav>li>a {
		color: #fff;
		text-shadow: 0px 0px 5px rgba(0,0,0,0.7);
		font-size: 18px;
		padding: 15px 15px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
	}
	
	.navbar-default .navbar-nav.scrolled>li>a {
		text-shadow: 0px 0px 2px rgba(0,0,0,0.3);
		color: #777;
		font-size: 16px;
		padding: 15px 15px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
	}
	
}
@media (min-width: 993px) {
	/* MENU */
	.navbar-default {
		background-color: rgba(255,255,255,0);
		border-color: transparent;
		box-shadow: 1px 1px 15px rgba(0,0,0,0);
		-webkit-transition: 0.7s;
    	transition: 0.7s;
    	transition-timing-function: ease;
	}
	
	.navbar-default.scrolled {
		background-color: rgba(255,255,255,1);
		border-color: rgba(255,255,255,1);
		box-shadow: 1px 1px 15px rgba(0,0,0,0.5);
		-webkit-transition: 0.7s;
    	transition: 0.7s;
    	transition-timing-function: ease;
	}
	
	.nav.navbar-nav {
		padding-top: 60px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
    	transition-timing-function: ease;
	}
	
	.navbar-header {
		padding-top: 0px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
    	transition-timing-function: ease;
	}
	
	.navbar-header > a > img{
		width: 230px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
    	transition-timing-function: ease;
	}
	
	.navbar-header.scrolled > a > img{
		width: 0px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
    	transition-timing-function: ease;
	}
	
	.navbar-header > a > h5{
		font-size: 14px;
		margin-top:0px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
    	transition-timing-function: ease;
	}
	
	.navbar-header.scrolled > a > h5{
		font-size: 10px;
		margin-top:-10px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
    	transition-timing-function: ease;
	}
	
	.navbar-header.scrolled , .nav.navbar-nav.scrolled{
		padding-top: 0px;
		font-weight: normal;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
    	transition-timing-function: ease;
	}
	
	.navbar-default .navbar-brand{
		text-shadow: 0px 0px 10px rgba(0,0,0,0.7);
		font-size: 40px;
		color: #fff;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
    	transition-timing-function: ease;
	}
	
	.navbar-default .navbar-brand.scrolled {
		text-shadow: 0px 0px 5px rgba(0,0,0,0.5);
		font-size: 20px;
		color: #fff;
		background: #FF4500;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
    	transition-timing-function: ease;
	}
	
	.navbar-default .navbar-nav>li>a {
		color: #fff;
		text-shadow: 0px 0px 5px rgba(0,0,0,0.7);
		font-size: 18px;
		padding: 15px 40px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
    	transition-timing-function: ease;
	}
	
	.navbar-default .navbar-nav.scrolled>li>a {
		text-shadow: 0px 0px 2px rgba(0,0,0,0.3);
		color: #777;
		font-size: 16px;
		padding: 15px 15px;
		-webkit-transition: 0.7s;
    	transition: 0.7s;
    	transition-timing-function: ease;
	}
	
}

.valor-image {
	position: absolute;
	top: -10px;
	right: 30px;
	background: #FF4500;/*#20B2AA;*/
	padding: 5px 10px;
	box-shadow: 1px 1px 3px rgba(0,0,0,0.3);
	text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
	color: #fff;
}

.metros-image {
	position: absolute;
	bottom: 0px;
	right: 50px;
	background: transparent;/*#20B2AA;*/
	color: rgba(255,255,255,0.8);
	font-size: 40px !important;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
}

.descricao-inicial {
	height: 60px;
	overflow: hidden;
}

.conte-inicial {
	margin-top: 15px;
}

.a-anuncio {
	width: 100%;
	display: block;
}

.espaco-top-bottom {
	margin-top: 50px;
	margin-bottom: 150px;
}

span.left {
	margin-left: 2px;
}

span.left-inicial {
	margin-left: 20px;
}

g > text , .ac-legend > table{
	font-size: 10px;
	padding-left: 2px;
	text-transform: capitalize;
}

.title-anuncio {
	white-space: nowrap;
	overflow: hidden;
	margin: 0px;
	padding: 0px;
}

.panel-title > a {
	text-decoration: none;
	font-size: 80%;
}

.font-80 {
	font-size: 85%;
}

.td-contagem {
	padding-left: 10px;
	color: #777;
	overflow: hidden;
}

.btn.btn-default.icones {
	height: 34px;
}

.count {
	position: absolute;
	top: 20%;
	right: 15%;
	font-size: 14px;
	font-weight: normal;
	background: rgba(200,41,41,0.75);
	color: rgb(255,255,255);
	line-height: 1em;
	padding: 4px 8px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	-ms-border-radius: 10px;
	-o-border-radius: 10px;
	border-radius: 10px;
}

.panel-body > h4 {
	margin-top:0px;
	margin-bottom:0px;
}

div.busca-inicial {
	background-color: rgba(0,0,0,0.5);
	border-radius: 5px;
	padding: 15px;
	color: #fff !important;
}

div.anuncio {
	
}

h4.titulo-anuncio {
	margin-top: 0px;
}

.padding-left{
	padding-left: 0px;
}

.bottom {
	margin-bottom: 0px;
}

.top {
	margin-top: 10px;
}

.table-config {
	overflow-y:scroll;
	height:200px;
}

.border-bottom-gray {
	border-bottom: 1px solid rgba(0,0,0,0.3);
}

div.jumbotron > div {
	font-family: 'Open Sans','Droid Sans',Arial;
}

div.row {
	font-family: 'Open Sans','Droid Sans',Arial;
}

h5.titulo-inicial {
	font-family: 'Open Sans','Droid Sans',Arial;
	font-size: 18px;
	color: #fff;
	text-shadow: 1px -1px 7px #000;
	margin: 0;
	text-align: center;
	margin: 10px auto;
}

.tela-complementar {
	background-size: 100% auto !important;
	background-position: center bottom !important;
	background-repeat: no-repeat !important;
	height:200px !important;
}



.jumbotron{
	padding-bottom:0px;
}

.espacoTopBottom{
	margin: 40px 0px;
}

/* UTIL */

.centered{
    text-align:center;
}

.bold-font{
	font-weight: bold;
}

textarea { resize: vertical; }

.hand{
	cursor: pointer;
}

.margin-right{
	margin-right: 5px;
}

.thumbnail {
	padding: 0px;
}

.indexImage {
	width: 100% !important;
	height: 168px !important;
	overflow: hidden;
	
	background-size: 100% auto !important;
	background-position: center middle !important;
	background-repeat: no-repeat !important;
	
}

.shaddow {
	-moz-box-shadow: 5px 2px 5px rgba(0, 0, 0, 0.3);
	-webkit-box-shadow: 5px 5px 2px rgba(0, 0, 0, 0.3);
	box-shadow: 5px 2px 5px rgba(0, 0, 0, 0.3);
}

a,h1,h2,h3,h4,h5,h6,p,small,i,strong,div{
	font-family: 'Roboto Condensed', sans-serif;
}

a , a:hover {
	text-decoration:none;
}

.shadow-image {
	box-shadow: 1px 1px 10px rgba(0,0,0,0.5);
}

/* LOGIN */

.form-signin{
	max-width: 330px;
	padding: 15px;
	margin: 150px auto;
	background: #eee;
	-moz-border-radius: 2px;
	-webkit-border-radius: 2px;
	border-radius: 2px;
	-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

/* FOOTER */
.footer{
	background:#333;
	padding: 50px 0px 50px 0px;
	color: white;
	margin-top:0px;
}

.footer.programador{
	background-size: auto auto;
	background-position: center middle;
	background-repeat: no-repeat;
	background-image: url('../images/simbolo/bgfooter.png');
	background-color: transparent;
	height: 200px;
	padding: 50px 0px 50px 0px;
	color: white;
}