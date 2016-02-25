<?php

/**
 * Classe para autenticar um usuário no sistema.
 * @author jonas franco kreling
 * 
 */
   
class UserIdentity extends CUserIdentity {
	
	private $_id;
	
	public function authenticate(){
		$record=Usuario::model()->findByAttributes(array('email'=>$this->username,'senha'=>$this->password));
		if( $record === null )
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if( $record->senha !== $this->password )
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else {
			$this->_id = $record->id;
			$this->setState('nome', $record->nome);
			$this->setState('sobrenome', $record->sobrenome);
			$this->setState('celular', $record->celular);
			$this->setState('email', $record->email);
			$this->setState('tipoUsuario', $record->tipoUsuario);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
 
	public function getId() {
		return $this->_id;
	}
	
}

?>