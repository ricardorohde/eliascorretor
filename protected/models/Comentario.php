<?php

class Comentario extends CActiveRecord{

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

	public function relations(){
		return array(
			'Usuario'=>array(self::BELONGS_TO, 'Usuario', 'usuario'),
			'Anuncio'=>array(self::BELONGS_TO, 'Anuncio', 'anuncio'),
		);
	}

}

?>