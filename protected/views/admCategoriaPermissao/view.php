<?php  
    $labels = $model->attributeLabels();
    $values = $data[0];   
    $results = $data;
    $menu_path['admin'] = 'AdmCategoriaPermissao/admin';   
    $menu_path['create'] = 'AdmCategoriaPermissao/create';              			
    $page_name = str_replace("_", " ", substr($model->tableName(), 4));
    

/**
 * O array "fk_field" permite escolher qual campo estrangeiro relacionado deve ser exibido.
 */
			
	$fk_field['id_menu_categoria'] = 'id';
			
	$fk_field['id_usuario_tipo'] = 'id';
	
	foreach ($results as $id_result=>$result){
		foreach ($result->relations() as $nome_rel=>$relation){
			if(isset($result->{$relation[2]})&&$result->{$relation[2]}!=0)
				$result->{$relation[2]} = $data[$id_result]->{$nome_rel}->{$fk_field[$relation[2]]};
		}
		$results[$id_result] = $result;
	}
	
		
	/**
	 *
	 * Faça aqui suas alterações no código.
	 */
	
	
?>
<?php
/* @var $this AdmCategoriaPermissaoController */
/* @var $model AdmCategoriaPermissao */

$this->breadcrumbs=array(
	'Adm Categoria Permissaos'=>array('index'),
	$model->id,
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
                                    		<td><?php  echo $values->{str_replace(" ","_",strtolower($label))};?></td> 
                                    	</tr> 
                                    	<?php  } ?>
                                    
                                    	
                                        
                                    </tbody> 
                                </table>
                            
                            
                        </div>
                        <!-- END TABLE -->
                        
                        