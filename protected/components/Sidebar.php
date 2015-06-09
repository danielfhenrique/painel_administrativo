<?php

class Sidebar
{
	public $obj_side_bar;
	
	public function __construct(){		
		$this->obj_side_bar = $this->get_obj_side_bar();	
	}
	
	private function get_categorias(){
		$sidebar = DevMenu::model()->findByAttributes(array('nome'=>'Sidebar'));		
		
		$menus = DevMenu::model()->findAllByAttributes(array('id_menu_pai'=>$sidebar->id));		

		$criteria = new CDbCriteria(array('order'=>'ordem'));
		$all_categorias = DevMenuCategoria::model()->findAll($criteria);
		
		foreach ($all_categorias as $categoria)
			foreach ($menus as $menu){
				if($categoria->id == $menu->id_menu_categoria){
					$categorias[] = $categoria;
					break;
				}
			}
		
		return $categorias;
	}
	
	private function get_menu_principal($categoria){
		$menu_principal = null;
		$menu_model = DevMenu::model();		
				
		$menu_principal = $menu_model->findByAttributes(array('nome'=>$categoria));
				
		return $menu_principal;
	}
	
	private function get_itens_menu($id_menu_principal){
		$itens_menu = null;
		
		if(isset($id_menu_principal)){
			$criteria = new CDbCriteria(array('order'=>'ordem'));
			$itens_menu = DevMenuItem::model()->findAllByAttributes(array('id_menu_pai'=>$id_menu_principal),$criteria);
		}
		return $itens_menu;
	}
	
	private function get_obj_side_bar(){
		$obj_side_bar = array();
		$categorias = $this->get_categorias();
		
		foreach ($categorias as $categoria){
			$menu_principal = $this->get_menu_principal($categoria->nome);
			$itens_menu 	= (isset($menu_principal)) ? $this->get_itens_menu($menu_principal->id) : "";
			
			$obj_side_bar_item = array(
					'categoria'		=>$categoria,
					'menu_principal'=>$menu_principal,
					'itens_menu'	=>$itens_menu
			);
			
			$obj_side_bar[] = $obj_side_bar_item;
		}
		
		return $obj_side_bar;
	}
	
}