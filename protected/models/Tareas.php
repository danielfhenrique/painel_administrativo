<?php
class Tareas extends CActiveRecord{
	public static function model($className=__CLASS__){
		//var_dump(strtolower($className)); die();
		return parent::model(strtolower($className));
	}

	public function rules(){
		return array(
			array('nombre,descripcion','required','message'=>'Campos Requeridos'),
		);
	}
}
