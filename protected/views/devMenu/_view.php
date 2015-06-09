<?php
/* @var $this DevMenuController */
/* @var $data DevMenu */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nome')); ?>:</b>
	<?php echo CHtml::encode($data->nome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_menu_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_menu_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_menu_pai')); ?>:</b>
	<?php echo CHtml::encode($data->id_menu_pai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_menu_filho')); ?>:</b>
	<?php echo CHtml::encode($data->id_menu_filho); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('icon')); ?>:</b>
	<?php echo CHtml::encode($data->icon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordem')); ?>:</b>
	<?php echo CHtml::encode($data->ordem); ?>
	<br />


</div>