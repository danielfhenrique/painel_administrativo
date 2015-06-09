<?php  
    $labels = $model[0]->attributeLabels();
    $values = $data;   
    $results = $model;
    $menu_path['admin'] = 'DevMenu/admin';   
    $menu_path['create'] = 'DevMenu/create';              			
    $page_name = str_replace("_", " ", substr($model[0]->tableName(), 4));
    

/**
 * O array "fk_field" permite escolher qual campo estrangeiro relacionado deve ser exibido.
 */
			
	$fk_field['id_menu_categoria'] = 'nome';
	
	foreach ($results as $id_result=>$result){
		foreach ($result->relations() as $nome_rel=>$relation){
			if(isset($result->{$relation[2]})&&$result->{$relation[2]}!=0)
				$result->{$relation[2]} = $data[$id_result]->{$nome_rel}->{$fk_field[$relation[2]]};
		}
		$results[$id_result] = $result;
	}
	
	$menu_list = array('0'=>"",NULL=>"");
	foreach ($data as $menu){
		$menu_list[$menu->id] = $menu->nome;
	}
	
	$results[0]->id_menu_pai = $menu_list[$results[0]->id_menu_pai];
	$results[0]->id_menu_filho = $menu_list[$results[0]->id_menu_filho];
	
?>
<?php
/* @var $this DevMenuController */
/* @var $model DevMenu */

$this->breadcrumbs=array(
	'Dev Menus'=>array('index'),
	$model[0]->id,
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



                		
                        <!-- START TABLE -->
                        <div class="simplebox grid740" style="padding: 20px 24px;">
                        
                            	
                                <table id="myTable" class="tablesorter"> 
                                	
                                    <tbody> 
                                    	<?php  foreach ($labels as $label){ ?>
                                    	<tr> 
                                    		<td><?php  echo $label_colunas[str_replace(" ","_",strtolower($label))];?></td> 
                                    		<td><?php  echo $results[0]->{str_replace(" ","_",strtolower($label))};?></td> 
                                    	</tr> 
                                    	<?php  } ?>
                                    
                                    	
                                        
                                    </tbody> 
                                </table>
                            
                            
                        </div>
                        <!-- END TABLE -->
                        
                        