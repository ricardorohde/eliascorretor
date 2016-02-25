<?php

class Anuncio extends CActiveRecord{

	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	public function relations(){
		return array(
			'Tpnegocio'=>array(self::BELONGS_TO, 'Tpnegocio', 'tpnegocio'),
			'Tpimovel'=>array(self::BELONGS_TO, 'Tpimovel', 'tpimovel'),
			'Cidade'=>array(self::BELONGS_TO, 'Cidade', 'cidade'),
			'Usuario'=>array(self::BELONGS_TO, 'Usuario', 'usuario'),
			'Tempo'=>array(self::BELONGS_TO, 'Tempo', 'tempo'),
			'Imagemanuncio'=>array(self::HAS_MANY, 'Imagemanuncio', 'anuncio'),
		);
	}

}

?>