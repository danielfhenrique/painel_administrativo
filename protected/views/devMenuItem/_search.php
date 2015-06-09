<?php
/* @var $this DevMenuItemController */
/* @var $model DevMenuItem */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_menu_pai'); ?>
		<?php echo $form->textField($model,'id_menu_pai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_menu_filho'); ?>
		<?php echo $form->textField($model,'id_menu_filho'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'icon'); ?>
		<?php echo $form->textField($model,'icon',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ordem'); ?>
		<?php echo $form->textField($model,'ordem'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->