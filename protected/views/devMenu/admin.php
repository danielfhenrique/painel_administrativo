<?php  
/* @var $this DevMenuController */
/* @var $data DevMenu */


	$num_colunas = count($data[0]->attributeLabels());
    $labels = $data[0]->attributeLabels();
    $results = $data;
    $menu_path['admin'] = 'DevMenu/admin';   
    $menu_path['create'] = 'DevMenu/create'; 
    $page_name = str_replace("_", " ", substr($data[0]->tableName(), 4));
    
    

 /**
 * O array "exibir" permite setar os campos que devem ser exibidos no grid. * 
 */   
	$exibir['id'] = false; 
	$exibir['nome'] = true; 
	$exibir['id_menu_categoria'] = true; 
	$exibir['id_menu_pai'] = true; 
	$exibir['id_menu_filho'] = false; 
	$exibir['icon'] = false; 
	$exibir['ordem'] = true; 
	
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

	//Tools::var_dump($results[1]);
	foreach ($results as $key=>$arr){
		$results[$key]->id_menu_pai = $menu_list[$results[$key]->id_menu_pai];
		$results[$key]->id_menu_filho = $menu_list[$results[$key]->id_menu_filho];
	}
	//Tools::var_dump($results[1]);
?>
<?php

$base_url = Yii::app()->request->baseUrl;

$this->breadcrumbs=array(
	'Dev Menus'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dev-menu-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

					<!-- start page title -->
                	<div class="page-title" >
                		<div class="in">
                    		<div class="titlebar">	<h2><?php  echo strtoupper($page_name); ?></h2>	<p>Gerenciamento de <?php  echo strtolower($page_name); ?>.</p></div>
                            <?php  $this->renderPartial('../layouts/menu_crud_completo',array('menu_path'=>$menu_path));?>
                            <div class="clear"></div>
                    	</div>
                	</div>
                	<!-- end page title -->

                	
                	
                
                        <!-- START TABLE -->
                        <div class="simplebox grid740" style="padding: 20px 24px;">
                        
                        	<div style="border:0; border-top: 1px solid #ccc;">                            
                            <!-- Start Data Tables Initialisation code -->
							<script type="text/javascript" charset="utf-8">
								$(document).ready(function() {
    								oTable = $('#example').dataTable({
        							"bJQueryUI": true,
        							"sPaginationType": "full_numbers"
        							});
    							} );
    						</script>
                            <!-- End Data Tables Initialisation code -->
							</div>

							<table cellpadding="0" cellspacing="0" border="0" class="display data-table" id="example" >
                            
								<thead>
									<tr>
									<?php  foreach ($labels as $label_coluna){ ?>
									<?php  	if($exibir[str_replace(" ","_",strtolower($label_coluna))]){?>
												<th><?php  echo $label_colunas[str_replace(" ","_",strtolower($label_coluna))]; ?></th>
									<?php  	} ?>
									<?php  } ?>
												<th style="width: 67px;"></th>
                                    </tr>
                               	</thead>
                                
                                <tbody></div>
                                
                                    <?php  foreach ($results as $result){ ?>                                    	
                                    		<tr class="gradeA">
                                    <?php 	foreach ($labels as $label_coluna){ ?>
                                    <?php  		if($exibir[str_replace(" ","_",strtolower($label_coluna))]){?>
													<td><?php  echo $result->{str_replace(" ","_",strtolower($label_coluna))}; ?></td>
									<?php  		} ?>
									<?php  	} ?>
													<td>
														<a class="view" title="View" href="<?php  echo $base_url;?>/DevMenu/<?php  echo $result->id; ?>"><img src="<?php  echo $base_url;?>/assets/1a126bf3/gridview/view.png" alt="Ver" /></a>
														<a class="update" title="Update" href="<?php  echo $base_url;?>/DevMenu/update/<?php  echo $result->id; ?>"><img src="<?php  echo $base_url;?>/assets/1a126bf3/gridview/update.png" alt="Alterar" /></a>
														<a class="delete" title="Delete" onclick="apagar(<?php   echo $result->id; ?>)" ><img src="<?php   echo $base_url;?>/assets/1a126bf3/gridview/delete.png" alt="Apagar" /></a></td>
                                    		</tr>
                                	<?php  } ?>
                                	
                                    
								</tbody>
							</table>

                            
                            
                            
                	</div>
                	<!-- END TABLE -->
                	
                	<script type="text/javascript">
						function apagar(id){
							var conf = confirm("Deseja realmente apagar esse registro?");
							if(conf)
								$.post("<?php   echo $base_url;?>/DevMenu/delete",
									    {
									        'id': id
									    },
									    function(result){
										    if(typeof(result)=='string'){
											    result = JSON.parse(result);
										    }
									        if(result.status){
										        window.location = "<?php   echo $base_url;?>/DevMenu/admin";
										        
									        }
									    });
						}
                	</script>
                	