<?php

class Imagemanuncio extends CActiveRecord{

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    //public function relations(){
        // return array(
        // 'rua'=>array(self::BELONGS_TO, 'Rua', 'cd_logradouro','with'=>'bairro'),
        // );
    //}

}

?>