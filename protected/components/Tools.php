<?php
class Tools
{
	public static function var_dump($value,$die=true){
		echo '<pre>';
		echo var_dump($value);
		echo '</pre>';
		
		if($die)
			die();
	} 
	
	public static function assinatura(){
		$assinatura = '/**\n* Desenvolvido por Daniel Fernandes Henrique\n* Brasil - São Paulo-SP\n*Data:\n**/';		
		echo $assinatura;
	}
}