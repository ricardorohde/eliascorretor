<?php

class Mensagemlida extends CActiveRecord{

	public $mensagem;
	public $usuario;
	public $data;
	
    public static function model($className=__CLASS__){
        return parent::model($className);
    }

}

?>