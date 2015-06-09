<?php
/* @var $this AdmCategoriaPermissaoController */
/* @var $data AdmCategoriaPermissao */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_menu_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_menu_categoria); ?>
	<br />


</div>