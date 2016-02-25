<?php

class Comentariolido extends CActiveRecord{

	public $comentario;
	public $usuario;
	public $data;
	
    public static function model($className=__CLASS__){
        return parent::model($className);
    }

}

?>