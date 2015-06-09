<?php     
	$page_name = 'Tipo UsuÁrio'; 
    $menu_path['admin'] = 'AdmUsuarioTipo/admin';   
    $menu_path['create'] = 'AdmUsuarioTipo/create'; 
    $results = $data;  
	$ObjDropDownList = null;
	
    
/**
 * O array "fk_field" permite escolher qual campo estrangeiro relacionado deve ser exibido.
 */
	
	foreach ($results as $id_result=>$result){
		foreach ($result->relations() as $nome_rel=>$relation){
			if(isset($result->{$relation[2]})&&$result->{$relation[2]}!=0)
				$result->{$relation[2]} = $data[$id_result]->{$nome_rel}->{$fk_field[$relation[2]]};
		}
		$results[$id_result] = $result;
	}
	
	
		
/**
 *
 * O array "field_pai" permite escolher qual campo estrangeiro deve ser mostrado no DropDownList.
 */	
	if(!is_null($DropDownList)&&isset($field_pai))	{	
		if(!is_null($DropDownList))	{
			foreach ($DropDownList as $key=>$fdata){
				$fdata = $fdata['fdata'];
				$fTable = $DropDownList[$key]['fTable'];
				$DropDownListData = $DropDownList[$key]['fdataId'];
						
				foreach ($DropDownListData as $k=>$item){
					foreach ($fdata as $a=>$f){
						if($f->{$fdata[0]->tableSchema->primaryKey} == $item){
							$DropDownListData[$item] = $f->{$field_pai[$fdata[0]->tableSchema->name.'_fk_'.$key]};					
						}
					}			
				}
				$ObjDropDownList[$key] = $DropDownListData;
			} 
		}
	}
	
?>
<?php
/* @var $this AdmUsuarioTipoController */
/* @var $model AdmUsuarioTipo */

$this->breadcrumbs=array(
	'Adm Usuario Tipos'=>array('index'),
	'Create',
);

?>

				<!-- start page title -->
                <div class="page-title" >
                	<div class="in">
                    		<div class="titlebar">	<h2><?php  echo strtoupper($page_name); ?></h2>	<p>Gerenciamento de <?php  echo strtoupper($page_name); ?>.</p></div>
                            <?php  $this->renderPartial('../layouts/menu_crud_completo',array('menu_path'=>$menu_path));?>
                            <div class="clear"></div>
                    </div>
                </div>
                <!-- end page title -->
                
<?php $this->renderPartial('_form', array('model'=>$model,'label_colunas'=>$label_colunas,'DropDownListData'=>$ObjDropDownList,'categorias'=>$categorias,'itens_menu'=>$itens_menu)); ?>