<?php  
	$num_colunas = count($data[0]->attributeLabels());
    $label_colunas = $data[0]->attributeLabels();
    $results = $data;
    $menu_path['admin'] = 'DevMenuCategoria/admin';   
    $menu_path['create'] = 'DevMenuCategoria/create'; 
    $page_name = str_replace("_", " ", substr($data[0]->tableName(), 4));
    
	$exibir['id'] = true; 
	$exibir['nome'] = true; 
	$exibir['ordem'] = true; 
	?>
<?php

$base_url = Yii::app()->request->baseUrl;
/* @var $this DevMenuCategoriaController */
/* @var $data DevMenuCategoria */

$this->breadcrumbs=array(
	'Dev Menu Categorias'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dev-menu-categoria-grid').yiiGridView('update', {
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
									<?php  foreach ($label_colunas as $label_coluna){ ?>
									<?php  	if($exibir[str_replace(" ","_",strtolower($label_coluna))]){?>
												<th><?php  echo $label_coluna; ?></th>
									<?php  	} ?>
									<?php  } ?>
												<th style="width: 67px;"></th>
                                    </tr>
                               	</thead>
                                
                                <tbody></div>
                                
                                    <?php  foreach ($results as $result){ ?>                                    	
                                    		<tr class="gradeA">
                                    <?php 	foreach ($label_colunas as $label_coluna){ ?>
                                    <?php  		if($exibir[str_replace(" ","_",strtolower($label_coluna))]){?>
													<td><?php  echo $result->{str_replace(" ","_",strtolower($label_coluna))}; ?></td>
									<?php  		} ?>
									<?php  	} ?>
													<td>
														<a class="view" title="View" href="<?php  echo $base_url;?>/DevMenuCategoria/<?php  echo $result->id; ?>"><img src="<?php  echo $base_url;?>/assets/1a126bf3/gridview/view.png" alt="Ver" /></a>
														<a class="update" title="Update" href="<?php  echo $base_url;?>/DevMenuCategoria/update/<?php  echo $result->id; ?>"><img src="<?php  echo $base_url;?>/assets/1a126bf3/gridview/update.png" alt="Alterar" /></a>
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
								$.post("<?php   echo $base_url;?>/DevMenuCategoria/delete",
									    {
									        'id': id
									    },
									    function(result){
										    if(typeof(result)=='string'){
											    result = JSON.parse(result);
										    }
									        if(result.status){
										        window.location = "<?php   echo $base_url;?>/DevMenuCategoria/admin";
										        
									        }
									    });
						}
                	</script>
                	