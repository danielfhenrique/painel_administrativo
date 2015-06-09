<?php  
    $labels = $model->attributeLabels();
    $values = $model;   
    $menu_path['admin'] = 'DevMenuCategoria/admin';   
    $menu_path['create'] = 'DevMenuCategoria/create';              			
    $page_name = str_replace("_", " ", substr($model->tableName(), 4));
?>
<?php
/* @var $this DevMenuCategoriaController */
/* @var $model DevMenuCategoria */

$this->breadcrumbs=array(
	'Dev Menu Categorias'=>array('index'),
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
                                    		<td><?php  echo $label;?></td> 
                                    		<td><?php  echo $values->{str_replace(" ","_",strtolower($label))};?></td> 
                                    	</tr> 
                                    	<?php  } ?>
                                    
                                    	
                                        
                                    </tbody> 
                                </table>
                            
                            
                        </div>
                        <!-- END TABLE -->
                        
                        