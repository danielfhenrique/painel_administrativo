<?php     $menu_path['admin'] = 'DevMenuCategoria/admin';   
    $menu_path['create'] = 'DevMenuCategoria/create';   

?>
<?php
/* @var $this DevMenuCategoriaController */
/* @var $model DevMenuCategoria */

$this->breadcrumbs=array(
	'Dev Menu Categorias'=>array('index'),
	'Create',
);

?>

				<!-- start page title -->
                <div class="page-title" >
                	<div class="in">
                    		<div class="titlebar">	<h2>DEVMENUCATEGORIA</h2>	<p>Gerenciamento de devmenucategoria.</p></div>
                            <?php  $this->renderPartial('../layouts/menu_crud_completo',array('menu_path'=>$menu_path));?>
                            <div class="clear"></div>
                    </div>
                </div>
                <!-- end page title -->
                
<?php $this->renderPartial('_form', array('model'=>$model)); ?>